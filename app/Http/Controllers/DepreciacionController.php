<?php

namespace App\Http\Controllers;

use App\Models\Depreciacion;
use App\Models\Activo;
use Illuminate\Http\Request;

class DepreciacionController extends Controller
{
    public function index()
    {
        $depreciaciones = Depreciacion::with('activo')->get();
        return view('depreciaciones.index', compact('depreciaciones'));
    }

    public function create()
    {
        $activos = Activo::all();
        return view('depreciaciones.create', compact('activos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'año' => 'required|integer',
            'valor_depreciacion' => 'required|numeric',
            'id_activo' => 'required|exists:activos,id_activo',
        ]);

        Depreciacion::create($request->all());

        return redirect()->route('depreciaciones.index')
            ->with('success', 'Depreciación creada exitosamente.');
    }

    public function show($id)
    {
        $depreciacion = Depreciacion::with('activo')->findOrFail($id);
        return view('depreciaciones.show', compact('depreciacion'));
    }

    public function edit($id)
    {
        $depreciacion = Depreciacion::findOrFail($id);
        $activos = Activo::all();
        return view('depreciaciones.edit', compact('depreciacion', 'activos'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'año' => 'required|integer',
            'valor_depreciacion' => 'required|numeric',
            'id_activo' => 'required|exists:activos,id_activo',
        ]);

        $depreciacion = Depreciacion::findOrFail($id);
        $depreciacion->update($request->all());

        return redirect()->route('depreciaciones.index')
            ->with('success', 'Depreciación actualizada exitosamente');
    }

    public function destroy($id)
    {
        $depreciacion = Depreciacion::findOrFail($id);
        $depreciacion->delete();

        return redirect()->route('depreciaciones.index')
            ->with('success', 'Depreciación eliminada exitosamente');
    }
}