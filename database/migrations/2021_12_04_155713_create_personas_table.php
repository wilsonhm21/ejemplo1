<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 50);
            $table->string('ape_paterno',50);
            $table->string('ape_materno',50);
            $table->string('dni',8);
            $table->string('fe_nacimiento');
            $table->enum('es_civil', [ 1, 2, 3, 4]);
            $table->enum('sexo',[ 1, 2]);
            $table->string('telefono',9);
            $table->string('email',50);
            $table->string('direccion',50);
            $table->string('es_persona',50);
            $table->string('fa_parentesco')->nullable("-");
            $table->string('parentesco')->nullable("-");
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
        Schema::dropIfExists('personas');
    }
}
