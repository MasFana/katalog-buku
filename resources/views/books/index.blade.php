@extends('layouts.app')

@section('content')
<h1 class="mb-6 text-2xl font-bold">Katalog Buku</h1>

{{-- Pesan sukses --}}
@session('success')
    <div class="mb-4 rounded-md bg-emerald-100 p-2.5 text-emerald-800">{{ $value }}</div>
@endsession

{{-- Form Tambah Buku --}}
<form method="POST"
      action="{{ route('books.store') }}"
      class="rounded-lg border border-slate-200 bg-slate-100 p-4">

    @csrf

    <label class="block text-sm font-medium">Judul Buku:</label>
    <input
        type="text"
        name="title"
        value="{{ old('title') }}"
        placeholder="Contoh: Filosofi Teras"
        class="my-1.5 mb-3 w-full rounded-md border border-slate-300 px-2 py-2"
    >

    @error('title')
        <div class="text-sm text-red-600">{{ $message }}</div>
    @enderror

    <label class="block text-sm font-medium">Penulis:</label>
    <input
        type="text"
        name="author"
        value="{{ old('author') }}"
        placeholder="Contoh: Henry Manampiring"
        class="my-1.5 mb-3 w-full rounded-md border border-slate-300 px-2 py-2"
    >

    @error('author')
        <div class="text-sm text-red-600">{{ $message }}</div>
    @enderror

    <button type="submit"
            class="cursor-pointer rounded-md bg-blue-600 px-4 py-2.5 text-white hover:bg-blue-700">
        + Tambah Buku
    </button>
</form>

<hr class="my-6 border-slate-200">

{{-- Daftar Buku --}}
<h3 class="mb-3 text-lg font-semibold">Koleksi Saat Ini:</h3>

<ul class="list-disc space-y-3 pl-5">
    @forelse ($books as $book)
        <li>
            <strong>{{ $book->title }}</strong>
            oleh {{ $book->author }}

            <a href="{{ route('books.show', ['id' => $book->id]) }}"
               class="ml-2 text-blue-600 hover:underline">
                Detail
            </a>
        </li>
    @empty
        <li class="list-none text-slate-500">Belum ada buku.</li>
    @endforelse
</ul>
@endsection
