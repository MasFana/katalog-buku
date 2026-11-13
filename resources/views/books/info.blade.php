@extends('layouts.app')

@section('content')
    <h1 class="mb-6 text-2xl font-bold">Daftar Buku</h1>

    <form class="mb-6 flex gap-2" action="{{ route('books.search') }}" method="GET">
        <input class="flex-1 rounded-md border border-slate-300 px-3 py-2" name="query" type="text"
            placeholder="Cari buku...">

        <button class="cursor-pointer rounded-md bg-blue-600 px-4 py-2 text-white hover:bg-blue-700" type="submit">
            Cari
        </button>
    </form>
    
    <ul class="list-disc space-y-3 pl-5">
        @forelse ($books as $book)
            <li><strong>{{ $book->title }}</strong> oleh {{ $book->author }}</li>
        @empty
            <li class="list-none text-slate-500">Tidak ada buku yang ditemukan.</li>
        @endforelse
    </ul>
@endsection
