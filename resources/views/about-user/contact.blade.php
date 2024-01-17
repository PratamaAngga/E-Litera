<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>E-Litera | Contact</title>
</head>
<body>
    <a href="{{ route('home')}}">back to home</a>
    <form action="{{ route('postReport')}}" method="post">
        @csrf
        <input type="hidden" name="user_id" value="{{ auth()->user()->id_user }}">

        <label for="">deskripsi</label>
        <textarea name="deskripsi" id="" cols="30" rows="10"></textarea>

        
        <button type="submit">Kirim</button>
        @if ($errors->any())
        <div class="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    </form>
</body>
</html>