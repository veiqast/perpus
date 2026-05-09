<table border="1" cellpadding="10">

<tr>
    <th>No</th>
    <th>Nama</th>
    <th>Buku</th>
    <th>Tanggal Pinjam</th>
    <th>Batas Kembali</th>
    <th>Tanggal Dikembalikan</th>
    <th>Denda</th>
    <th>Status</th>
    <th>Aksi</th>
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

<td>
{{ $item->status }}
</td>

<td>

@if($item->status == 'dipinjam')

<a href="/peminjaman/kembali/{{ $item->id }}">
    Kembalikan
</a>

@endif

</td>

</tr>

@endforeach

</table>
