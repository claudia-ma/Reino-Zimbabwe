<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('camadas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre'); // "Camada Coco x Bella"
            $table->string('padre');
            $table->string('madre');
            $table->date('fecha_nacimiento');
            $table->text('descripcion')->nullable();
            $table->boolean('activa')->default(true);
            $table->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('camadas'); }
};