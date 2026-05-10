@extends('layouts.app')

@section('content')

<h2>Edit Buku</h2>

<form action="/buku/update/{{ $buku->id }}" method="POST">

@csrf

<div class="mb-3">

<label>Judul</label>

<input
type="text"
name="judul"
value="{{ $buku->judul }}"
class="form-control"
>

</div>

<div class="mb-3">

<label>Pengarang</label>

<input
type="text"
name="pengarang"
value="{{ $buku->pengarang }}"
class="form-control"
>

</div>

<div class="mb-3">

<label>Penerbit</label>

<input
type="text"
name="penerbit"
value="{{ $buku->penerbit }}"
class="form-control"
>

</div>

<div class="mb-3">

<label>Stok</label>

<input
type="number"
name="stok"
min="0"
class="form-control"
>

</div>

<button type="submit" class="btn btn-success">
    Update
</button>

</form>

@endsection
