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
        Schema::create('tache_files', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tache_stagiaires_id');
            $table->string('name');
            $table->string('path');
            $table->foreign('tache_stagiaires_id')->references('id')->on('tache_stagiaires')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tache_files');
    }
};
