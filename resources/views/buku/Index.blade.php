@extends('layouts.app')

@section('content')

<h2>Data Buku</h2>

<a href="/buku/create" class="btn btn-primary mb-3">
    Tambah Buku
</a>

<form action="/buku" method="GET" class="mb-3">

<div class="row">

<div class="col-md-4">

<input
    type="text"
    name="search"
    class="form-control"
    placeholder="Cari buku"
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
    <th>Judul</th>
    <th>Pengarang</th>
    <th>Penerbit</th>
    <th>Stok</th>
    <th>Aksi</th>
</tr>

@foreach($buku as $item)

<tr>

<td>{{ $loop->iteration }}</td>

<td>{{ $item->judul }}</td>

<td>{{ $item->pengarang }}</td>

<td>{{ $item->penerbit }}</td>

<td>{{ $item->stok }}</td>

<td>

<a
href="/buku/edit/{{ $item->id }}"
class="btn btn-warning btn-sm">
Edit
</a>

<a
href="/buku/delete/{{ $item->id }}"
class="btn btn-danger btn-sm">
Delete
</a>

</td>

</tr>

@endforeach

</table>

@endsection
