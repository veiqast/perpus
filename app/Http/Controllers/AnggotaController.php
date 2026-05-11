<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anggota;

class AnggotaController extends Controller
{
    public function index(Request $request)
    {


        $search = $request->search;

        if ($search) {

            $anggota = Anggota::where(
                'nama',
                'like',
                '%' . $search . '%'
            )->get();
        } else {

            $anggota = Anggota::all();
        }

        return view('anggota', compact(
            'anggota',
            'search'
        ));
    }

    public function create()
    {
        return view('anggota.create');
    }
    public function store(Request $request)
    {
        Anggota::create([
            'nama' => $request->nama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'no_telp' => $request->no_telp,
            'alamat' => $request->alamat
        ]);

        return redirect('/anggota');
    }
    public function edit($id)
    {
        $anggota = Anggota::find($id);

        return view('anggota.edit', compact(
            'anggota'
        ));
    }

    public function update(Request $request, $id)
    {
        request()->validate([
            'nama' => 'required',
            'no_telp' => 'required',
        ]);

        Anggota::where('id', $id)->update([
            'nama' => $request->nama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'no_telp' => $request->no_telp,
            'alamat' => $request->alamat
        ]);

        return redirect('/anggota');
    }

    public function delete($id)
    {
        if (session('level_user') != 'admin') {
            return redirect('/anggota');
        }

        Anggota::where('id', $id)->delete();

        return redirect('/anggota');
    }
}
