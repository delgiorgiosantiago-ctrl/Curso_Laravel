<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //

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
}
