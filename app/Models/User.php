<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Peminjaman;

class User extends Model
{
    protected $table = 'users';

    public $timestamps = false;

    protected $fillable = [
        'username',
        'password',
        'level_user'
    ];
    public function peminjaman()
    {
        return $this->hasMany(Peminjaman::class);
    }
}
