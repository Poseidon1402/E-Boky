<?php

namespace Tests\Feature;

use App\Models\Book;
use App\View\Components\Book\Card;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BookBasicTest extends TestCase
{
    /**
     * A test for checking if each book's title are displayed
     *
     * @return void
     */
    public function test_book_list_page_display_title()
    {
        $book = new Book();
        $book->title = 'Cinquante Nuances de Grey';
        $book->description = 'The best book ever';
        
        $view = $this->component(Card::class, compact('book'));

        $view->assertSee('Cinquante Nuances de Grey');
        $view->assertSee('The best book ever');
    }
}
