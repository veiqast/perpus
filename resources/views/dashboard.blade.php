<!DOCTYPE html>
<a href="/buku">Kelola Buku</a>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>

<h2>Dashboard Perpustakaan</h2>

<p>Selamat datang {{ session('username') }}</p>

<a href="/logout">Logout</a>
<a href="/anggota">Data Anggota</a>
<a href="/peminjaman">Peminjaman Buku</a>

<hr>

<table border="1" cellpadding="10">
    <tr>
        <th>No</th>
        <th>Judul</th>
        <th>Pengarang</th>
        <th>Penerbit</th>
        <th>Stok</th>
    </tr>

    @foreach($buku as $item)
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $item->judul }}</td>
        <td>{{ $item->pengarang }}</td>
        <td>{{ $item->penerbit }}</td>
        <td>{{ $item->stok }}</td>
    </tr>
    @endforeach

</table>

</body>
</html>
