<?php

use App\Models\Unit;
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
        Schema::create('perawatans', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Unit::class);//Unit
            $table->integer('hour_meter');//Ambil HM UNit
            $table->integer('harga_oli');
            $table->integer('harga_filter');
            $table->string('exterior');
            $table->string('harga_exterior');
            $table->string('jenis_filter');
            $table->string('jenis_oli');
            $table->string('interior');
            $table->string('harga_interior');
            $table->date('tanggal_perawatan');
            $table->string('keterangan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perawatans');
    }
};
