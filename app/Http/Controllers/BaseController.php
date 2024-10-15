<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\ValidationRules;

class BaseController extends Controller
{
    use ValidationRules;

    protected $model;

    protected function validateRequest(Request $request, $action = 'create')
    {
        $modelName = class_basename($this->model);
        $rules = self::getValidationRules()[$modelName];

        if ($action === 'update') {
            // Modificar reglas para actualización si es necesario
            // Por ejemplo, para el email en Empleado:
            if (isset($rules['email'])) {
                $rules['email'] = str_replace('unique:', 'unique:empleados,email,' . $request->route('empleado'), $rules['email']);
            }
        }

        $request->validate($rules);
    }
}
