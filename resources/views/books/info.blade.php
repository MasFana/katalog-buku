<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Daftar Buku</h1>

    <form action="{{ route('books.search') }}" method="GET">
        <input
            type="text"
            name="query"
            placeholder="Cari buku..."
        >

        <button type="submit">Cari</button>
    </form>

    <ul>
        @forelse ($books as $book)
            <li><strong>{{ $book->title }}</strong> oleh {{ $book->author }}</li>
        @empty
            <li>Tidak ada buku yang ditemukan.</li>
        @endforelse
    </ul>
</body>
</html>
