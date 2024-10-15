<?php

namespace App\Http\Controllers;

use App\Models\Disposicion;
use App\Models\Activo;
use Illuminate\Http\Request;

class DisposicionController extends Controller
{
    public function index()
    {
        $disposiciones = Disposicion::with('activo')->get();
        return view('disposiciones.index', compact('disposiciones'));
    }

    public function create()
    {
        $activos = Activo::all();
        return view('disposiciones.create', compact('activos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'fecha_disposicion' => 'required|date',
            'tipo_disposicion' => 'required|string|max:255|regex:/^[\pL\s]+$/u',
            'valor_disposicion' => 'required|numeric',
            'id_activo' => 'required|exists:activos,id_activo',
        ]);

        Disposicion::create($request->all());

        return redirect()->route('disposiciones.index')
            ->with('success', 'Disposición creada exitosamente.');
    }

    public function show($id)
    {
        $disposicion = Disposicion::with('activo')->findOrFail($id);
        return view('disposiciones.show', compact('disposicion'));
    }

    public function edit($id)
    {
        $disposicion = Disposicion::findOrFail($id);
        $activos = Activo::all();
        return view('disposiciones.edit', compact('disposicion', 'activos'));
    }

    public function update(Request $request, $id)
    {
        $disposicion = Disposicion::findOrFail($id);
        
        $request->validate([
            'fecha_disposicion' => 'required|date',
            'tipo_disposicion' => 'required|string|max:255|regex:/^[\pL\s]+$/u',
            'valor_disposicion' => 'required|numeric',
            'id_activo' => 'required|exists:activos,id_activo',
        ]);

        $disposicion->update($request->all());

        return redirect()->route('disposiciones.index')
            ->with('success', 'Disposición actualizada exitosamente');
    }

    public function destroy($id)
    {
        try {
            $disposicion = Disposicion::findOrFail($id);
            $result = $disposicion->delete();
            
            if ($result) {
                return redirect()->route('disposiciones.index')
                    ->with('success', 'Disposición eliminada exitosamente');
            } else {
                return redirect()->route('disposiciones.index')
                    ->with('error', 'No se pudo eliminar la disposición. Por favor, inténtelo de nuevo.');
            }
        } catch (\Exception $e) {
            return redirect()->route('disposiciones.index')
                ->with('error', 'Error al eliminar la disposición: ' . $e->getMessage());
        }
    }
}