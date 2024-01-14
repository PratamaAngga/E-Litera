<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>E-Library | Register</title>
</head>
<body>
    <form method="POST" action="{{ route('register_form')}}">
        @csrf
        <label for="">email</label>
        <input type="text" name="email" required id=""><br>
        <label for="">Username</label>
        <input type="text" name="username" required id=""><br>
        <label for="">nama lengkap</label>
        <input type="text" name="nama_lengkap" required id=""><br>
        <label for="">nomor telepon</label>
        <input type="number" name="no_telp" required id=""><br>
        <label for="">password</label>
        <input type="password" name="password" required id=""><br>
        <label for="">confirm</label>
        <input type="password" name="password_confirmation" required id="">

        <button type="submit">Submit</button><br>
    </form>

    <a href="{{ route('google-login')}}">login menggunakan google</a><br>

    <a href="{{ route('login')}}">sudah punya akun? masuk disini</a>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
</body>
</html>