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
        Schema::create('Empresas', function(blueprint $table){
            $table -> id();
            $table -> string("nome", 100) -> nullable();
            $table -> string("cnpj", 100) -> nullable();
            $table -> string("latitude", 100) -> nullable();
            $table -> string("longitude", 100) -> nullable();
            $table -> string("descricao", 2000) -> nullable();
            $table -> timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
