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
        Schema::create('interactions_clients', function (Blueprint $table) {
            $table->id('idincli')->primary();
            $table->string('type_interaction')->comment('appel, email, reunion, terrain');
            $table->date('date_interaction');
            $table->time('heure_interaction');
            $table->longText('note_interaction')->nullable();
            $table->unsignedBigInteger('commercial_id');
            $table->foreign('commercial_id')->references('idcome')->on('commercial')->onDelete('cascade');
            $table->unsignedBigInteger('client_id');
            $table->foreign('client_id')->references('idclient')->on('clients')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('interactions_clients');
        Schema::table('interactions_clients', function (Blueprint $table) {
            $table->dropForeign(['commercial_id', 'client_id']);
            $table->dropColumn('commercial_id');
            $table->dropColumn('client_id');
        });
    }
};