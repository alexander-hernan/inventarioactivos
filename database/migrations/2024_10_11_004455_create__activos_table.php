<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActivosTable extends Migration
{
    public function up()
    {
        Schema::create('activos', function (Blueprint $table) {
            $table->id('id_activo');
            $table->string('nombre');
            $table->string('tipo_adquisicion');
            $table->date('fecha_adquisicion');
            $table->integer('vida_util');
            $table->unsignedBigInteger('id_ubicacion');
            $table->unsignedBigInteger('id_empleado');
            $table->timestamps();

            $table->foreign('id_ubicacion')->references('id_ubicacion')->on('ubicaciones');
            $table->foreign('id_empleado')->references('id_empleado')->on('empleados');
        });
    }

    public function down()
    {
        Schema::dropIfExists('activos');
    }
}