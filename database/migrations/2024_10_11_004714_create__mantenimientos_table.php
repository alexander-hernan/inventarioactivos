<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMantenimientosTable extends Migration
{
    public function up()
    {
        Schema::create('mantenimientos', function (Blueprint $table) {
            $table->id('id_mantenimiento');
            $table->date('fecha_mantenimiento');
            $table->string('tipo_mantenimiento');
            $table->decimal('costo_mantenimiento', 10, 2);
            $table->text('descripcion');
            $table->unsignedBigInteger('id_activo');
            $table->unsignedBigInteger('id_proveedor');
            $table->timestamps();

            $table->foreign('id_activo')->references('id_activo')->on('activos');
            $table->foreign('id_proveedor')->references('id_proveedor')->on('proveedores');
        });
    }

    public function down()
    {
        Schema::dropIfExists('mantenimientos');
    }
}