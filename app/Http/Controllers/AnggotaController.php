<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anggota;

class AnggotaController extends Controller
{
    public function index()
    {
        if (!session('login')) {
            return redirect('/');
        }

        $anggota = Anggota::all();

        return view('anggota', compact('anggota'));
    }

    public function store(Request $request)
    {
        Anggota::create([
            'nama' => $request->nama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'telp' => $request->telp,
            'alamat' => $request->alamat
        ]);

        return redirect('/anggota');
    }

    public function update(Request $request, $id)
    {
        Anggota::where('id', $id)->update([
            'nama' => $request->nama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'telp' => $request->telp,
            'alamat' => $request->alamat
        ]);

        return redirect('/anggota');
    }

    public function delete($id)
    {
        Anggota::where('id', $id)->delete();

        return redirect('/anggota');
    }
}
