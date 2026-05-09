<?php

namespace App\Http\Controllers;

use App\Models\Buku;

class DashboardController extends Controller
{
    public function index()
    {
        if (!session('login')) {
            return redirect('/');
        }

        $buku = Buku::all();

        return view('dashboard', compact('buku'));
    }
}
