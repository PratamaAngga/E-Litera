<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>E-Litera</title>
</head>
<body>
    @if ($errors->any())
    <div class="alert">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <a href="{{route('home-admin')}}">bakc to homepage</a>


    <form action="{{ route('addNewBook')}}" method="post" enctype="multipart/form-data">
        @csrf
        <label for="">judul buku</label>
        <input type="text" name="judul" id=""><br>
        <label for="">kode buku</label>
        <input type="text" name="kode_buku" id=""><br>
        <label for="">penulis</label>
        <input type="text" name="penulis" id=""><br>
        <label for="">penerbit</label>
        <input type="text" name="penerbit" id=""><br>
        <label for="">tahun terbit</label>
        <input type="text" name="tahun_terbit" id=""><br>
        <label for="">jumlah buku</label>
        <input type="text" name="jumlah_buku" id=""><br>
        <label for="">deskripsi</label>
        <textarea name="deskripsi" id="" cols="30" rows="10"></textarea> <br>
        <label for="categories">Kategori:</label>
        @foreach($categories as $category)
        <input type="checkbox" id="category{{ $category->id_category }}" name="categories[]" value="{{ $category->id_category }}">
        <label for="category{{ $category->id_category }}">{{ $category->name_category }}</label><br>
        @endforeach

        <label for="">gambar</label>
        <input type="file" name="gambar" id=""><br>
    

        <button type="submit">Submit</button>
    </form>


</body>
</html>