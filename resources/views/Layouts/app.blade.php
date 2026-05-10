<!DOCTYPE html>
<html>
<head>
    <title>Sistem Perpustakaan</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">

<div class="container">

<a class="navbar-brand" href="/dashboard">
    Perpustakaan
</a>

<div>

<a href="/dashboard" class="btn btn-light btn-sm">
    Dashboard
</a>

<a href="/buku" class="btn btn-light btn-sm">
    Buku
</a>

<a href="/anggota" class="btn btn-light btn-sm">
    Anggota
</a>

<a href="/peminjaman" class="btn btn-light btn-sm">
    Peminjaman
</a>

<a href="/laporan" class="btn btn-warning btn-sm">
    Laporan
</a>

<a href="/logout" class="btn btn-danger btn-sm">
    Logout
</a>

</div>

</div>

</nav>

<div class="container mt-4">

@yield('content')

</div>

</body>
</html>
