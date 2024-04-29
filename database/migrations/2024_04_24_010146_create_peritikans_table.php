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
        Schema::create('peritikans', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal')->nullable();
            $table->integer('jumlah_penambahan')->nullable();
            $table->integer('jumlah_kematian')->nullable();
            $table->integer('jumlah_sakit')->nullable();
            $table->integer('jumlah_total')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peritikans');
    }
};
