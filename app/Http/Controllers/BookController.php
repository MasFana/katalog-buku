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
}
