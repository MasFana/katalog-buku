@extends('layouts.app')

@section('content')
    <h1>Halam Produk</h1>

    <form action="{{ route('products.store') }}" method="post">
        @csrf
        <input name="name" type="text" placeholder="Name">
        <input name="price" type="number" placeholder="Price">
        <input name="stock" type="number" placeholder="Stock">
        <button type="submit">Add Product</button>
    </form>
    <br>
    <h1 class="text-xl">Daftar Produk</h1>
    <br>
    <div>

        @forelse ($products as $product)
            <div class="flex flex-col">
                <h2>{{ $product->name }}</h2>
                <p>Price: {{ $product->price }}</p>
                <p>Stock: {{ $product->stock }}</p>
                <a href="{{ route('products.edit', $product) }}">Edit</a>
                <form style="display:inline;" action="{{ route('products.destroy', $product) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </div>

        @empty
        <p>Gaada Produk Bre</p>
        @endforelse
    </div>
@endsection
