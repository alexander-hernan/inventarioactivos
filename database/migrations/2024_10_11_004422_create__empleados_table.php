<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpleadosTable extends Migration
{
    public function up()
    {
        Schema::create('empleados', function (Blueprint $table) {
            $table->id('id_empleado');
            $table->string('nombre_empleado');
            $table->string('apellido_empleado');
            $table->string('cargo_empleado');
            $table->unsignedBigInteger('id_departamento');
            $table->unsignedBigInteger('id_usuario');
            $table->timestamps();

            $table->foreign('id_departamento')->references('id_departamento')->on('departamentos');
            $table->foreign('id_usuario')->references('id_usuario')->on('usuarios');
        });
    }

    public function down()
    {
        Schema::dropIfExists('empleados');
    }
}