<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    use HasFactory;
    protected $table = 'venta';

    protected $fillable = ['total'];

    protected $casts = [
        'total' => 'float',
    ];
}
