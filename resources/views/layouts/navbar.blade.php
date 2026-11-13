
<style>
    .navbar {
        width: 100%;
        padding: 16px 20px;
        display: flex;
        justify-content: center;
        align-items: center;
        font-family: sans-serif;
        box-sizing: border-box;
    }

    .navbar-menu {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 12px;
        list-style: none;
        margin: 0;
        padding: 0;
    }

    .navbar-menu a {
        display: inline-block;
        color: #374151;
        text-decoration: none;
        padding: 9px 16px;
        border-radius: 6px;
        font-size: 14px;
        font-weight: 500;
        transition: background 0.2s, color 0.2s;
    }

    .navbar-menu a:hover {
        background: #dbeafe;
        color: #2563eb;
    }

    .navbar-menu a.active {
        color: #2563eb;
        font-weight: bold;
    }

    @media (max-width: 480px) {
        .navbar-menu {
            flex-wrap: wrap;
            gap: 4px;
        }
    }
</style>

<nav class="navbar">
    <ul class="navbar-menu">
        <li>
            <a href="{{ route('books.index') }}"
               class="{{ request()->routeIs('books.index') ? 'active' : '' }}">
                Beranda
            </a>
        </li>

        @if(isset($book))
            <li>
                <a href="{{ route('books.show', $book->id) }}"
                   class="{{ request()->routeIs('books.show') ? 'active' : '' }}">
                    Detail Buku
                </a>
            </li>

            <li>
                <a href="{{ route('books.edit', $book->id) }}"
                   class="{{ request()->routeIs('books.edit') ? 'active' : '' }}">
                    Edit Buku
                </a>
            </li>
        @endif
    </ul>
</nav>
