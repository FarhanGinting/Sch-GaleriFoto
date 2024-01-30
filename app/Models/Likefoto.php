<?php

namespace App\Models;

use App\Models\Foto;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Likefoto extends Model
{
    use HasFactory;

    protected $table = 'likefoto';

    protected $fillable = [
        'FotoID',
        'UserID',
        'tanggal',
    ];

    
}
