<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Peminjaman;

class anggota extends Model
{
    protected $table = 'anggota';
    public $timestamps = false;
    protected $fillable = [
        'nama',
        'jenis_kelamin',
        'alamat',
        'no_telp',
    ];
    use HasFactory;

    public function peminjaman()
    {
        return $this->hasMany(Peminjaman::class);
    }
}
