<?php

namespace App\Models;

use App\Models\peminjaman;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    protected $table = 'buku';

    public $timestamps = false;

    protected $fillable = [
        'judul',
        'pengarang',
        'penerbit',
        'stok'
    ];
    public function peminjaman()
    {
        return $this->hasMany(Peminjaman::class);
    }
}
