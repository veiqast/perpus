<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;
use App\Models\Anggota;
use App\Models\Peminjaman;
use Carbon\Carbon;

class PeminjamanController extends Controller
{
    public function index()
    {

        $anggota = Anggota::all();

        $buku = Buku::all();

        $peminjaman = Peminjaman::with(
            'anggota',
            'buku',
            'user',
        )->get();

        return view('peminjaman', compact(
            'peminjaman',
            'anggota',
            'buku'
        ));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_anggota' => 'required|exists:anggota,id',
            'id_buku' => 'required|exists:buku,id',
            'tanggal_pinjam' => 'required|date',
            'tanggal_kembali' => 'required|date|after:tanggal_pinjam',
        ]);

        $buku = Buku::findOrFail($validated['id_buku']);

        if ($buku->stok < 1) {
            return back()->with('error', 'Stok tidak tersedia');
        }

        Peminjaman::create($validated);
        $buku->decrement('stok');

        return redirect('/peminjaman')->with('success', 'Peminjaman berhasil');

        $buku->decrement('stok');
        $buku->increment('stok');
    }

    public function kembali($id)
    {


        $pinjam = Peminjaman::find($id);
        $buku = Buku::find($pinjam->id_buku);
        $today = Carbon::now()->format('Y-m-d');
        $tglKembali = Carbon::parse($pinjam->tanggal_kembali);
        $tglSekarang = Carbon::parse($today);
        $telat = 0;
        $denda = 0;

        if ($tglSekarang > $tglKembali) {

            $telat = $tglKembali->diffInDays($tglSekarang);

            $denda = $telat * 1000;
        }

        $pinjam->update([
            'tanggal_dikembalikan' => $today,
            'denda' => $denda,
            'status' => 'dikembalikan'
        ]);

        $buku->stok = $buku->stok + 1;

        $buku->save();

        return redirect('/peminjaman');
    }
    public function laporan()
    {


        $peminjaman = Peminjaman::with(
            'anggota',
            'buku'
        )->get();

        return view('laporan', compact(
            'peminjaman'
        ));
    }
}
