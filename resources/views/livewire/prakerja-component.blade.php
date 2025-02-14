<div class="container">
    <h3>Buat Proyek</h3>
   <form>
    <div class="mb-3">
        <label for="nama_penyewa" class="form-label">Nama Penyewa</label>
        <input type="text" name="nama_penyewa" id="nama_penyewa" class="form-control" wire:model="nama_penyewa"> 
    </div>
    <div class="mb-3">
        <label for="nama_marketing" class="form-label">Nama Sales</label>
        <input type="text" name="nama_marketing" id="nama_marketing" class="form-control" wire:model="nama_marketing"> 
    </div>
    <div class="mb-3">
        <label for="lokasi" class="form-label">Lokasi</label>
        <input type="text" name="lokasi" id="lokasi" class="form-control" wire:model="lokasi">
    </div>
    <div class="mb-3">
        <label for="unit_id" class="form-label">Pilih Unit</label>
        <select name="unit_id" id="unit_id" class="form-select form-control" wire:model="unit_id">
            <option value="" disabled>Pilih Unit</option>
            @foreach ($units as $units)
            <option value="{{$units->id}}">{{$units->nama}}{{$units->seri}}</option>
        @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="awal_kerja" class="form-label">Tanggal Awal Kerja</label>
        <input type="date" name="awal_kerja" id="awal_kerja" class="form-control" wire:model="awal_kerja">
    </div>
    <div class="mb-3">
        <label for="akhir_kerja" class="form-label">Tanggal Akhir Kerja</label>
        <input type="date" name="akhir_kerja" id="akhir_kerja" class="form-control" wire:model="akhir_kerja">
    </div>
    <div class="mb-3">
        <label for="operator" class="form-label">Pilih Operator</label>
        <select name="operator" id="operator" class="form-select form-control" wire:model="operator_id">
            <option value="" disabled>Pilih Operator</option>
            @forelse ($operator as $data)
                <option value="{{$data->id}}">{{$data->nama_lengkap}}</option>
            @empty
                
            @endforelse
        </select>
    </div>
    <div class="mb-3">
        <label for="uang_makan" class="form-label">Uang Makan</label>
        <input type="number" name="uang_makan" id="uang_makan" class="form-control" placeholder="Rp" wire:model="uang_makan">    
    </div>
    <div class="mb-3">
        <label for="harga_satuan" class="form-label">Pilih Satuan</label>
        <select name="harga_satuan" id="harga_satuan" class="form-select form-control" wire:model="harga_satuan">
            <option value="" disabled>Pilih Satuan</option>
            <option value="kosongan" >Kosongan</option>
            <option value="all_in" >ALL IN</option>
            
        </select>
    </div>
    <div class="mb-3">
        <label class="">Pilih Attachment</label>
        <div></div>
        <select name="attach_1" id="attach_1" class="form-select form-control" wire:model="attach_1">
            <option value="" disabled>Pilih Attachment</option>
            @foreach ($attach as $attach_data)
            <option value="{{$attach_data->id}}">{{$attach_data->nama}}</option>
        @endforeach
        </select>
        <input type="number" name="harga_jenis_1" id="harga_jenis_1" class="form-control mt-3" placeholder="Rp" wire:model="harga_jenis_1">
        <select name="attach_2" id="attach_2" class="form-select mt-2 form-control" wire:model="attach_2">
            <option value="" disabled>Pilih Attachment</option>
            @foreach ($attach as $attach_data)
                <option value="{{$attach_data->id}}">{{$attach_data->nama}}</option>
            @endforeach
        </select>
        <input type="number" name="harga_jenis_2" id="harga_jenis_2" class="form-control mt-3" placeholder="Rp" wire:model="harga_jenis_2">
    </div>
   <div class="mb-3">
    
        <label class="" for="">
          Pembayaran
        </label>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" value="dp" wire:click="toggleInput('dp')" wire:model="dp">
            <label class="form-check-label" for="flexRadioDefault1">
              DP
            </label>
          </div>
          @if($dpInput === 'dp')
          <div class="mb-3" id="dp-input">
            <input type="number" name="dp" id="dp" placeholder="Rp" class="form-control" wire:model="nominal_dp">
          </div>
        @endif
          
        <div class="form-check">
            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" value="mingguan" wire:click="toggleInput('mingguan')" wire:model="mingguan">
            <label class="form-check-label" for="flexRadioDefault2">
              Mingguan
            </label>
          </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault3" value="lunas" wire:click="toggleInput('lunas')" wire:model="lunas">
            <label class="form-check-label" for="flexRadioDefault3">
              Lunas
            </label>
          </div>
        <div class="mb-3">
            <label class="" for="">
              Mobilisasi
              </label>
              <div class="form-check">
                  <input class="form-check-input" type="radio" name="flexRadio1" id="flexRadio1" value="mob_kantor" wire:click="toggleMob('mob_kantor')" wire:model="mob_kantor">
                  <label class="form-check-label" for="flexRadio1">
                    Mob Kantor
                  </label>
                </div>
                @if($mobInput === 'mob_kantor')
                <div class="mb-3" id="mob-input">
                  <input type="number" name="mob" id="mob" placeholder="Rp" class="form-control" wire:model="nominal_mob">
                </div>
              @endif
              <div class="form-check">
                <input class="form-check-input" type="radio" name="flexRadio1" id="flexRadio1" value="mob_luar" wire:click="toggleMob('mob_luar')" wire:model="mob_luar">
                <label class="form-check-label" for="flexRadio1">
                  Mob Luar
                </label>
              </div>
        </div>
    
   </div>
   <div class="mb-3">
    <label for="keterangan" class="form-label">Keterangan</label>
    <input type="text" name="keterangan" id="keterangan" class="form-control" wire:model="keterangan">
   </div>
</form>
    <button class="btn btn-primary mb-3" wire:click="store" >Simpan Data</button>

</div>
