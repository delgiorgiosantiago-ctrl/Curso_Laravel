<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'photo',
        'profession',
        'about',
        'twitter',
        'linkedin',
        'facebook',
        'user_id',
    ];

    // Relación con User (un perfil pertenece a un usuario)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}