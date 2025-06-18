<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'descripcion',
        'image',
        'user_id',
    ];

    /**
     * Get the user that owns the post.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the comments for the post.
     */
    public function comentarios(){
        return $this->hasMany(Comentario::class);
    }

     /**
      * Get the likes for the post.
     */
    public function likes()
    {
        return $this->hasMany(Like::class);
    }


    public function checkLike(User $user)
    {
        return $this->likes->contains('user_id', $user->id);
    }
}
