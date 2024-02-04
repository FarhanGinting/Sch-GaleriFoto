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
        Schema::table('foto', function (Blueprint $table) {
            // Memberikan nama khusus untuk kunci asing
            $table->foreign('AlbumID', 'fk_foto_albumid')->references('id')->on('album')->onDelete('cascade')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('foto', function (Blueprint $table) {
            // Merujuk pada nama khusus saat menghapus kunci asing
            $table->dropForeign('fk_foto_albumid');
        });
    }
};
