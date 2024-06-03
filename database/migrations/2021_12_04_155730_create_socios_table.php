<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSociosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('socios', function (Blueprint $table) {
            $table->id();
            $table->foreignId('personas_id')->constrained();
            $table->string('codigo',50);
            $table->string('tipo',50);
            $table->string('categoria',8);
            $table->string('imagen');
            $table->string('es_socio',50);
            $table->string('comunidad',50);
            $table->string('distrito_id');
            $table->string('provincia_id');
            $table->string('departamento_id');
            $table->foreign('distrito_id')->references('id')->on('distritos');
            $table->foreign('provincia_id')->references('id')->on('provincias');
            $table->foreign('departamento_id')->references('id')->on('departamentos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('socios');
    }
}
