<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
</head>
<body>

    <a href="{{ route('home')}}">back to home</a>

    <h1>User Profile</h1><br>
    user photo profile <br>
    {{-- <img src="{{ asset('/storage/profile_photos' . $user->photo) }}" alt="Profile Photo"> --}}
    {{-- @if ($user->photo && Storage::disk('public')->exists($user->photo))
    <img src="{{ asset('./storage/app/public/profile_photos' . $user->photo) }}" alt="Profile Photo">
    @endif --}}
    <img src="{{ asset('storage/' . $user->photo) }}" alt="Profile Photo" m>

    @if (session('success'))
        <div>{{ session('success') }}</div>
    @endif

    <form action="{{ route('about-user.profile.edit', ['id' => Auth::id()]) }}" method="post" enctype="multipart/form-data">
        @csrf
        <label for="photo">Foto</label>
        <input type="file" name="photo" id="photo"><br>

        <label for="email">Email</label>
        <input type="text" name="email" id="email" value="{{old('email', $user->email) }}"><br>

        <label for="username">Username</label>
        <input type="text" name="username" id="username" value="{{ old('username', $user->username) }}"><br>

        <label for="nama_lengkap">Nama Lengkap</label>
        <input type="text" name="nama_lengkap" id="nama_lengkap" value="{{old('nama_lengkap', $user->nama_lengkap) }}"><br>

        <label for="no_telp">No Telepon</label>
        <input type="text" name="no_telp" id="no_telp" value="{{old('no_telp', $user->no_telp) }}"><br>

        <label for="alamat">Alamat</label>
        <input type="text" name="alamat" id="alamat" value="{{old('alamat', $user->alamat) }}"><br>

        <button type="submit">Submit</button>
    </form>

</body>
</html>
