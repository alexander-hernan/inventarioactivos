<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepreciacionesTable extends Migration
{
    public function up()
    {
        Schema::create('depreciaciones', function (Blueprint $table) {
            $table->id('id_depreciacion');
            $table->integer('año');
            $table->decimal('valor_depreciacion', 10, 2);
            $table->unsignedBigInteger('id_activo');
            $table->timestamps();

            $table->foreign('id_activo')->references('id_activo')->on('activos');
        });
    }

    public function down()
    {
        Schema::dropIfExists('depreciaciones');
    }
}