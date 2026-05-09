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
        $peminjaman = Peminjaman::with(
            'anggota',
            'buku'
        )->get();

        return view('peminjaman.index', compact('peminjaman'));
        if (!session('login')) {
            return redirect('/');
        }
        $anggota = Anggota::all();
        $buku = Buku::all();
        $peminjaman = Peminjaman::with('anggota', 'buku')->get();
        return view('peminjaman', compact('peminjaman', 'anggota', 'buku'));
    }
    public function store(Request $request)
    {
        $buku = Buku::find($request->id_buku);
        if ($buku->stok < 1) {
            return redirect('/peminjaman')->with('error', 'Stok buku tidak tersedia');
        }


        Peminjaman::create([
            'anggota_id' => $request->id_anggota,
            'buku_id' => $request->id_buku,
            'tanggal_pinjam' => $request->tanggal_pinjam,
            'tanggal_kembali' => $request->tanggal_kembali
        ]);
        $buku->stok = $buku->stok - 1;
        $buku->save();
        return redirect('/peminjaman');
    }
    public function kembali($id)
    {
        $pinjam = Peminjaman::find($id);

        $buku = Buku::find($pinjam->buku_id);

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
}
