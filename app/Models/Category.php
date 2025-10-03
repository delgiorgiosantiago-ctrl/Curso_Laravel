<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
        'created_at',
        'updated_at'    
    ];

    //Relacion de uno a muchos (Article - Category)
    public function articles()
    {
        return $this->hasMany(Article::class);
    }

    //Utilizar slug en vez de id
    public function getRouteKeyName()
    {
        return 'slug';
    } 
}
