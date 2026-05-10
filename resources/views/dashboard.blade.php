@extends('layouts.app')

@section('content')

<h2>Dashboard Perpustakaan</h2>

<div class="row">

<div class="col-md-3">

<div class="card">

<div class="card-body">

<h5>Total Buku</h5>

<h3>{{ $totalBuku }}</h3>

</div>

</div>

</div>

<div class="col-md-3">

<div class="card">

<div class="card-body">

<h5>Total Anggota</h5>

<h3>{{ $totalAnggota }}</h3>

</div>

</div>

</div>

<div class="col-md-3">

<div class="card">

<div class="card-body">

<h5>Dipinjam</h5>

<h3>{{ $dipinjam }}</h3>

</div>

</div>

</div>

<div class="col-md-3">

<div class="card">

<div class="card-body">

<h5>Total Denda</h5>

<h3>Rp {{ $totalDenda }}</h3>

</div>

</div>

</div>

</div>

@endsection
