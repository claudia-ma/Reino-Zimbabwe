<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('cachorros', function (Blueprint $table) {
            $table->id();
            $table->foreignId('camada_id')->constrained('camadas')->cascadeOnDelete();
            $table->string('nombre');
            $table->enum('sexo', ['macho', 'hembra'])->nullable();
            $table->string('color')->nullable();
            $table->enum('estado', ['disponible', 'reservado', 'entregado'])->default('disponible');
            $table->string('video_url')->nullable();
            $table->boolean('destacado')->default(false);
            $table->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('cachorros'); }
};