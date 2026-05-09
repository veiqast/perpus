<!DOCTYPE html>
<html>
<head>
    <title>CRUD Anggota</title>
</head>
<body>

<h2>Data Anggota</h2>

<a href="/dashboard">Dashboard</a>
<a href="/buku">Data Buku</a>
<a href="/logout">Logout</a>

<hr>

<h3>Tambah Anggota</h3>

<form action="/anggota/store" method="POST">

    @csrf

    <input type="text" name="nama" placeholder="Nama">
    <br><br>

    <input type="text" name="jk" placeholder="Jenis Kelamin">
    <br><br>

    <input type="text" name="telp" placeholder="No Telp">
    <br><br>

    <textarea name="alamat" placeholder="Alamat"></textarea>
    <br><br>

    <button type="submit">Simpan</button>

</form>

<hr>

<table border="1" cellpadding="10">

<tr>
    <th>No</th>
    <th>Nama</th>
    <th>JK</th>
    <th>Telp</th>
    <th>Alamat</th>
    <th>Aksi</th>
</tr>

@foreach($anggota as $item)

<tr>

<form action="/anggota/update/{{ $item->id }}" method="POST">

@csrf

<td>{{ $loop->iteration }}</td>

<td>
    <input type="text" name="nama" value="{{ $item->nama }}">
</td>

<td>
    <input type="text" name="jk" value="{{ $item->jk }}">
</td>

<td>
    <input type="text" name="telp" value="{{ $item->telp }}">
</td>

<td>
    <textarea name="alamat">{{ $item->alamat }}</textarea>
</td>

<td>

<button type="submit">
    Update
</button>

<a href="/anggota/delete/{{ $item->id }}">
    Delete
</a>

</td>

</form>

</tr>

@endforeach

</table>

</body>
</html>
