<?php

namespace Tests\Feature;

use App\Models\Book;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BookCrudTest extends TestCase
{
    use RefreshDatabase;

    public function test_crud_flow(): void
    {
        $this->post(route('books.store'), ['title' => 'A', 'author' => 'B'])
            ->assertRedirect(route('books.index'));

        $book = Book::firstOrFail();
        $this->get(route('books.show', ['id' => $book->id]))->assertOk();
        $this->get(route('books.edit', ['id' => $book->id]))->assertOk();

        $this->patch(route('books.update', ['id' => $book->id]), ['title' => 'C', 'author' => 'D'])
            ->assertRedirect(route('books.show', ['id' => $book->id]));

        $this->delete(route('books.destroy', ['id' => $book->id]))
            ->assertRedirect(route('books.index'));

        $this->assertDatabaseMissing('books', ['id' => $book->id]);
    }
}
