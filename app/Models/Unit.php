<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Unit extends Model
{
    use HasFactory;
    protected $table = 'units';
    protected $primaryKey = 'id';
    protected $fillable = ['nama','seri','jenis','harga_pembelian','hour_meter','status','silo_awal','silo_akhir','tahun_pembelian'];

    public function prakerjas():HasMany{
        return $this->hasMany(Prakerja::class);
    }

}
