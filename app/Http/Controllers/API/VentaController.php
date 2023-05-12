<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Venta;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class VentaController extends Controller
{
    public function index()
    {
        $ventas = Venta::all();

        return response()->json($ventas, Response::HTTP_OK);
    }

    public function store(Request $request)
    {
        $request->validate([
            'total' => 'required|numeric',
        ]);

        $venta = Venta::create($request->all());

        return response()->json($venta, Response::HTTP_CREATED);
    }

    public function show(Venta $venta)
    {
        return response()->json($venta, Response::HTTP_OK);
    }

    public function update(Request $request, Venta $venta)
    {
        $request->validate([
            'total' => 'required|numeric',
        ]);

        $venta->update($request->all());

        return response()->json($venta, Response::HTTP_OK);
    }

    public function destroy(Venta $venta)
    {
        $venta->delete();

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
