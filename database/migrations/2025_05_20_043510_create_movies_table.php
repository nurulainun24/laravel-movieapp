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
        Schema::create('movies', function (Blueprint $table) {
            $table->id();
            $table->text('description'); // Tambahkan ini
            $table->string('title');
            $table->string('genre');
            $table->integer('year'); // atau tambahkan ->nullable() jika ingin opsional
            $table->float('rating', 2, 1);
            $table->string('season_episode')->nullable(); // misal: S1-E8
            $table->timestamps();
            $table->string('poster')->nullable(); // tambahkan ke migration `movies`
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movies');
    }
};
