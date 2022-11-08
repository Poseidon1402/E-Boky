<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookBasicController extends Controller
{
    public function list()
    {
        $books = Book::all();

        return view('pages.book.list', compact('books'));
    }
}
