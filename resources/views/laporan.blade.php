<<!DOCTYPE html>
<html>
<head>
    <title>Laporan Peminjaman</title>
</head>
<body onload="window.print()">

<h2 align="center">
    LAPORAN PEMINJAMAN BUKU
</h2>

<hr>

<table border="1" width="100%" cellpadding="10" cellspacing="0">

<tr>
    <th>No</th>
    <th>Nama</th>
    <th>Buku</th>
    <th>Tanggal Pinjam</th>
    <th>Batas Kembali</th>
    <th>Dikembalikan</th>
    <th>Denda</th>
    <th>Status</th>
</tr>

@foreach($peminjaman as $item)

<tr>

<td>{{ $loop->iteration }}</td>

<td>{{ $item->anggota->nama }}</td>

<td>{{ $item->buku->judul }}</td>

<td>{{ $item->tanggal_pinjam }}</td>

<td>{{ $item->tanggal_kembali }}</td>

<td>{{ $item->tanggal_dikembalikan }}</td>

<td>
Rp. {{ $item->denda }}
</td>

<td>{{ $item->status }}</td>

</tr>

@endforeach

</table>

</body>
</html>
