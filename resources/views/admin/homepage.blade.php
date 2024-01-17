{{-- hello admin --}}
<a href="{{ route('categoryPage') }}">Tambah kategori</a><br>
<a href="{{ route('newbookPage') }}">Tambah buku</a>

<form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit">Logout</button> 
</form> 