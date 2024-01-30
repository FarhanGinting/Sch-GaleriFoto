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

    //many to one relationship
    public function user()
    {
        return $this->belongsTo(User::class, 'UserID', 'id');
    }

    public function foto()
    {
        return $this->belongsTo(Foto::class, 'FotoID', 'id');
    }

    
    
}
