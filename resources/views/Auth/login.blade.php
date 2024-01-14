<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>E-Litera | Login page</title>
</head>
<body>
    <form action="{{ route('login')}}" method="post">
        @csrf
        <label for="">Username</label>
        <input type="text" name="name_user" id=""> <br>
        <label for="">password</label>
        <input type="password" name="password" id="">

        <button type="submit">Submit</button>
    </form>

    <a href="{{ route('google-login')}}">login menggunakan google</a> <br>

    <a href="{{ route('register')}}">belum punya akun? daftar diisni</a><br>

    <a href="{{ route('password-request')}}">Forgot your password?</a> <br>
</body>
</html>