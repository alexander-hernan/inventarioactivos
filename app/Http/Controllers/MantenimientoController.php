<?php

namespace App\Http\Controllers;

use App\Models\Mantenimiento;
use App\Models\Activo;
use App\Models\Proveedor; // Añade esta línea
use Illuminate\Http\Request;

class MantenimientoController extends Controller
{
    public function index()
    {
        $mantenimientos = Mantenimiento::with('activo')->get();
        return view('mantenimientos.index', compact('mantenimientos'));
    }

    public function create()
    {
        $activos = Activo::all();
        $proveedores = Proveedor::all();
        return view('mantenimientos.create', compact('activos', 'proveedores'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'fecha_mantenimiento' => 'required|date',
            'tipo_mantenimiento' => 'required|string|max:255|regex:/^[\pL\s]+$/u',
            'descripcion' => 'required|string|max:255|regex:/^[\pL\s]+$/u',
            'costo_mantenimiento' => 'required|numeric', // Cambiado de 'costo' a 'costo_mantenimiento'
            'id_activo' => 'required|exists:activos,id_activo',
            'id_proveedor' => 'required|exists:proveedores,id_proveedor', // Añadido
        ]);

        Mantenimiento::create($request->all());

        return redirect()->route('mantenimientos.index')
            ->with('success', 'Mantenimiento creado exitosamente.');
    }

    public function show(Mantenimiento $mantenimiento)
    {
        return view('mantenimientos.show', compact('mantenimiento'));
    }

    public function edit($id)
    {
        $mantenimiento = Mantenimiento::findOrFail($id);
        $activos = Activo::all();
        $proveedores = Proveedor::all();
        
        // Comenta o elimina esta línea
        // dd([
        //     'mantenimiento' => $mantenimiento,
        //     'activos' => $activos,
        //     'proveedores' => $proveedores
        // ]);

        return view('mantenimientos.edit', compact('mantenimiento', 'activos', 'proveedores'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'fecha_mantenimiento' => 'required|date',
            'tipo_mantenimiento' => 'required|string|max:255|regex:/^[\pL\s]+$/u',
            'descripcion' => 'required|string|max:255|regex:/^[\pL\s]+$/u',
            'costo_mantenimiento' => 'required|numeric', // Cambiado de 'costo' a 'costo_mantenimiento'
            'id_activo' => 'required|exists:activos,id_activo',
            'id_proveedor' => 'required|exists:proveedores,id_proveedor', // Añadido
        ]);

        $mantenimiento = Mantenimiento::findOrFail($id);
        $mantenimiento->update($request->all());

        return redirect()->route('mantenimientos.index')
            ->with('success', 'Mantenimiento actualizado exitosamente');
    }

    public function destroy($id)
    {
        $mantenimiento = Mantenimiento::findOrFail($id);
        $mantenimiento->delete();

        return redirect()->route('mantenimientos.index')
            ->with('success', 'Mantenimiento eliminado exitosamente');
    }
}
