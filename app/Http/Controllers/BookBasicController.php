<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use App\Models\Language;
use Illuminate\Http\Request;

class BookBasicController extends Controller
{
    /**
     * List all books available
     * 
     * @return \Illuminate\Contracts\View\View
     */
    public function list()
    {
        $books = Book::all();

        return view('pages.book.list', compact('books'));
    }

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
        $file = request()->file('book');

        // Store the uploaded file inside the uploads/books folder
        $path = $file->storeAs('public/uploads/books', time().'_'.$file->getClientOriginalName());
        
        Book::create([
            'title' => request('title'),
            'description' => request('description'),
            'price' => request('price'),
            'pageNumber' => request('page'),
            'filePath' => str_replace('public', 'storage', $path),  // replace public with storage
            'category' => request('category'),
            'language' => request('language')
        ]);

        return redirect()->route(route: 'book_list');
    }
}
