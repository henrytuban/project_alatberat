<?php

use App\Models\Unit;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Operator;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('prakerjas', function (Blueprint $table) {
            $table->id(); 
            $table->foreignIdFor(Unit::class); //Unit
            $table->foreignIdFor(Operator::class); //Operator
            $table->string('lokasi')->nullable();
            $table->integer('uang_makan')->nullable();
            $table->string('harga_satuan')->nullable();
            $table->string('attach_1')->nullable();
            $table->integer('harga_jenis_1')->nullable();
            $table->string('attach_2')->nullable(true);
            $table->integer('harga_jenis_2')->nullable(true);
            $table->string('nama_penyewa')->nullable();
            $table->string('nama_marketing')->nullable();
            $table->enum('pembayaran',['dp','mingguan','lunas'])->nullable();
            $table->integer('nominal_dp')->nullable(true);
            $table->date('awal_kerja')->nullable();
            $table->date('akhir_kerja')->nullable();
            $table->enum('mobilisasi',['mob_luar','mob_kantor'])->nullable();
            $table->integer('nominal_mob')->nullable(true);
            $table->integer('harga_sewa');
            $table->string('keterangan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prakerjas');
    }
};
