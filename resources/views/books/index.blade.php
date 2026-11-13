
@extends('layouts.app')

@section('content')
<style>
    .home-container {
        font-family: sans-serif;
        max-width: 600px;
        margin: 40px auto;
        padding: 0 20px;
    }

    .alert {
        background: #d1fae5;
        color: #065f46;
        padding: 10px;
        border-radius: 6px;
        margin-bottom: 16px;
    }

    .error {
        color: #dc2626;
        font-size: 14px;
    }

    .add-form {
        background: #f8fafc;
        padding: 16px;
        border-radius: 8px;
        border: 1px solid #e2e8f0;
    }

    input {
        width: 100%;
        padding: 8px;
        margin: 6px 0 12px;
        box-sizing: border-box;
    }

    button {
        background: #2563eb;
        color: white;
        border: none;
        padding: 10px 16px;
        border-radius: 4px;
        cursor: pointer;
    }

    a {
        color: #2563eb;
        text-decoration: none;
    }

    .book-list {
        padding-left: 20px;
    }

    .book-list li {
        margin-bottom: 12px;
    }

    .btn-detail {
        display: inline-block;
        margin-left: 8px;
    }
</style>

<div class="home-container">

    <h1>Katalog Buku</h1>

    {{-- Pesan sukses --}}
    @session('success')
        <div class="alert">{{ $value }}</div>
    @endsession

    {{-- Form Tambah Buku --}}
    <form method="POST"
          action="{{ route('books.store') }}"
          class="add-form">

        @csrf

        <label>Judul Buku:</label>
        <input
            type="text"
            name="title"
            value="{{ old('title') }}"
            placeholder="Contoh: Filosofi Teras"
        >

        @error('title')
            <div class="error">{{ $message }}</div>
        @enderror

        <label>Penulis:</label>
        <input
            type="text"
            name="author"
            value="{{ old('author') }}"
            placeholder="Contoh: Henry Manampiring"
        >

        @error('author')
            <div class="error">{{ $message }}</div>
        @enderror

        <button type="submit">+ Tambah Buku</button>
    </form>

    <hr style="margin: 24px 0;">

    {{-- Daftar Buku --}}
    <h3>Koleksi Saat Ini:</h3>

    <ul class="book-list">
        @forelse ($books as $book)
            <li>
                <strong>{{ $book->title }}</strong>
                oleh {{ $book->author }}

                {{-- <a href="{{ route('books.show', ['id' => $book->id]) }}"
                   class="btn-detail">
                    Detail
                </a> --}}
            </li>
        @empty
            <li>Belum ada buku.</li>
        @endforelse
    </ul>

</div>
@endsection
