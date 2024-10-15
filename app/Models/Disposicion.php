<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disposicion extends Model
{
    use HasFactory;

    protected $table = 'disposiciones';
    protected $primaryKey = 'id_disposicion';
    protected $fillable = ['fecha_disposicion', 'tipo_disposicion', 'valor_disposicion', 'id_activo'];

    protected $with = ['activo']; // Esto cargará automáticamente la relación con el activo

    public function activo()
    {
        return $this->belongsTo(Activo::class, 'id_activo');
    }
}