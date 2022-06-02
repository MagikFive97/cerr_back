<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Client extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client', function (Blueprint $table) {
            $table->id();
            $table->string('Nombre');
            $table->string('Dni');
            $table->string('Email');
            $table->string('Razon_Social');
            $table->string('Telefono');
            $table->string('Direccion');
            $table->string('Cod_postal');
            $table->string('Localidad');
            $table->string('Provincia');
            $table->string('Observaciones');
            $table->decimal('Beneficio');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('client');
    }
}
