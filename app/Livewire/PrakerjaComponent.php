<?php

namespace App\Livewire;

use App\Models\Attach;
use App\Models\Operator;
use App\Models\Prakerja;
use App\Models\Unit;
use Livewire\Component;

class PrakerjaComponent extends Component
{
    public $addProject,$editProject = false;
    public $dpInput,$mobInput = null;   
    public $operator, $attach;
    public $nama_penyewa,$unit_id,$operator_id,$lokasi,$uang_makan,$harga_satuan,$attach_1,$harga_jenis_1,$attach_2,$harga_jenis_2,$dp,$nominal_dp,$mingguan,$lunas,$keterangan,$nominal_mob,$mob_luar,$mob_kantor,$nama_marketing;//Input Variable
    public function toggleInput($dp)
    {
        $this->dpInput = $dp;
    }
    public function mount(){
        $this->operator = Operator::all();
        $this->attach = Attach::all();
    }
    public function toggleMob($mob)
    {
        $this->mobInput = $mob;
    }
   
    public function render()
    {
        $data['prakerjas']=Prakerja::paginate(5);
        $unit_id['units']=Unit::all();
      
        return view('livewire.prakerja-component', $data,$unit_id);
    }
    public function store(){
        $this->validate([
            'nama_penyewa'=>'required',
            'nama_marketing'=>'nullable',
            'unit_id'=>'required',
            'operator'=>'required',
            'lokasi'=>'required',
            'uang_makan'=>'required',
            'harga_satuan'=>'required',
            'attach_1'=>'required',
            'harga_jenis_1'=>'required_if:attach_1,!=,null|numeric|min:1',
            'attach_2'=>'nullable',
            'harga_jenis_2'=>'required_if:attach_2,!=,null|numeric|min:1',
            'dp'=>'nullable',
            'nominal_dp'=>'required_if:dp,!=,null|numeric|min:1',
           'mingguan'=>'nullable',
            'lunas'=>'nullable',
            'keterangan'=>'nullable',
            'mob_luar'=>'nullable',
            'mob_kantor'=>'nullable',
            'nominal_mob'=>'required_if:mob_kantor,!=,null|numeric|min:1'
        ]);
        $pembayaran = null;
        if ($this->dp === 'dp') {
            $pembayaran = 'DP';
        } elseif ($this->mingguan === 'mingguan') {
            $pembayaran = 'Mingguan';
        } elseif ($this->lunas === 'lunas') {
            $pembayaran = 'Lunas';
        }

        $mobilisasi = null;
        if ($this->mob_kantor === 'mob_kantor') {
            $mobilisasi = 'mob_kantor';
        } elseif ($this->mob_luar === 'mob_luar') {
            $mobilisasi = 'mob_luar';
        }
        Prakerja::create([
            'nama_penyewa'=>$this->nama_penyewa,
            'nama_marketing'=>$this->nama_marketing,
            'unit_id'=>$this->unit_id,
            'operator_id'=>$this->operator_id,
            'lokasi'=>$this->lokasi,
            'uang_makan'=>$this->uang_makan,
            'harga_satuan'=>$this->harga_satuan,
            'attach_1'=>$this->attach_1,
            'harga_jenis_1'=>$this->harga_jenis_1,
            'attach_2'=>$this->attach_2,
            'harga_jenis_2'=>$this->harga_jenis_2,
            'nominal_dp'=>$this->nominal_dp,
            'pembayaran'=>$pembayaran,
            'mobilisasi'=>$mobilisasi,
            'nominal_mob'=>$this->nominal_mob,
            'keterangan'=>$this->keterangan,
        ]);
        $unit = Unit::find($this->id);

        if ($unit && $unit->unit_status === 'Open') {
            // Mengubah status unit menjadi 'Kerja'
            $unit->unit_status = 'Kerja';
            $unit->save();
        }
        $operator_id = Operator::find($this->id);
        if ($operator_id && $operator_id->status_operator === 'Open') {
            // Mengubah status unit menjadi 'Kerja'
            $operator_id->status_operator = 'Kerja';
            $operator_id->save();
        }
    }
}
