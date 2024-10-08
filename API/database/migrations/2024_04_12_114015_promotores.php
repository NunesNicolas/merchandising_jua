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
        Schema::create('promotores', function(blueprint $table){
            $table->id();
            $table->string("nome", 100)->nullable();
            $table->string("email", 100)->nullable();
            $table->string("senha", 100)->nullable();
            $table->string("telefone", 15);
            $table->timestamps();    
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
