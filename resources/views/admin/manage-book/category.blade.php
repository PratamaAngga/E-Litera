<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>E-Litera | category</title>
</head>
<body>

    <a href="{{route('home-admin')}}">bakc to homepage</a>
    @if ($errors->any())
    <div class="alert">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <form action="{{route('postCategory')}}" method="post">
        @csrf
        <label for="">tambahkan nama kategori</label>
        <input type="text" name="name_category" id="" required>

        <button type="submit">Submit</button>
    </form>

    @if(session('success'))
    <p>{{ session('success') }}</p>
@endif

<table border="1">
    <thead>
        <th>No</th>
        <th>ID category</th>
        <th>Nama kategori</th>
        <th>action</th>
    </thead>
    <tbody>
        @foreach($categories as $index => $category)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $category->id_category }}</td>
                <td>{{ $category->name_category }}</td>
                <td>
                    <form action="{{ route('deletecategory', $category->id_category) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>


</body>
</html>