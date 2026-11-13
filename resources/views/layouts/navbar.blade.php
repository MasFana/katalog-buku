<nav class="flex justify-center px-5 py-4">
    <ul class="m-0 flex list-none flex-wrap justify-center gap-1 p-0">
        <li>
            <a class="{{ request()->routeIs('books.index') ? 'font-bold text-blue-600' : 'text-gray-700 hover:bg-blue-100 hover:text-blue-600' }} inline-block rounded-md px-4 py-2 text-sm font-medium transition"
                href="{{ route('books.index') }}">
                Beranda
            </a>
        </li>

        @if (isset($book))
            <li>
                <a class="{{ request()->routeIs('books.show') ? 'font-bold text-blue-600' : 'text-gray-700 hover:bg-blue-100 hover:text-blue-600' }} inline-block rounded-md px-4 py-2 text-sm font-medium transition"
                    href="{{ route('books.show', $book->id) }}">
                    Detail Buku
                </a>
            </li>

            <li>
                <a class="{{ request()->routeIs('books.edit') ? 'font-bold text-blue-600' : 'text-gray-700 hover:bg-blue-100 hover:text-blue-600' }} inline-block rounded-md px-4 py-2 text-sm font-medium transition"
                    href="{{ route('books.edit', $book->id) }}">
                    Edit Buku
                </a>
            </li>
        @endif
    </ul>
</nav>
