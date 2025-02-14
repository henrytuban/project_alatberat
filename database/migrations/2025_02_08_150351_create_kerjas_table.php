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
        Schema::create('kerjas', function (Blueprint $table) {
            $table->id();
            $table->integer('hour_meter');//Tambah HM Unit
            $table->foreignIdFor(Unit::class);//Unit
            $table->integer('fee_operator');
            $table->string('attachment_digunakan');
            $table->integer('uang_makan');
            $table->integer('solar_harga');
            $table->integer('solar_konsumsi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kerjas');
    }
};
