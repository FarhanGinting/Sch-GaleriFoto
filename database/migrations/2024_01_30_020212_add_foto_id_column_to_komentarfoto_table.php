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
        Schema::table('komentarfoto', function (Blueprint $table) {
            $table->foreign('FotoID')->references('id')->on('foto')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('komentarfoto', function (Blueprint $table) {
            $table->dropForeign(['FotoID']);
        });
    }
};
