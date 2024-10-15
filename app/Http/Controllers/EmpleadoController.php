<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use App\Models\Departamento;
use App\Models\Usuario;
use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
    public function index()
    {
        $empleados = Empleado::with('departamento', 'usuario')->get();
        return view('empleados.index', compact('empleados'));
    }

    public function create()
    {
        $departamentos = Departamento::all();
        $usuarios = Usuario::all();
        return view('empleados.create', compact('departamentos', 'usuarios'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre_empleado' => 'required|string|max:255|regex:/^[\pL\s]+$/u',
            'apellido_empleado' => 'required|string|max:255|regex:/^[\pL\s]+$/u',
            'cargo_empleado' => 'required|string|max:255|regex:/^[\pL\s]+$/u',
            'id_departamento' => 'required|exists:departamentos,id_departamento',
            'id_usuario' => 'required|exists:usuarios,id_usuario',
        ]);

        Empleado::create($request->all());

        return redirect()->route('empleados.index')
            ->with('success', 'Empleado creado exitosamente.');
    }

    public function show(Empleado $empleado)
    {
        return view('empleados.show', compact('empleado'));
    }

    public function edit(Empleado $empleado)
    {
        $departamentos = Departamento::all();
        $usuarios = Usuario::all();
        return view('empleados.edit', compact('empleado', 'departamentos', 'usuarios'));
    }

    public function update(Request $request, Empleado $empleado)
    {
        $request->validate([
            'nombre_empleado' => 'required|string|max:255|regex:/^[\pL\s]+$/u',
            'apellido_empleado' => 'required|string|max:255|regex:/^[\pL\s]+$/u',
            'cargo_empleado' => 'required|string|max:255|regex:/^[\pL\s]+$/u',
            'id_departamento' => 'required|exists:departamentos,id_departamento',
            'id_usuario' => 'required|exists:usuarios,id_usuario',
        ]);

        $empleado->update($request->all());

        return redirect()->route('empleados.index')
            ->with('success', 'Empleado actualizado exitosamente');
    }

    public function destroy(Empleado $empleado)
    {
        $empleado->delete();

        return redirect()->route('empleados.index')
            ->with('success', 'Empleado eliminado exitosamente');
    }
}