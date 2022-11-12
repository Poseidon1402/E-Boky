<?php

namespace App\Http\Controllers;

use App\Jobs\ProcessBook;
use App\Models\Book;
use App\Models\Category;
use App\Models\Language;
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
    public function insert()
    {
        request()->validate([
            'title' => ['required', 'max:45', 'min:3'],
            'description' => ['required', 'max:250'],
            'price' => ['required', 'numeric'],
            'book' => ['required', File::types(['pdf'])]
        ]);

        // Get the pdf file and store it to the storage/app/public/uploads/books
        $file = request()->file('book');
        $path = $file->storeAs('public/uploads/books', time().'_'.$file->getClientOriginalName());

        // Fetch all input data by typing the field explicitly
        // After that, give it to the job for processing
        $data = request()->all(['title', 'price', 'category', 'language', 'description']);
        ProcessBook::dispatch($path, $data);

        notify()->success('Your book was successfully stored !', 'Book insertion');
        
        return redirect()->route('book_list', ['page' => 1]);
    }
}
