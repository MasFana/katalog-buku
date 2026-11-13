@extends('layouts.app')


@section('content')
<div>
    <h1>Edit Produk</h1>

    <form action="{{ route('products.update', $product->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="name">Nama Produk</label>
            <input type="text" id="name" name="name" value="{{ $product->name }}" required>
        </div>

        <div>
            <label for="stock">Stock</label>
            <input type="number" id="stock" name="stock" value="{{ $product->stock }}" required>
        </div>
        <div>
            <label for="price">Harga</label>
            <input type="number" id="price" name="price" value="{{ $product->price }}" required>
        </div>
        <button type="submit">Simpan</button>
    </form>
</div>
@endsection
