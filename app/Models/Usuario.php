<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Usuario extends Authenticatable
{
    use Notifiable;

    protected $table = 'usuarios';
    protected $primaryKey = 'id_usuario';
    protected $fillable = ['nombre_usuario', 'email_usuario', 'contraseña_usuario'];

    protected $hidden = ['contraseña_usuario'];

    public function getAuthPassword()
    {
        return $this->contraseña_usuario;
    }

    public function empleado()
    {
        return $this->hasOne(Empleado::class, 'id_usuario');
    }
}