<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('consultas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('email')->nullable();
            $table->string('telefono')->nullable();
            $table->text('mensaje')->nullable();
            $table->enum('origen', ['web','instagram','whatsapp','email'])->default('web');
            $table->foreignId('camada_id')->nullable()->constrained('camadas')->nullOnDelete();
            $table->foreignId('cachorro_id')->nullable()->constrained('cachorros')->nullOnDelete();
            $table->enum('estado', ['nueva','en_curso','cerrada'])->default('nueva');
            $table->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('consultas'); }
};