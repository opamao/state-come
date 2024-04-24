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
        Schema::create('objectifs_ajout', function (Blueprint $table) {
            $table->id('idobjectifa')->primary();
            $table->date('date_objectifa');
            $table->integer('quantite');
            $table->unsignedBigInteger('service_id');
            $table->foreign('service_id')->references('idservice')->on('services')->onDelete('cascade');
            $table->unsignedBigInteger('categorie_id');
            $table->foreign('categorie_id')->references('idcategorie')->on('categories')->onDelete('cascade');
            $table->unsignedBigInteger('objectif_id');
            $table->foreign('objectif_id')->references('idobjectif')->on('objectifs')->onDelete('cascade');
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
        Schema::dropIfExists('objectifs_ajout');
        Schema::table('objectifs_ajout', function (Blueprint $table) {
            $table->dropForeign(['service_id', 'categorie_id', 'objectif_id', 'responsable_id']);
            $table->dropColumn('service_id');
            $table->dropColumn('categorie_id');
            $table->dropColumn('objectif_id');
            $table->dropColumn('responsable_id');
        });
    }
};
