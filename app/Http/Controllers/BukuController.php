<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;

class BukuController extends Controller
{
    public function index()
    {
        if (!session('login')) {
            return redirect('/');
        }

        $buku = Buku::all();

        return view('buku', compact('buku'));
    }

    public function create()
    {
        if (!session('login')) {
            return redirect('/');
        }

        return view('buku.create');
    }

    public function store(Request $request)
    {
        Buku::create([
            'judul' => $request->judul,
            'pengarang' => $request->pengarang,
            'penerbit' => $request->penerbit,
            'stok' => $request->stok
        ]);

        return redirect('/buku');
    }

    public function update(Request $request, $id)
    {
        Buku::where('id', $id)->update([
            'judul' => $request->judul,
            'pengarang' => $request->pengarang,
            'penerbit' => $request->penerbit,
            'stok' => $request->stok
        ]);
        return redirect('/buku');
    }
    public function delete($id)
    {
        Buku::where('id', $id)->delete();

        return redirect('/buku');
    }
}
