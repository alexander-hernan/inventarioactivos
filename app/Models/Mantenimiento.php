<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mantenimiento extends Model
{
    use HasFactory;

    protected $table = 'mantenimientos';
    protected $primaryKey = 'id_mantenimiento';
    protected $fillable = [
        'fecha_mantenimiento',
        'tipo_mantenimiento',
        'descripcion',
        'costo_mantenimiento',
        'id_activo',
        'id_proveedor',
    ];

    public function activo()
    {
        return $this->belongsTo(Activo::class, 'id_activo');
    }

    public function proveedor()
    {
        return $this->belongsTo(Proveedor::class, 'id_proveedor');
    }
}
