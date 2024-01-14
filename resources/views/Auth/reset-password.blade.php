@if ($errors->any())
    <div class="alert">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (session()->has('status'))
    <div class="alert">
        {{ session()->get('status') }}
    </div>
@endif

<form action="{{ route('password.update') }}" method="post">
    @csrf
    <input type="hidden" name="token" value="{{ $token }}">
    <label for="email">Alamat Email</label>
    <input type="email" name="email" value="{{ old('email') }}" required autofocus>

    <label for="password">Password Baru</label>
    <input type="password" name="password" required>

    <label for="password_confirmation">Konfirmasi Password Baru</label>
    <input type="password" name="password_confirmation" required>

    <button type="submit">Submit</button>
</form>
