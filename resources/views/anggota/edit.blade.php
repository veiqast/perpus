@extends('layouts.app')

@section('content')

<h2>Edit Anggota</h2>

<form
action="/anggota/update/{{ $anggota->id }}"
method="POST"
>

@csrf

<div class="mb-3">

<label>Nama</label>

<input
type="text"
name="nama"
value="{{ $anggota->nama }}"
class="form-control"
>

</div>

<div class="mb-3">

<label>Jenis Kelamin</label>

<select
name="jenis_kelamin"
class="form-control"
>

<option
value="L"
{{ $anggota->jenis_kelamin == 'L' ? 'selected' : '' }}>
Laki-Laki
</option>

<option
value="P"
{{ $anggota->jenis_kelamin == 'P' ? 'selected' : '' }}>
Perempuan
</option>

</select>

</div>

<div class="mb-3">

<label>No Telp</label>

<input
type="text"
name="no_telp"
value="{{ $anggota->no_telp }}"
class="form-control"
>

</div>

<div class="mb-3">

<label>Alamat</label>

<textarea
name="alamat"
class="form-control"
>{{ $anggota->alamat }}</textarea>

</div>

<button type="submit" class="btn btn-success">
    Update
</button>

</form>

@endsection
