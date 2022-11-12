<?php

namespace Tests\Feature;

use App\Models\Book;
use App\View\Components\Book\Card;
use Database\Seeders\CategorySeeder;
use Database\Seeders\LanguageSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
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
        $this->seed([
            LanguageSeeder::class,
            CategorySeeder::class
        ]);

        Storage::fake('public');
        $file = UploadedFile::fake()->create('my_book.pdf');

        $this->post('/insert', [
            'title' => 'Fifty Shades',
            'description' => 'La meilleure livre du siècle.',
            'price' => 200,
            'page' => '500',
            'book' => $file,
            'category' => 'Dramatique',
            'language' => 'Français'
        ])
        ->assertRedirect('/books?page=1');

        $this->assertDatabaseHas('books', [
            'title' => 'Fifty Shades',
            'description' => 'La meilleure livre du siècle.',
            'price' => 200
        ]);
    }
}
