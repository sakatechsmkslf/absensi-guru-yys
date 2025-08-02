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
        Schema::table('users', function (Blueprint $table) {
            $table->foreign('instansi_1')->references('id')->on('instansis')->onDelete('set null');
            $table->foreign('instansi_2')->references('id')->on('instansis')->onDelete('set null');
            $table->foreign('instansi_3')->references('id')->on('instansis')->onDelete('set null');
            $table->foreign('instansi_4')->references('id')->on('instansis')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
