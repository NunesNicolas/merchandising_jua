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
        Schema::create('promotor_work_register', function (blueprint $table) {
            $table->id();
            $table->string("title", 100)->nullable();
            $table->string("type", 150)->nullable();
            $table->longText('img')->nullable();
            $table->unsignedBigInteger("promotor_route_id")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('promotor_work_register');
    }
};
