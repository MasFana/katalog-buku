@extends('layouts.app')

@section('content')
<h1 class="mb-6 text-2xl font-bold">Detail Buku</h1>

@session('success')
    <div class="mb-4 rounded-md bg-emerald-100 p-2.5 text-emerald-800">{{ $value }}</div>
@endsession

<div class="rounded-lg border border-slate-200 bg-slate-100 p-4">
    <p>ID: {{ $book->id }}</p>
    <p>Judul: {{ $book->title }}</p>
    <p>Penulis: {{ $book->author }}</p>

    <div class="flex flex-wrap gap-2 pt-4">
        <a href="{{ route('books.edit', ['id' => $book->id]) }}"
           class="rounded-md bg-green-600 px-4 py-2.5 text-sm font-medium text-white hover:bg-green-700">
            Edit
        </a>

        <form action="{{ route('books.destroy', ['id' => $book->id]) }}"
              method="POST"
              onsubmit="return confirm('Yakin ingin menghapus buku ini?')">
            @csrf
            @method('DELETE')

            <button type="submit"
                    class="cursor-pointer rounded-md bg-red-600 px-4 py-2.5 text-sm font-medium text-white hover:bg-red-700">
                Hapus
            </button>
        </form>

        <a href="{{ route('books.index') }}"
           class="rounded-md bg-gray-500 px-4 py-2.5 text-sm font-medium text-white hover:bg-gray-600">
            Kembali
        </a>
    </div>
</div>
@endsection
