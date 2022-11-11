<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use App\Models\Language;
use App\Services\PdfService;
use Illuminate\Validation\Rules\File;

class BookBasicController extends Controller
{
    /**
     * List all books available
     * 
     * @return \Illuminate\Contracts\View\View
     */
    public function list()
    {
        $books = Book::paginate(10);

        return view('pages.book.list', compact('books'));
    }

    /**
     * display all needed field for saving book
     * 
     * @return \Illuminate\Contracts\View\View
     */
    public function showBookRegistrationForm()
    {
        return view('pages.book.save', [
            'languages' => Language::all(),
            'categories' => Category::all()
        ]);
    }

    /**
     * Save the book inside the database
     * 
     * @return \Illuminate\Http\RedirectResponse
     */
    public function insert(PdfService $pdfService)
    {
        request()->validate([
            'title' => ['required', 'max:45', 'min:3'],
            'description' => ['required', 'max:250'],
            'price' => ['required', 'numeric'],
            'book' => ['required', File::types(['pdf'])]
        ]);

        $file = request()->file('book');

        // Store the uploaded file inside the uploads/books folder
        $path = $file->storeAs('public/uploads/books', time().'_'.$file->getClientOriginalName());

        Book::create([
            'title' => request('title'),
            'description' => request('description'),
            'price' => request('price'),
            'pageNumber' => $pdfService->count_page_number($file),
            'filePath' => str_replace('public', 'storage', $path),  // replace public with storage
            'category' => request('category'),
            'language' => request('language')
        ]);

        notify()->success('Your book was successfully stored !', 'Book insertion');
        
        return redirect()->route('book_list', ['page' => 1]);
    }
}
