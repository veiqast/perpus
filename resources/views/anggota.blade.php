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

   <div class="mb-3">
    <label>Jenis Kelamin</label>

    <select name="jenis_kelamin" class="form-control" required>
        <option value="">-- Pilih Jenis Kelamin --</option>
        <option value="L">Laki-laki</option>
        <option value="P">Perempuan</option>
    </select>
</div>

    <input type="text" name="no_telp" placeholder="no_Telp">
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
    <th>Jenis Kelamin</th>
    <th>No Telp</th>
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
    <input type="text" name="jenis_kelamin" value="{{ $item->jenis_kelamin }}">
</td>

<td>
    <input type="text" name="no_telp" value="{{ $item->no_telp }}">
</td>

<td>
    <textarea name="alamat">{{ $item->alamat }}</textarea>
</td>

<td>

<button type="submit">
    Update
</button>

@if(session('level_user') == 'admin')
<a href="/anggota/delete/{{ $item->id }}">
    Delete
</a>
@endif

</td>

</form>

</tr>

@endforeach

</table>

</body>
</html>
<hr>

<form action="/anggota" method="GET">

<input
    type="text"
    name="search"
    placeholder="Cari anggota"
    value="{{ $search ?? '' }}"
>

<button type="submit">
    Cari
</button>

</form>

<hr>
