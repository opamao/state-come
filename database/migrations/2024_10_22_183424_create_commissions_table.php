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
        Schema::create('commissions', function (Blueprint $table) {
            $table->id('idcomi')->primary();
            $table->decimal('montant_commission');
            $table->date('date_commission');
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
        Schema::dropIfExists('commissions');
        Schema::table('commissions', function (Blueprint $table) {
            $table->dropForeign(['commercial_id']);
            $table->dropColumn('commercial_id');
        });
    }
};
