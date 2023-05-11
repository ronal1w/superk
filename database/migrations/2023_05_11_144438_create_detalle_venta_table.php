<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetalleVentaTable extends Migration
{
    public function up()
    {
        Schema::create('detalle_venta', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('venta_id');
            $table->unsignedBigInteger('producto_id');
            $table->integer('cantidad');
            $table->float('precio', 10, 2);
            $table->timestamps();

            $table->foreign('venta_id')->references('id')->on('venta');
            $table->foreign('producto_id')->references('id')->on('producto');
        });
    }

    public function down()
    {
        Schema::dropIfExists('detalle_venta');
    }
}
