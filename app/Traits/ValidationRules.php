<?php

namespace App\Traits;

trait ValidationRules
{
    public static function getValidationRules()
    {
        return [
            'Ubicacion' => [
                'nombre' => 'required|string|max:255',
                'direccion' => 'required|string|max:255',
            ],
            'Departamento' => [
                'nombre' => 'required|string|max:255',
            ],
            'Empleado' => [
                'nombre' => 'required|string|max:255',
                'apellido' => 'required|string|max:255',
                'email' => 'required|email|unique:empleados,email',
                'departamento_id' => 'required|exists:departamentos,id',
            ],
            'Activo' => [
                'nombre' => 'required|string|max:255',
                'descripcion' => 'required|string',
                'valor' => 'required|numeric|min:0',
                'fecha_adquisicion' => 'required|date',
                'ubicacion_id' => 'required|exists:ubicaciones,id',
            ],
            'Disposicion' => [
                'activo_id' => 'required|exists:activos,id',
                'fecha_disposicion' => 'required|date',
                'motivo' => 'required|string',
            ],
            'Proveedor' => [
                'nombre' => 'required|string|max:255',
                'contacto' => 'required|string|max:255',
                'telefono' => 'required|string|max:20',
            ],
            'Mantenimiento' => [
                'activo_id' => 'required|exists:activos,id',
                'fecha_mantenimiento' => 'required|date',
                'descripcion' => 'required|string',
                'costo' => 'required|numeric|min:0',
            ],
            'Depreciacion' => [
                'activo_id' => 'required|exists:activos,id',
                'metodo' => 'required|string|in:lineal,suma_de_digitos,unidades_de_produccion',
                'vida_util' => 'required|integer|min:1',
                'valor_residual' => 'required|numeric|min:0',
            ],
        ];
    }
}
