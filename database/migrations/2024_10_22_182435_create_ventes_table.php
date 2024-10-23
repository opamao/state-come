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
        Schema::create('ventes', function (Blueprint $table) {
            $table->id('idvente')->primary();
            $table->string('produit')->nullable();
            $table->integer('quantite');
            $table->decimal('montant_total')->default(0);
            $table->date('date_vente')->nullable();
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
        Schema::dropIfExists('ventes');
        Schema::table('ventes', function (Blueprint $table) {
            $table->dropForeign(['commercial_id', 'client_id']);
            $table->dropColumn('commercial_id');
            $table->dropColumn('client_id');
        });
    }
};
