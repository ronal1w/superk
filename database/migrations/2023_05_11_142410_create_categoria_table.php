<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriaTable extends Migration
{
    public function up()
    {
        Schema::create('categoria', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 50);
            $table->unsignedBigInteger('area_id');
            $table->timestamps();

            $table->foreign('area_id')->references('id')->on('area');
        });
    }

    public function down()
    {
        Schema::dropIfExists('categoria');
    }
}
