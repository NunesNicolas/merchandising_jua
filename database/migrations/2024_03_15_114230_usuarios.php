<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up():void
    {
        Schema::create('usuarios', function(blueprint $table){
            $table->id();
            $table->string("nome", 100)->nullabel();
            $table->string("email", 100)->nullable();
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
