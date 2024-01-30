<?php

namespace App\Models;

use App\Models\Foto;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Album extends Model
{
    use HasFactory;

    protected $table = 'album';

    protected $fillable = [
        'nama',
        'deskripsi',
        'tanggal',
        'UserID',
    ];

}
