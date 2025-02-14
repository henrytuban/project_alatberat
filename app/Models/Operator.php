<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Operator extends Model
{
    use HasFactory;
    protected $table="operators";
    protected $primaryKey="id";
    protected $fillable=['id','status','nama_lengkap','nik','alamat','ktp','sio','keterangan'];
    public function prakerjas():HasMany{
        return $this->hasMany(Prakerja::class);
    }
}
