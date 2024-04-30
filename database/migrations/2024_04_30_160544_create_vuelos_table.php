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
        Schema::create('vuelos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('origen_id')->constrained('aeropuertos');
            $table->foreignId('destino_id')->constrained('aeropuertos');
            $table->foreignId('compania_id')->constrained();
            $table->integer('plazas');
            $table->decimal('precio', 6, 2);
            $table->string('codigo_vuelo', 6)->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vuelos');
    }
};
