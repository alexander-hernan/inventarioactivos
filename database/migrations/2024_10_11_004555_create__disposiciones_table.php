<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDisposicionesTable extends Migration
{
    public function up()
    {
        Schema::create('disposiciones', function (Blueprint $table) {
            $table->id('id_disposicion');
            $table->date('fecha_disposicion');
            $table->string('tipo_disposicion');
            $table->decimal('valor_disposicion', 10, 2);
            $table->unsignedBigInteger('id_activo');
            $table->timestamps();

            $table->foreign('id_activo')->references('id_activo')->on('activos');
        });
    }

    public function down()
    {
        Schema::dropIfExists('disposiciones');
    }
}