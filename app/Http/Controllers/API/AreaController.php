<?php

namespace App\Http\Controllers\API;

use App\Models\Area;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AreaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $areas = Area::all();

        return response()->json(array('areas' => $areas));

    }

    public function mostrarAreas()
    {
        $areas = Area::all();
        return response()->json(array('areas' => $areas));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validarArea = $request->validate([
            'nombre'=>'required|max:50',
        ]);

        $area = new Area([
            'nombre' => $validarArea['nombre'],
        ]);
        $area->save();
        return response()->json([
            'area creada correctamente' => true,
            'data' => $area,
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $areas = Area::find($id);
        return response()->json(array('data' => $areas));
    }
    /*
    public function show(string $id)
{
    $area = Area::find($id);

    if (!$area) {
        return response()->json(['message' => 'Área no encontrada'], 404);
    }

    return response()->json(['nombre' => $area->nombre]);
}
*/

public function mostrarArea($id)
{
    $area = Area::find($id);

    if (!$area) {
        return response()->json(['nombre' => 'Area no encontrada'], 404);

    }
    return response()->json(['nombre'=>$area->nombre], 200);
}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Area $area)
    {
        $validatedData = $request->validate([
            'nombre' => 'required|max:50',
        ]);

        $area->nombre = $validatedData['nombre'];
        $area->save();

        return response()->json([
            'success' => true,
            'data' => $area,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
