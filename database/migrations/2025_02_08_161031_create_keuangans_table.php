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
        Schema::create('keuangans', function (Blueprint $table) {
            $table->id();
            $table->string('lokasi');// ambil lokasi dari table prakerja
            $table->string('unit');// ambil unit
            $table->integer('total_tagihan');// HM * Attachment  
            $table->integer('total_tagihan_ppn_pph');// HM * Attachment * 11%-2% 
            $table->integer('total_tagihan_ppn');// HM * Attachment * 11% 
            $table->integer('operasional');
            $table->string('keterangan');
            $table->integer('solar');// ambil dari konsumsi + harga table kerja
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('keuangans');
    }
};
