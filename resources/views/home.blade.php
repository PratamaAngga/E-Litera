<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>E-Litera | Home</title>
</head>
<body>

    {{$user->id_user}}
    {{$user->username}}
    <a href="{{ route('about-user.profile', ['id' => Auth::id()]) }}">Profile user</a> <br>
    <a href="{{ route ('contactPage')}}">open contact</a>

    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit">Logout</button> 
    </form>
</body>
</html>