<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>

<h2>Dashboard Perpustakaan</h2>

<p>
Selamat datang {{ session('username') }}
</p>

<hr>

<a href="/buku">Data Buku</a>

<br><br>

<a href="/anggota">Data Anggota</a>

<br><br>

<a href="/peminjaman">Peminjaman Buku</a>

<br><br>

<a href="/logout">Logout</a>

<hr>

<h3>Statistik</h3>

<table border="1" cellpadding="10">

<tr>
    <td>Total Buku</td>
    <td>{{ $totalBuku }}</td>
</tr>

<tr>
    <td>Total Anggota</td>
    <td>{{ $totalAnggota }}</td>
</tr>

<tr>
    <td>Sedang Dipinjam</td>
    <td>{{ $dipinjam }}</td>
</tr>

<tr>
    <td>Sudah Dikembalikan</td>
    <td>{{ $dikembalikan }}</td>
</tr>

<tr>
    <td>Total Denda</td>
    <td>Rp. {{ $totalDenda }}</td>
</tr>

</table>

</body>
</html>
