@extends('layouts.app')

@section('content')
<h1 class="mb-6 text-2xl font-bold">Edit Buku</h1>

<form action="{{ route('books.update', ['id' => $book->id]) }}"
      method="POST"
      class="rounded-lg border border-slate-200 bg-slate-100 p-4">
    @csrf
    @method('PATCH')

    <label class="block text-sm font-medium">Judul Buku:</label>
    <input type="text" name="title" value="{{ old('title', $book->title) }}"
           class="my-1.5 mb-3 w-full rounded-md border border-slate-300 px-2 py-2">
    @error('title') <div class="text-sm text-red-600">{{ $message }}</div> @enderror

    <label class="block text-sm font-medium">Penulis:</label>
    <input type="text" name="author" value="{{ old('author', $book->author) }}"
           class="my-1.5 mb-3 w-full rounded-md border border-slate-300 px-2 py-2">
    @error('author') <div class="text-sm text-red-600">{{ $message }}</div> @enderror

    <button type="submit"
            class="cursor-pointer rounded-md bg-blue-600 px-4 py-2.5 text-white hover:bg-blue-700">
        Simpan Perubahan
    </button>
</form>
@endsection
