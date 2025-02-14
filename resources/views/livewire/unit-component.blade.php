<div class="card text-center">
    <div class="card-header">
      @if (session()->has("success"))
      <div class="alert alert-success" role="alert">
          {{ session('success')}}
        </div>
      @endif
      <ul class="nav nav-tabs card-header-tabs">
        <li class="nav-item">
          <a class="nav-link active "  href="{{route('unit')}}">List Unit</a>
        </li>
        
      </ul>
    </div>
    <div class="card-body">
     
      @forelse ($units as $data_unit)
      <h5 class="card-title">Unit Tersedia</h5>
      <div class="card" style="width: 18rem;">
       
        <div class="card-body">
          <h5 class="card-title">{{$data_unit->nama}} {{$data_unit->seri}}</h5>
          <p class="card-text">Jenis : {{$data_unit->jenis}} Status: {{$data_unit->status_unit}}</p>
          <p class="card-text">Berlaku Hingga: {{$data_unit->silo_akhir}}</p>
          <button class="btn btn-primary" wire:click="show({{$data_unit->id}})">Lihat Lebih Lengkap</button>
        </div>
      </div>
      @empty
      <h5 class="card-title">Data Kosong!</h5>
      @endforelse
      <button class="btn btn-primary float-left mt-4" wire:click="create" >Tambah Unit</button>

     
    </div>
    {{$units->links()}}
    @if ($addUnit == true)
          @include('unit.create')
       @endif
    @if ($editUnit == true)
          @include('unit.edit')
          @endif
   
  </div>