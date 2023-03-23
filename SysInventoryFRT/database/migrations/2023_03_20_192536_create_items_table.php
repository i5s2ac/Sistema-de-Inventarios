<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('name'); //Nombre del producto
            $table->string('sku'); // SKU del producto
            $table->text('description'); // Descripción del producto
            $table->integer('quantity'); // Cantidad en inventario
            $table->decimal('acquisition_cost', 16, 2); // Costo de adquisición
            $table->date('acquisition_date'); // Fecha de adquisición
            $table->date('expiration_date')->nullable(); // Fecha de vencimiento (si es relevante)
            $table->decimal('storage_cost', 16, 2); // Costo de almacenamiento
            $table->string('typeItem'); // Tipo de item que se almacenará
            $table->string('barcode_image_path')->nullable(); //url de imagen de barcode
            $table->string('photo')->nullable(); //url de imagen de producto
            $table->integer('idEmployee')->nullable(); //ID de empleado
            $table->string('available'); //Disponibilidad del item
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
