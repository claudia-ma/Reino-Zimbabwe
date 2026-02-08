<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('cachorro_imagenes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cachorro_id')->constrained('cachorros')->cascadeOnDelete();
            $table->string('ruta'); // storage path
            $table->unsignedInteger('orden')->default(0);
            $table->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('cachorro_imagenes'); }
};