<?php

namespace App\Livewire;

use App\Models\Unit;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class UnitComponent extends Component
{
    use WithPagination,WithoutUrlPagination,WithFileUploads;
    protected $paginationTheme = 'bootstrap';
    public $unit_data,$id;//variable data output
    public $nama,$seri,$jenis,$harga_pembelian,$hour_meter,$tahun_pembelian,$silo_awal,$silo_akhir,$silo,$status_unit;//variable data input
    public $addUnit,$editUnit = false;
    public function render()
    {
        $units['units']=Unit::paginate(5);
        return view('livewire.unit-component',$units);
        
    }
    public function show($id){
        $this->id=$id;
       
    }
    public function create(){
        $this->addUnit = true;
        
    }
    public function store(){
        $this->validate([
          
            'nama'=> 'required',
            'seri'=> 'required',
            'jenis'=> 'required',
            'harga_pembelian'=> 'required',
            'hour_meter'=> 'required',
            'tahun_pembelian'=> 'required',
            'silo_awal'=> 'required',
            'silo_akhir'=> 'required',
            'status_unit'=> 'required',
        ],[
            
            'nama.required'=>'Merk Tidak Boleh Kosong!',
            'seri.required'=>'Seri Tidak Boleh Kosong!',
            'jenis.required'=>'Jenis Tidak Boleh Kosong!',
            'hour_meter.required'=>'Hour Meter Tidak Boleh Kosong!',
            'harga_pembelian.required'=>'Harga Pembelian Tidak Boleh Kosong!',
            'tahun_pembelian.required'=>'Tahun Pembelian Tidak Boleh Kosong!',
            'silo_awal.required'=>'Masa Berlaku Tidak Boleh Kosong!',
            'silo_akhir.required'=>'Masa Berlaku Tidak Boleh Kosong!',
        ]);
        Unit::create([
            'nama'=>$this->nama,
            'seri'=>$this->seri,
            'jenis'=>$this->jenis,
            'hour_meter'=>$this->hour_meter,
            'harga_pembelian'=>$this->harga_pembelian,
            'tahun_pembelian'=>$this->tahun_pembelian,
            'silo_awal'=>$this->silo_awal,
            'silo_akhir'=>$this->silo_akhir,
            'status_unit'=>'Open',
        ]);
        session()->flash('success','Berhasil Membuat Unit');
        $this->reset();
    }
}
