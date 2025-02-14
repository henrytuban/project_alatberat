<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Prakerja extends Model
{
    use HasFactory;
    protected $table = 'prakerjas';
    protected $primaryKey = 'id';
    protected $fillable = ['id','unit_id','operator_id','lokasi','harga_satuan','attach_1','attach_2','harga_jenis_1','harga_jenis_2','nama_penyewa','nama_marketing','pembayaran','awal_kerja','akhir_kerja','mobilisasi','harga_sewa','status_unit','keterangan'];

    public function units():BelongsTo{
        return $this->belongsTo(Unit::class);
    }
    public function operators():BelongsTo{
        return $this->belongsTo(Operator::class);
    }
}
