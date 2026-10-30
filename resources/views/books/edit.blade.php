<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        body { font-family: sans-serif; max-width: 600px; margin: 40px auto; padding: 0 20px; }
        .alert { background: #d1fae5; color: #065f46; padding: 10px; border-radius: 6px; margin-bottom: 16px; }
        .error { color: #dc2626; font-size: 14px; }
        .add-form { background: #f8fafc; padding: 16px; border-radius: 8px; border: 1px solid #e2e8f0; }
        input { width: 100%; padding: 8px; margin: 6px 0 12px; box-sizing: border-box; }
        button { background: #2563eb; color: white; border: none; padding: 10px 16px; border-radius: 4px; cursor: pointer; }
        a { color: #2563eb; text-decoration: none; }
        .btn-edit {
            background: #16a34a;
            color: white;
            border: none;
            padding: 10px 16px;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <h1>Edit Buku</h1>
    <form action="{{ route('books.update', ['id' => $book->id]) }}" method="POST">
        @csrf
        @method('PATCH')
        <label>Judul Buku:</label>
        <input type="text" name="title" value="{{ old('title', $book->title) }}">
        @error('title') <div class="error">{{ $message }}</div> @enderror

        <label>Penulis:</label>
        <input type="text" name="author" value="{{ old('author', $book->author) }}">
        @error('author') <div class="error">{{ $message }}</div> @enderror

        <button type="submit">Simpan Perubahan</button>
    </form>
</body>
</html>
