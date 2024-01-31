<?php

namespace App\Models;

use App\Models\Foto;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Komentarfoto extends Model
{
    use HasFactory;

    protected $table = 'komentarfoto';

    protected $fillable = [
        'FotoID',
        'UserID',
        'komentar',
        'tanggal',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'UserID', 'id');
    }

    public function foto()
    {
        return $this->belongsTo(Foto::class, 'FotoID', 'id');
    }

    
}
