<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Depreciacion extends Model
{
    use HasFactory;

    protected $table = 'depreciaciones';
    protected $primaryKey = 'id_depreciacion';
    protected $fillable = ['año', 'valor_depreciacion', 'id_activo'];

    public function activo()
    {
        return $this->belongsTo(Activo::class, 'id_activo');
    }
}