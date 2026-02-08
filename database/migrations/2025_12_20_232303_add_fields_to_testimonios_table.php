<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('testimonios', function (Blueprint $table) {
            // Si tu tabla solo tenía id + timestamps, añadimos todo
            $table->string('nombre')->after('id');
            $table->string('ubicacion')->nullable()->after('nombre');
            $table->unsignedTinyInteger('estrellas')->default(5)->after('ubicacion');
            $table->text('mensaje')->after('estrellas');
            $table->string('foto_url')->nullable()->after('mensaje');
            $table->boolean('publicado')->default(false)->after('foto_url');
        });
    }

    public function down(): void
    {
        Schema::table('testimonios', function (Blueprint $table) {
            $table->dropColumn(['nombre','ubicacion','estrellas','mensaje','foto_url','publicado']);
        });
    }
};