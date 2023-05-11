<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = 'producto';

    protected $fillable = [
        'nombre',
        'proveedor',
        'fecha_caducidad',
        'fecha_entrada',
        'detalles',
        'precio',
        'unidades',
        'categoria_id',
    ];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }
}