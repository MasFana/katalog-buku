<nav class="flex justify-center px-5 py-4">
    <ul class="flex flex-wrap justify-center gap-1 list-none m-0 p-0">
        <li>
            <a href="{{ route('books.index') }}"
               class="inline-block rounded-md px-4 py-2 text-sm font-medium transition
                      {{ request()->routeIs('books.index') ? 'font-bold text-blue-600' : 'text-gray-700 hover:bg-blue-100 hover:text-blue-600' }}">
                Beranda
            </a>
        </li>

        @if(isset($book))
            <li>
                <a href="{{ route('books.show', $book->id) }}"
                   class="inline-block rounded-md px-4 py-2 text-sm font-medium transition
                          {{ request()->routeIs('books.show') ? 'font-bold text-blue-600' : 'text-gray-700 hover:bg-blue-100 hover:text-blue-600' }}">
                    Detail Buku
                </a>
            </li>

            <li>
                <a href="{{ route('books.edit', $book->id) }}"
                   class="inline-block rounded-md px-4 py-2 text-sm font-medium transition
                          {{ request()->routeIs('books.edit') ? 'font-bold text-blue-600' : 'text-gray-700 hover:bg-blue-100 hover:text-blue-600' }}">
                    Edit Buku
                </a>
            </li>
        @endif
    </ul>
</nav>
