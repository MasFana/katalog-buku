
@extends('layouts.app')

@section('content')
<style>
    .detail-container {
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

    .book-detail {
        background: #f8fafc;
        padding: 16px;
        border-radius: 8px;
        border: 1px solid #e2e8f0;
        margin-bottom: 16px;
    }

    .btn {
        display: inline-block;
        color: white;
        border: none;
        padding: 10px 16px;
        border-radius: 4px;
        cursor: pointer;
        text-decoration: none;
        font-size: 14px;
    }

    .btn-edit {
        background: #16a34a;
    }

    .btn-delete {
        background: #dc2626;
    }

    .btn-back {
        background: #6b7280;
    }
</style>

<div class="detail-container">
    <h1>Detail Buku</h1>

    @session('success')
        <div class="alert">{{ $value }}</div>
    @endsession

    <div class="book-detail">
        <p>ID: {{ $book->id }}</p>
        <p>Judul: {{ $book->title }}</p>
        <p>Penulis: {{ $book->author }}</p>

        <a href="{{ route('books.edit', ['id' => $book->id]) }}"
           class="btn btn-edit">
            Edit
        </a>

        <form action="{{ route('books.destroy', ['id' => $book->id]) }}"
              method="POST"
              style="display: inline-block;">
            @csrf
            @method('DELETE')

            <button type="submit"
                    class="btn btn-delete"
                    onclick="return confirm('Yakin ingin menghapus buku ini?')">
                Hapus
            </button>
        </form>

        <a href="{{ route('books.index') }}"
           class="btn btn-back">
            Kembali
        </a>
    </div>
</div>
@endsection
