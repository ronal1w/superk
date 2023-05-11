<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function MostrarPorductos()
    {
        $productos = Producto::all();
        return response()->json(array('products' => $productos));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function crearProducto(Request $request)
        {
            // Valida los datos del formulario
            $request->validate([
                'nombre' => 'required|string|max:50',
                'proveedor' => 'required|string|max:50',
                'fecha_caducidad' => 'required|date',
                'fecha_entrada' => 'required|date',
                'detalles' => 'nullable|string',
                'precio' => 'required|numeric',
                'unidades' => 'required|integer',
                'categoria_id' => 'required|exists:categoria,id',
            ]);
    
            // Crea un nuevo producto
            $producto = Producto::create($request->all());
    
            return response()->json($producto, 201);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $productos = Producto::find($id);
        return response()->json($productos, 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $producto = Producto::find($id);

        if (!$producto) {
            return response()->json(['message' => 'Producto no encontrado'], 404);
        }
    
        return response()->json($producto, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validar los datos del formulario de edición
        $request->validate([
            'nombre' => 'required|string|max:50',
            'proveedor' => 'required|string|max:50',
            'fecha_caducidad' => 'required|date',
            'fecha_entrada' => 'required|date',
            'detalles' => 'nullable|string',
            'precio' => 'required|numeric',
            'unidades' => 'required|integer',
            'categoria_id' => 'required|exists:categoria,id'
        ]);
    
        // Buscar el producto por su ID
        $producto = Producto::findOrFail($id);
    
        // Actualizar los datos del producto con los valores proporcionados en la solicitud
        $producto->nombre = $request->nombre;
        $producto->proveedor = $request->proveedor;
        $producto->fecha_caducidad = $request->fecha_caducidad;
        $producto->fecha_entrada = $request->fecha_entrada;
        $producto->detalles = $request->detalles;
        $producto->precio = $request->precio;
        $producto->unidades = $request->unidades;
        $producto->categoria_id = $request->categoria_id;
    
        // Guardar los cambios en la base de datos
        $producto->save();
    
        // Devolver una respuesta JSON con el producto actualizado
        return response()->json(['message' => 'Producto actualizado correctamente', 'data' => $producto]);
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $producto = Producto::find($id);
    
        if (!$producto) {
            return response()->json(['message' => 'Producto no encontrado'], 404);
        }
    
        // Si el producto existe, procede a eliminarlo
        $producto->delete();
    
        return response()->json(['message' => 'Producto eliminado correctamente'], 200);
    }
    
}
