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
        Schema::create('units', function (Blueprint $table) {
            $table->id();
            $table->string('nama')->nullable();
            $table->string('seri')->nullable();
            $table->string('jenis')->nullable();
            $table->integer('harga_pembelian');
            $table->integer('hour_meter');//HM Unit
            $table->enum('status_unit',['Open','Kerja','Servis'])->default('Open');
            $table->date('silo_awal');
            $table->date('silo_akhir');
            $table->date('tahun_pembelian');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('units');
    }
};
