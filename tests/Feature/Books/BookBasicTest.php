<?php

namespace Tests\Feature;

use App\Models\Book;
use App\View\Components\Book\Card;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BookBasicTest extends TestCase
{
    use RefreshDatabase;

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

    /**
     * A test for checking if all data are successfully sent to the target
     * 
     * @return void
     */
    public function test_insertion_inside_the_database()
    {
        $this->seed();

        $this->post('/insert', [
            'title' => 'Fifty Shades',
            'description' => 'La meilleure livre du siècle.',
            'price' => 200,
            'page' => '500',
            'category' => 'Dramatique',
            'language' => 'Français'
        ])->assertStatus(302);

    }
}
