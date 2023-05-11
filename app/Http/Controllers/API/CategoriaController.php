<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CategoriaController extends Controller
{
    
    public function index()
    {
        $categorias = Categoria::all();
        return response()->json(['categorias' => $categorias], Response::HTTP_OK);
    }

    // mostrar solo el nombre y el area_id
    public function mostrarCategorias()
    {
        $categorias = Categoria::with('area:id,nombre')->get(['nombre', 'area_id']);
        return response()->json(['categorias' => $categorias], Response::HTTP_OK);
    }


    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|max:50',
            'area_id' => 'required|exists:area,id',
        ]);

        $categoria = Categoria::create($request->all());
        return response()->json($categoria, Response::HTTP_CREATED);
    }

    public function show($id)
    {
        $categoria = Categoria::findOrFail($id);
        return response()->json($categoria, Response::HTTP_OK);
    }

    //mostrar reguitro solo por el nombre y el area_id
    public function mostrarRegistro($id)
{
    $categoria = Categoria::with('area:id,nombre')->findOrFail($id, ['nombre', 'area_id']);
    return response()->json($categoria, Response::HTTP_OK);
}



    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|max:50',
            'area_id' => 'required|exists:areas,id',
        ]);

        $categoria = Categoria::findOrFail($id);
        $categoria->update($request->all());
        return response()->json($categoria, Response::HTTP_OK);
    }

    public function destroy($id)
    {
        $categoria = Categoria::findOrFail($id);
        $categoria->delete();
        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
