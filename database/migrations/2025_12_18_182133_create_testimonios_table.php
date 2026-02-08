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
    Schema::create('testimonios', function (Blueprint $table) {
        $table->id();
        $table->string('nombre');
        $table->string('ciudad')->nullable();
        $table->unsignedTinyInteger('estrellas')->default(5); // 1..5
        $table->text('mensaje');
        $table->string('foto_url')->nullable(); // por ahora URL
        $table->boolean('destacado')->default(false);
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('testimonios');
    }
};
