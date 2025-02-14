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
        Schema::create('operators', function (Blueprint $table) {
            $table->id();
            $table->enum('status_operator',['Sakit','Open','Kerja']);//Status Berdasarkan Unit
            $table->string('nama_lengkap');
            $table->string('nomor_telepon');
            $table->string('nik');
            $table->string('alamat');
            $table->string('ktp');
            $table->string('sio');
            $table->string('keterangan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('operators');
    }
};
