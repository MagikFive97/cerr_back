<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ParteTrabajo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parte_trabajo', function (Blueprint $table){
            $table->id();
            $table->bigInteger('Numero_parte_trabajo');
            $table->string('Cliente');
            $table->date('Fecha');
            $table->string('Descripcion');
            $table->string('Materiales');
            $table->string('Adjuntos');
            $table->string('Observaciones');
            $table->double('Horas_montaje', 5,2);
            $table->double('Horas_totales', 5,2);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('parte_trabajo');
    }
}
