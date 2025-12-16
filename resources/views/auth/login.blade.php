<!DOCTYPE html>
<html>
<head>
    <title>Login RSHP</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>

<body>

<div class="login-box">

    <h2 class="title">Login RSHP</h2>

    {{-- Error Session --}}
    @if (session('error'))
        <div class="alert-error">{{ session('error') }}</div>
    @endif

    {{-- Validation Error --}}
    @if ($errors->any())
        <div class="alert-error">
            @foreach ($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        </div>
    @endif

    <form action="{{ url('/login') }}" method="POST">
        @csrf

        <label>Email</label>
        <input type="email" name="email" required>

        <label>Password</label>
        <input type="password" name="password" required>

        <button type="submit" class="btn-login">Login</button>
    </form>

</div>

</body>
</html>