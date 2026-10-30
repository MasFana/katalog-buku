<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    // 1. Menampilkan halaman daftar buku
    public function index()
    {
        // Ambil data buku terbaru dari database
        $books = Book::latest()->get();

        // Kirim data $books ke tampilan resources/views/books/index.blade.php
        return view('books.index', ['books' => $books]);
    }

    // 2. Menyimpan buku baru dari form
    public function store(Request $request)
    {
        // Cek dulu: judul & penulis wajib diisi!
        $validated = $request->validate([
            'title'  => 'required|string|max:255',
            'author' => 'required|string|max:255',
        ]);

        // Simpan ke database
        Book::create($validated);

        // Kembalikan ke halaman daftar buku dengan pesan sukses
        return to_route('books.index')->with('success', 'Buku berhasil ditambahkan!');
    }

    public function show(int $id)
    {
        // Ambil data buku berdasarkan ID
        $book = Book::findOrFail($id);

        // Kirim data $book ke tampilan resources/views/books/show.blade.php
        return view('books.show', ['book' => $book]);
    }

    // Menampilkan halaman form edit
    public function edit(int $id)
    {
        $book = Book::findOrFail($id);
        return view('books.edit', ['book' => $book]);
    }

    public function update(Request $request, int $id)
    {
        // Ambil data buku berdasarkan ID
        $book = Book::findOrFail($id);

        // Validasi input dari form
        $validated = $request->validate([
            'title'  => 'required|string|max:255',
            'author' => 'required|string|max:255',
        ]);

        // Update data buku
        $book->update($validated);

        // Kembalikan ke halaman detail buku dengan pesan sukses
        return to_route('books.update', ['id' => $book->id])->with('success', 'Buku berhasil diperbarui!');
    }

    public function destroy(int $id)
    {
        // Ambil data buku berdasarkan ID
        $book = Book::findOrFail($id);

        // Hapus buku dari database
        $book->delete();

        // Kembalikan ke halaman daftar buku dengan pesan sukses
        return to_route('books.index')->with('success', 'Buku berhasil dihapus!');
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        // Cari buku berdasarkan judul atau penulis
        $books = Book::where('title', 'like', "%{$query}%")
            ->orWhere('author', 'like', "%{$query}%")
            ->get();

        return view('books.info', ['books' => $books]);
    }
}
