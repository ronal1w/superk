<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductoTable extends Migration
{
    public function up()
    {
        Schema::create('producto', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 50);
            $table->string('proveedor', 50);
            $table->date('fecha_caducidad');
            $table->date('fecha_entrada');
            $table->text('detalles')->nullable();
            $table->float('precio', 10, 2);
            $table->integer('unidades');
            $table->unsignedBigInteger('categoria_id');
            $table->timestamps();

            $table->foreign('categoria_id')->references('id')->on('categoria');
        });
    }

    public function down()
    {
        Schema::dropIfExists('producto');
    }
}
