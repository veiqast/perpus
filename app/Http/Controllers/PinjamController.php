<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PinjamController extends Controller
{
    public function pinjam(Request $request)

    {
        $buku = Buku::find($request->buku_id);

        if ($buku->stok <= 0) {
            return back()->with('error', 'Stok habis');
        }

        Pinjam::create([
            'buku_id' => $request->buku_id,
            'anggota_id' => $request->anggota_id,
            'tgl_pinjam' => now(),
            'tgl_kembali' => now()->addDays(7),
        ]);

        $buku->decrement('stok');

        return back()->with('success', 'Berhasil pinjam');
    }

    public function kembali($id)
    {
        $pinjam = Pinjam::find($id);

        $today = now();
        $denda = 0;

        if ($today->gt($pinjam->tgl_kembali)) {
            $telat = $today->diffInDays($pinjam->tgl_kembali);
            $denda = $telat * 1000; // contoh 1000/hari
        }

        $pinjam->update([
            'tgl_terima' => $today,
            'denda' => $denda
        ]);

        $pinjam->buku->increment('stok');

        return back()->with('success', 'Buku dikembalikan');
    }
    public function cari(Request $request)
    {
        $keyword = $request->keyword;

        $buku = Buku::where('judul', 'ILIKE', "%$keyword%")
            ->orWhere('pengarang', 'ILIKE', "%$keyword%")
            ->get();

        return view('buku.index', compact('buku'));
    }
}
