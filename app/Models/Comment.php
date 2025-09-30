<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //

    protected $guarded = [
        'id',
        'created_at',
        'updated_at'    
    ];

    //Relacion de uno a muchos (Comment - User)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //Relacion de uno a muchos inversa (Comment - Article)
    public function article()
    {
        return $this->belongsTo(Article::class);
    }
}
