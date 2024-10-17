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
        Schema::create('commercial', function (Blueprint $table) {
            $table->id('idcome')->primary();
            $table->string('nom_come');
            $table->string('prenom_come');
            $table->string('phone_come');
            $table->string('email_come');
            $table->string('password_come');
            $table->unsignedBigInteger('responsable_id');
            $table->foreign('responsable_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('entreprise_id')->default(0);
            $table->foreign('entreprise_id')->references('identre')->on('entreprises')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('commercial');
        Schema::table('commercial', function (Blueprint $table) {
            $table->dropForeign(['responsable_id','entreprise_id']);
            $table->dropColumn('responsable_id');
            $table->dropColumn('entreprise_id');
        });
    }
};
