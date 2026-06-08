<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
{
    Schema::table('testimonios', function (Blueprint $table) {

        if (!Schema::hasColumn('testimonios', 'nombre')) {
            $table->string('nombre')->after('id');
        }

        if (!Schema::hasColumn('testimonios', 'ubicacion')) {
            $table->string('ubicacion')->nullable()->after('nombre');
        }

        if (!Schema::hasColumn('testimonios', 'estrellas')) {
            $table->unsignedTinyInteger('estrellas')->default(5)->after('ubicacion');
        }

        if (!Schema::hasColumn('testimonios', 'mensaje')) {
            $table->text('mensaje')->after('estrellas');
        }

        if (!Schema::hasColumn('testimonios', 'foto_url')) {
            $table->string('foto_url')->nullable()->after('mensaje');
        }

        if (!Schema::hasColumn('testimonios', 'publicado')) {
            $table->boolean('publicado')->default(false)->after('foto_url');
        }

    });
}

    public function down(): void
    {
        Schema::table('testimonios', function (Blueprint $table) {
            $table->dropColumn(['nombre','ubicacion','estrellas','mensaje','foto_url','publicado']);
        });
    }
};