<?php

namespace App\Http\Controllers;

use App\Models\Activo;
use App\Models\Ubicacion;
use App\Models\Empleado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ActivoController extends Controller
{
    public function index()
    {
        $activos = Activo::with('ubicacion', 'empleado')->get();
        return view('activos.index', compact('activos'));
    }

    public function create()
    {
        $ubicaciones = Ubicacion::all();
        $empleados = Empleado::all();
        return view('activos.create', compact('ubicaciones', 'empleados'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string|max:255|regex:/^[\pL\s]+$/u',
            'tipo_adquisicion' => 'required|string|max:1000',
            'fecha_adquisicion' => 'required|date',
            'vida_util' => 'required|integer|min:1',
            'id_ubicacion' => 'required|exists:ubicaciones,id_ubicacion',
            'id_empleado' => 'required|exists:empleados,id_empleado',
        ], [
            'nombre.required' => 'El nombre del activo es obligatorio.',
            'nombre.string' => 'El nombre debe ser texto.',
            'nombre.max' => 'El nombre no puede tener más de 255 caracteres.',
            'tipo_adquisicion.required' => 'El tipo de adquisición es obligatorio.',
            'tipo_adquisicion.string' => 'El tipo de adquisición debe ser texto.',
            'tipo_adquisicion.max' => 'El tipo de adquisición no puede tener más de 1000 caracteres.',
            'fecha_adquisicion.required' => 'La fecha de adquisición es obligatoria.',
            'fecha_adquisicion.date' => 'La fecha de adquisición debe ser una fecha válida.',
            'vida_util.required' => 'La vida útil es obligatoria.',
            'vida_util.integer' => 'La vida útil debe ser un número entero.',
            'vida_util.min' => 'La vida útil debe ser al menos 1.',
            'id_ubicacion.required' => 'La ubicación es obligatoria.',
            'id_ubicacion.exists' => 'La ubicación seleccionada no es válida.',
            'id_empleado.required' => 'El empleado es obligatorio.',
            'id_empleado.exists' => 'El empleado seleccionado no es válido.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $activo = Activo::create($validator->validated());

        return redirect()->route('activos.index')
            ->with('success', 'Activo creado exitosamente.');
    }

    public function show(Activo $activo)
    {
        return view('activos.show', compact('activo'));
    }

    public function edit(Activo $activo)
    {
        $ubicaciones = Ubicacion::all();
        $empleados = Empleado::all();
        return view('activos.edit', compact('activo', 'ubicaciones', 'empleados'));
    }

    public function update(Request $request, Activo $activo)
    {
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string|max:255|regex:/^[\pL\s]+$/u',
            'tipo_adquisicion' => 'required|string|max:1000',
            'fecha_adquisicion' => 'required|date',
            'vida_util' => 'required|integer|min:1',
            'id_ubicacion' => 'required|exists:ubicaciones,id_ubicacion',
            'id_empleado' => 'required|exists:empleados,id_empleado',
        ], [
            'nombre.required' => 'El nombre del activo es obligatorio.',
            'nombre.string' => 'El nombre debe ser texto.',
            'nombre.max' => 'El nombre no puede tener más de 255 caracteres.',
            'tipo_adquisicion.required' => 'El tipo de adquisición es obligatorio.',
            'tipo_adquisicion.string' => 'El tipo de adquisición debe ser texto.',
            'tipo_adquisicion.max' => 'El tipo de adquisición no puede tener más de 1000 caracteres.',
            'fecha_adquisicion.required' => 'La fecha de adquisición es obligatoria.',
            'fecha_adquisicion.date' => 'La fecha de adquisición debe ser una fecha válida.',
            'vida_util.required' => 'La vida útil es obligatoria.',
            'vida_util.integer' => 'La vida útil debe ser un número entero.',
            'vida_util.min' => 'La vida útil debe ser al menos 1.',
            'id_ubicacion.required' => 'La ubicación es obligatoria.',
            'id_ubicacion.exists' => 'La ubicación seleccionada no es válida.',
            'id_empleado.required' => 'El empleado es obligatorio.',
            'id_empleado.exists' => 'El empleado seleccionado no es válido.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $activo->update($validator->validated());

        return redirect()->route('activos.index')
            ->with('success', 'Activo actualizado exitosamente.');
    }

    public function destroy(Activo $activo)
    {
        $activo->delete();

        return redirect()->route('activos.index')
            ->with('success', 'Activo eliminado exitosamente');
    }
}
