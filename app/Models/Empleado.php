<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;

    protected $table = 'empleados';
    protected $primaryKey = 'id_empleado';
    protected $fillable = ['nombre_empleado', 'apellido_empleado', 'cargo_empleado', 'id_departamento', 'id_usuario'];

    public function departamento()
    {
        return $this->belongsTo(Departamento::class, 'id_departamento');
    }

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'id_usuario');
    }

    public function activos()
    {
        return $this->hasMany(Activo::class, 'id_empleado');
    }
}