</html>
<head>
<!DOCTYPE html>
<html>
<head>
    <title>CRUD Buku</title>
</head>
<body>

<h2>Data Buku</h2>

<a href="/dashboard">Dashboard</a>
<a href="/logout">Logout</a>

<hr>

<h3>Tambah Buku</h3>

<form action="/buku/store" method="POST">
    @csrf

    <input type="text" name="judul" placeholder="Judul">
    <br><br>

    <input type="text" name="pengarang" placeholder="Pengarang">
    <br><br>

    <input type="text" name="penerbit" placeholder="Penerbit">
    <br><br>

    <input type="number" name="stok" placeholder="Stok">
    <br><br>

    <button type="submit">Simpan</button>
</form>

<hr>

<table border="1" cellpadding="10">

<tr>
    <th>No</th>
    <th>Judul</th>
    <th>Pengarang</th>
    <th>Penerbit</th>
    <th>Stok</th>
    <th>Aksi</th>
</tr>

@foreach($buku as $item)

<tr>

<form action="/buku/update/{{ $item->id }}" method="POST">
@csrf

    <td>{{ $loop->iteration }}</td>

    <td>
        <input type="text" name="judul" value="{{ $item->judul }}">
    </td>

    <td>
        <input type="text" name="pengarang" value="{{ $item->pengarang }}">
    </td>

    <td>
        <input type="text" name="penerbit" value="{{ $item->penerbit }}">
    </td>

    <td>
        <input type="number" name="stok" value="{{ $item->stok }}">
    </td>

    <td>
        <button type="submit">Update</button>

        @if(session('level_user') == 'admin')

<a href="/buku/delete/{{ $item->id }}">
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

<form action="/buku" method="GET">

<input
    type="text"
    name="search"
    placeholder="Cari judul buku"
    value="{{ $search ?? '' }}"
>

<button type="submit">
    Cari
</button>

</form>

<hr>
