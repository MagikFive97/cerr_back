<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee', function (Blueprint $table) {
            $table->id();
            $table->string('Nombre');
            $table->string('Dni');
            $table->string('Email');
            $table->string('Seguridad_Social');
            $table->string('Telefono');
            $table->string('Direccion');
            $table->string('Categoria');
            $table->double('Cotizacion');
            $table->string('Antiguedad');
            $table->string('Cod_Contrato');
            $table->decimal('Precio_Horas');
            $table->string('Observaciones');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employee');
    }
}
