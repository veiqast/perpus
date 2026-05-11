@extends('layouts.app')

@section('content')

<h2>Data Anggota</h2>

<a href="/anggota/create" class="btn btn-primary mb-3">
    Tambah Anggota
</a>

<form action="/anggota" method="GET" class="mb-3">

<div class="row">

<div class="col-md-4">

<input
type="text"
name="search"
class="form-control"
placeholder="Cari anggota"
value="{{ $search ?? '' }}"
>

</div>

<div class="col-md-2">

<button type="submit" class="btn btn-success">
    Cari
</button>

</div>

</div>

</form>

<table class="table table-bordered">

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

<td>{{ $loop->iteration }}</td>

<td>{{ $item->nama }}</td>

<td>{{ $item->jenis_kelamin }}</td>

<td>{{ $item->no_telp }}</td>

<td>{{ $item->alamat }}</td>

<td>

<a
href="/anggota/edit/{{ $item->id }}"
class="btn btn-warning btn-sm">
Edit
</a>

<a
href="/anggota/delete/{{ $item->id }}"
class="btn btn-danger btn-sm">
Delete
</a>

</td>

</tr>

@endforeach

</table>

@endsection
