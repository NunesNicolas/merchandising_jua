<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Executa as migrações.
     */
    public function up(): void
    {
        Schema::create('competitors', function (Blueprint $table) {
            $table->id();
            $table->string("nome", 100)->nullable();
            $table->string("brand", 150)->nullable();
            $table->unsignedBigInteger("product_id")->nullable(); // Correção feita aqui
            $table->timestamps();    
        });
    }

    /**
     * Reverte as migrações.
     */
    public function down(): void
    {
        Schema::dropIfExists('competitors');
    }
};