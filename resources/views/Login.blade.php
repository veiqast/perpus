<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>

<h2>LOGIN PERPUSTAKAAN</h2>

@if(session('error'))
    <p>{{ session('error') }}</p>
@endif

<form action="/proses-login" method="POST">
    @csrf

    <input type="text" name="username" placeholder="Username">
    <br><br>

    <input type="password" name="password" placeholder="Password">
    <br><br>

    <button type="submit">Login</button>
</form>

</body>
</html>
