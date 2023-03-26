<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {

        Schema::create('departamentos', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('empleados', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('departamento_id');
            $table->foreign('departamento_id')->references('id')->on('departamentos');
            $table->string('name');
            $table->bigInteger('dpi');
            $table->date('fecha_de_nacimiento');
            $table->string('genero');
            $table->string('estado_civil');
            $table->string('email')->unique();
            $table->bigInteger('telefono')->unique();
            $table->text('direccion');
            $table->string('municipio');
            $table->bigInteger('codigo_postal');
            $table->string('pais');
            $table->string('puesto');
            $table->decimal('salario');
            $table->string('tipo_contrato');
            $table->bigInteger('contacto_emergencia1');
            $table->bigInteger('contacto_emergencia2');
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
        Schema::dropIfExists('departamentos');
        Schema::dropIfExists('empleados');
    }
};
