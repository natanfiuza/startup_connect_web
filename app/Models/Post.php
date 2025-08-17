<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /**
     * Retorna a lista de likes de um post
     *
     * @return array
     *
     */
    public function likes()
    {
        return $this->hasMany(Like::class);
    }
}
