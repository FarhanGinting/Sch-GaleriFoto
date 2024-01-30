<?php

namespace App\Models;

use App\Models\User;
use App\Models\Album;
use App\Models\Likefoto;
use App\Models\Komentarfoto;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Foto extends Model
{
    use HasFactory;

    protected $table = 'foto';

    protected $fillable = [
        'name',
        'deskripsi',
        'tanggal',
        'lokasi',
        'AlbumID',
        'UserID',
    ];

    
}
