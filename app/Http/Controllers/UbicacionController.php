<?php

namespace App\Http\Controllers;

use App\Models\Ubicacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UbicacionController extends Controller
{
    public function index()
    {
        $ubicaciones = Ubicacion::all();
        return view('ubicaciones.index', compact('ubicaciones'));
    }

    public function create()
    {
        return view('ubicaciones.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nombre_ubicacion' => 'required|string|max:255|regex:/^[\pL\s]+$/u',
            'direccion' => 'required|string|max:255',
        ], [
            'nombre_ubicacion.regex' => 'El nombre de la ubicación solo debe contener letras y espacios.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $ubicacion = Ubicacion::create($validator->validated());

        return redirect()->route('ubicaciones.index')
            ->with('success', 'Ubicación creada exitosamente.');
    }

    public function show($id)
    {
        $ubicacion = Ubicacion::findOrFail($id);
        return view('ubicaciones.show', compact('ubicacion'));
    }

    public function edit($id)
    {
        $ubicacion = Ubicacion::findOrFail($id);
        return view('ubicaciones.edit', compact('ubicacion'));
    }

    public function update(Request $request, $id)
    {
        $ubicacion = Ubicacion::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'nombre_ubicacion' => 'required|string|max:255|regex:/^[\pL\s]+$/u',
            'direccion' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $ubicacion->update($validator->validated());

        return redirect()->route('ubicaciones.index')
            ->with('success', 'Ubicación actualizada exitosamente.');
    }

    public function destroy($id)
    {
        $ubicacion = Ubicacion::findOrFail($id);
        $ubicacion->delete();

        return redirect()->route('ubicaciones.index')
            ->with('success', 'Ubicación eliminada exitosamente');
    }
}
