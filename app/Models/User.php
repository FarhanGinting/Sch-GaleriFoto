<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Foto;
use App\Models\Album;
use App\Models\Likefoto;
use App\Models\Komentarfoto;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

     protected $table = 'users';

    protected $fillable = [
        'name',
        'email',
        'password',
        'namalengkap',
        'alamat',
        'role_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    
    public function likefoto()
    {
        return $this->hasMany(Likefoto::class, 'UserID', 'id');
    }

    public function album()
    {
        return $this->hasMany(Album::class, 'UserID', 'id');
    }

    public function komentarfoto()
    {
        return $this->hasMany(Komentarfoto::class, 'UserID', 'id');
    }

    public function foto()
    {
        return $this->hasMany(Foto::class, 'UserID', 'id');
    }

    public function role()
    {
        return $this->belongsTo(Roles::class, 'role_id', 'id');
    }
}
