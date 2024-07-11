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
        Schema::create('promotor_routers', function (blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("cliente_id")->nullable();
            $table->unsignedBigInteger("promotor_id")->nullable();
            $table->date("route_date")->nullable();
            $table->longText('notes')->nullable();
            $table->dateTime("checkin_datetime")->nullable();
            $table->float("latitude")->nullable();
            $table->float("longitude")->nullable();
            $table->enum('status', ['ABERTO', 'CONCLUIDO', 'A FAZER']);
            $table->dateTime("product_survey_datetime")->nullable();
            $table->dateTime("competitor_survey_datetime")->nullable();
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
