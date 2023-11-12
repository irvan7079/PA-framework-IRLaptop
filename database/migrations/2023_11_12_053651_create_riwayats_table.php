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
        Schema::create('riwayats', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_transaksi')->constrained();
            $table->foreignId('id_user')->constrained();
            $table->string('nama_user_r');
            $table->string('merk_laptop_r');
            $table->integer('harga_laptop_r');
            $table->integer('jumlah_laptop_r');
            $table->integer('total_harga_r');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('riwayats');
    }
};
