<div class="card align-content-center ml-5" style="width: 18rem;">
    <div class="card-header">
      Formulir Tambah Unit
    </div>
    <ul class="list-group list-group-flush">
      <li class="list-group-item">Merk: <input type="text" name="nama" id="nama" wire:model="nama" autofocus></li>
      @error('nama')
      <div  class="form-text text-danger">{{$message}}</div>
      @enderror
      <li class="list-group-item">Seri: <input type="text" name="seri" id="seri" wire:model="seri"></li>
      @error('seri')
      <div  class="form-text text-danger">{{$message}}</div>
      @enderror
      <li class="list-group-item">Jenis: <input type="text" name="jenis" id="jenis" wire:model="jenis"></li>
      @error('jenis')
      <div  class="form-text text-danger">{{$message}}</div>
      @enderror
      <li class="list-group-item">Hour Meter: <input type="number" name="hour_meter" id="hour_meter" wire:model="hour_meter"> Jam</li>
      @error('hour_meter')
      <div  class="form-text text-danger">{{$message}}</div>
      @enderror
      <li class="list-group-item">Harga Pembelian: <input type="number" name="harga_pembelian" id="harga_pembelian" wire:model="harga_pembelian"> Rp</li>
      @error('harga_pembelian')
      <div  class="form-text text-danger">{{$message}}</div>
      @enderror
      <li class="list-group-item">Tahun Pembelian: <input type="date" name="tahun_pembelian" id="tahun_pembelian" wire:model="tahun_pembelian"></li>
      @error('tahun_pembelian')
      <div  class="form-text text-danger">{{$message}}</div>
      @enderror
      <li class="list-group-item">Masa Berlaku : <input type="date" name="silo_awal" id="silo_awal" wire:model="silo_awal"> -> <input type="date" name="silo_akhir" id="silo_akhir" wire:model="silo_akhir"></li>
        @error('silo_awal')
                       <div  class="form-text text-danger">{{$message}}</div>
                       @enderror
        @error('silo_akhir')
                       <div  class="form-text text-danger">{{$message}}</div>
                       @enderror
    
      <li class="list-group-item">  <button class="btn btn-outline-primary" wire:click="store">Tambah Unit</button></li>
    </ul>
  </div>