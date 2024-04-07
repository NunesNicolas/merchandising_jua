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
        Schema::create('empresas', function(blueprint $table){
            $table -> id();
            $table -> string("nome", 100) -> nullabel();
            $table -> string("cnpj", 100) -> nullabel();
            $table -> string("latitude", 100) -> nullabel();
            $table -> string("longitude", 100) -> nullabel();
            $table -> bigInteger("empresa_id") -> nullabel();
            
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
