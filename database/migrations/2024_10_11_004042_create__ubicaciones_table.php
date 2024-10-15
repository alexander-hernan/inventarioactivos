<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUbicacionesTable extends Migration
{
    public function up()
    {
        Schema::create('ubicaciones', function (Blueprint $table) {
            $table->id('id_ubicacion');
            $table->string('nombre_ubicacion');
            $table->string('direccion');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('ubicaciones');
    }
}