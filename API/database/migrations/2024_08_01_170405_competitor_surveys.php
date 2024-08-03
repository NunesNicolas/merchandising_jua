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
        Schema::create('competitor_surveys', function (blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("promotor_route_id")->nullable();
            $table->unsignedBigInteger("competitor_id")->nullable();
            $table->float("price")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('competitor_survey');
    }
};