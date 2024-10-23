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
        Schema::create('objectifs', function (Blueprint $table) {
            $table->id('idobjectif')->primary();
            $table->date('date_debut');
            $table->date('date_fin');
            $table->integer('quota_ventes')->comment("Objectif de ventes à atteindre");
            $table->unsignedBigInteger('service_id')->nullable();
            $table->foreign('service_id')->references('idservice')->on('services')->onDelete('cascade');
            $table->unsignedBigInteger('commercial_id');
            $table->foreign('commercial_id')->references('idcome')->on('commercial')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('objectifs');
        Schema::table('objectifs', function (Blueprint $table) {
            $table->dropForeign(['service_id', 'commercial_id']);
            $table->dropColumn('service_id');
            $table->dropColumn('commercial_id');
        });
    }
};
