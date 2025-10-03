<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends Model
{
    use HasFactory;

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
   
    #Utilizar slug en vez de id
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
