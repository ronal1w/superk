<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\DetalleVenta;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class DetalleVentaController extends Controller
{
    public function index()
    {
        $detalleVentas = DetalleVenta::all();

        return response()->json($detalleVentas, Response::HTTP_OK);
    }

    public function store(Request $request)
    {
        $request->validate([
            'venta_id' => 'required|exists:venta,id',
            'producto_id' => 'required|exists:producto,id',
            'cantidad' => 'required|integer',
            'precio' => 'required|numeric',
        ]);

        $detalleVenta = DetalleVenta::create($request->all());

        return response()->json($detalleVenta, Response::HTTP_CREATED);
    }

    public function show(DetalleVenta $detalle_venta)
    {
        return response()->json($detalle_venta, Response::HTTP_OK);
    }

    public function update(Request $request, DetalleVenta $detalle_venta)
    {
        $request->validate([
            'venta_id' => 'required|exists:ventas,id',
            'producto_id' => 'required|exists:productos,id',
            'cantidad' => 'required|integer',
            'precio' => 'required|numeric',
        ]);

        $detalle_venta->update($request->all());

        return response()->json($detalle_venta, Response::HTTP_OK);
    }

    public function destroy(DetalleVenta $detalle_venta)
    {
        $detalle_venta->delete();

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
