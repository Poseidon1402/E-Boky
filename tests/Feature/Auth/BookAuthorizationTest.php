<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BookAuthorizationTest extends TestCase
{
    /**
     * Test if a simple user cannot access or register a book
     *
     * @return void
     */
    public function test_user_cannot_create_or_register_a_book()
    {
        $user = User::factory()->create([
            'role' => 'USER',
            'email_verified_at' => null,
        ]);

        $response = $this->actingAs($user)->get('/book_registration');

        $response->assertForbidden();
    }

    /**
     * Test if a author can access and register his book
     *
     * @return void
     */
    public function test_author_can_create_or_register_his_book()
    {
        $user = User::factory()->create([
            'role' => 'AUTHOR',
            'email_verified_at' => null,
        ]);

        $response = $this->actingAs($user)->get('/book_registration');

        $response->assertSuccessful();
    }
}
