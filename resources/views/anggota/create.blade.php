@extends('layouts.app')

@section('content')

<h2>Tambah Anggota</h2>

@if($errors->any())

<div class="alert alert-danger">

<ul>

@foreach($errors->all() as $error)

<li>{{ $error }}</li>

@endforeach

</ul>

</div>

@endif

<form action="/anggota/store" method="POST">

@csrf

<div class="mb-3">

<label>Nama</label>

<input
type="text"
name="nama"
class="form-control"
>

</div>

<div class="mb-3">

<label>Jenis Kelamin</label>

<select
name="jenis_kelamin"
class="form-control"
>

<option value="L">
    Laki-Laki
</option>

<option value="P">
    Perempuan
</option>

</select>

</div>

<div class="mb-3">

<label>No Telp</label>

<input
type="text"
name="telp"
class="form-control"
>

</div>

<div class="mb-3">

<label>Alamat</label>

<textarea
name="alamat"
class="form-control"
></textarea>

</div>

<button type="submit" class="btn btn-primary">
    Simpan
</button>

</form>

@endsection
