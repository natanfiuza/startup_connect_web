<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sector extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'description',

    ];
    /**
     * Lista os perfis associados a este setors
     *
     * @return array <int, \App\Models\Profile>
     *
     */
    public function profiles()
    {
        return $this->hasMany(Profile::class);
    }
}
