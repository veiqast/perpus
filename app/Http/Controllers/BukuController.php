<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;

class BukuController extends Controller
{
    public function index(Request $request)
    {

        $search = $request->search;

        if ($search) {

            $buku = Buku::where(
                'judul',
                'like',
                '%' . $search . '%'
            )->get();
        } else {

            $buku = Buku::all();
        }

        return view('buku.index', compact(
            'buku',
            'search'
        ));
    }

    public function create()
    {
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

    public function edit($id)
    {
        $buku = Buku::find($id);

        return view('buku.edit', compact('buku'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'stok' => 'required|numeric|min:0'
        ]);

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
