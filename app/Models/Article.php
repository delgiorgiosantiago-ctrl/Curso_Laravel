<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    //

    protected $guarded = [
        'id',
        'created_at',
        'updated_at'    
    ];

    //Relacion de uno a muchos inversa
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //Relacion de uno a muchos (Article - Comment)
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    //Relacion de uno a muchos inversa (Category - Article)
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
   
}
