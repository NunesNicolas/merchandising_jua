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
        Schema::create('produtos', function(blueprint $table){
            $table->id();
            $table->string("nomeproduto", 100)->nullable();
            $table->string("precoproduto", 15);
            $table->string("marcaproduto", 15);
            $table->string("tipoproduto", 15);
            $table->string("numerovendas", 15);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {

    }
};
