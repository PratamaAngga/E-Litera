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

<form action="{{ route('password-reset') }}" method="post">
    @csrf
    <input type="email" name="email" required>
    <button type="submit">Submit</button>
</form>
