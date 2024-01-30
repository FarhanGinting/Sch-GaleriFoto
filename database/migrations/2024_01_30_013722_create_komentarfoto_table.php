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
        Schema::create('komentarfoto', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('FotoID');
            $table->unsignedBigInteger('UserID');
            $table->string('komentar', 100);
            $table->date('tanggal');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('komentarfoto');
    }
};
