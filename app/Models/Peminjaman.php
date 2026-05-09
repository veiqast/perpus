<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use App\Models\Anggota;
use App\Models\Buku;

class Peminjaman extends Model
{
    protected $table = 'peminjaman';
    public $timestamps = false;
    protected $fillable = [
        'anggota_id',
        'buku_id',
        'tanggal_pinjam',
        'tanggal_kembali',
        'tanggal_dikembalikan',
        'denda',
        'status',
    ];

    public function anggota()
    {
        return $this->belongsTo(Anggota::class,);
    }
    public function buku()
    {
        return $this->belongsTo(Buku::class);
    }
}
