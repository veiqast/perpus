<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Anggota;
use App\Models\Peminjaman;

class DashboardController extends Controller
{
    public function index()
    {
        if (!session('login')) {
            return redirect('/');
        }

        $totalBuku = Buku::count();

        $totalAnggota = Anggota::count();

        $dipinjam = Peminjaman::where(
            'status',
            'dipinjam'
        )->count();

        $dikembalikan = Peminjaman::where(
            'status',
            'dikembalikan'
        )->count();

        $totalDenda = Peminjaman::sum('denda');

        return view('dashboard', compact(
            'totalBuku',
            'totalAnggota',
            'dipinjam',
            'dikembalikan',
            'totalDenda'
        ));
    }
}
