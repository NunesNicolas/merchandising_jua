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
        Schema::create('promotors', function(blueprint $table){
        $table->id();
            $table->string("nomepromotor", 100)->nullable();
            $table->string("emailpromotor", 100)->nullable();
            $table->string("statuspromotor", 50)->nullable();
            $table->string("telefonepromotor", 15)->nullable();
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
