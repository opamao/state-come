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
        Schema::create('clients', function (Blueprint $table) {
            $table->id('idclient')->primary();
            $table->string('nom_client')->nullable();
            $table->string('email_client')->nullable();
            $table->string('phone_client')->nullable();
            $table->string('adresse_client')->nullable();
            $table->string('type_client')->comment('prospect, actif');
            $table->unsignedBigInteger('entreprise_id');
            $table->foreign('entreprise_id')->references('identre')->on('entreprises')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
        Schema::table('clients', function (Blueprint $table) {
            $table->dropForeign(['entreprise_id']);
            $table->dropColumn('entreprise_id');
        });
    }
};
