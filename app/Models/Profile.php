<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    /**
     * Lista o setor do perfil do usuário
     *
     * @return Sector::class
     *
     */
    public function sector()
    {
        return $this->belongsTo(Sector::class);
    }
}
