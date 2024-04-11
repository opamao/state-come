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
            $table->date('date_objectif');
            $table->integer('objectif');
            $table->unsignedBigInteger('service_id');
            $table->foreign('service_id')->references('idservice')->on('services')->onDelete('cascade');
            $table->unsignedBigInteger('responsable_id');
            $table->foreign('responsable_id')->references('id')->on('users')->onDelete('cascade');
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
            $table->dropForeign(['service_id', 'responsable_id']);
            $table->dropColumn('service_id');
            $table->dropColumn('responsable_id');
        });
    }
};
