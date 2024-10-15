<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activo extends Model
{
    use HasFactory;

    protected $table = 'activos';
    protected $primaryKey = 'id_activo';
    protected $fillable = ['nombre', 'tipo_adquisicion', 'fecha_adquisicion', 'vida_util', 'id_ubicacion', 'id_empleado'];

    public function ubicacion()
    {
        return $this->belongsTo(Ubicacion::class, 'id_ubicacion');
    }

    public function empleado()
    {
        return $this->belongsTo(Empleado::class, 'id_empleado');
    }

    public function disposiciones()
    {
        return $this->hasMany(Disposicion::class, 'id_activo');
    }

    public function mantenimientos()
    {
        return $this->hasMany(Mantenimiento::class, 'id_activo');
    }

    public function depreciaciones()
    {
        return $this->hasMany(Depreciacion::class, 'id_activo');
    }
}
