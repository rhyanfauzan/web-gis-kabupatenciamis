<form enctype="multipart/form-data" id="form-keluarga" style="display: none">
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label>Foto Pemilik berserta rumah<sup style="color:red">*</sup></label>
                <div id="fileHelp" class="form-text">Ukuran maksimal 5MB dengan format .jpg, .jpeg, atau .png</div>
                <input id="file-foto-pemilik" name="file" type="file" class="file">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Nama Pemilik<sup style="color:red">*</sup></label>
                <input type="text" id="nama-pemilik" class="form-control" value="{{isset($item->nama_pemilik) ? $item->nama_pemilik : ""}}"/>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>No KTP<sup style="color:red">*</sup></label>
                <input type="text" id="nik-pemilik" class="form-control" value="{{isset($item->nik_pemilik) ? $item->nik_pemilik : ""}}"/>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label>Tanggal Lahir<sup style="color:red">*</sup></label>
                <input type="date" id="tanggal-lahir" class="form-control" value="{{isset($item->tanggal_lahir_pemilik) ? $item->tanggal_lahir_pemilik : ""}}"/>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>No Telepon</label>
                <input type="text" id="no-telepon-pemilik" class="form-control" value="{{isset($item->no_telepon_pemilik) ? $item->no_telepon_pemilik : ""}}"/>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label>Email</label>
                <input type="email" id="email-pemilik" class="form-control" value="{{isset($item->email_pemilik) ? $item->email_pemilik : ""}}"/>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Jumlah Keluarga<sup style="color:red">*</sup></label>
                <input type="text" id="jumlah-keluarga" class="form-control" value="{{isset($item->jumlah_keluarga) ? $item->jumlah_keluarga : ""}}"/>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label>No Kartu Keluarga<sup style="color:red">*</sup></label>
                <input type="text" id="no-kk-pemilik" class="form-control" value="{{isset($item->no_kk_pemilik) ? $item->no_kk_pemilik : ""}}"/>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Pendapatan Keluarga<sup style="color:red">*</sup></label>
                <select class="form-control select2" style="width: 100%"  id="pendapatan-keluarga">
                    @foreach($pendapatanKeluargas as $pendapatanKeluarga)
                        <option value="{{ $pendapatanKeluarga->id }}">{{ $pendapatanKeluarga->nama }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label>Luas Bangunan Per Kapita</label>
                <input type="text" id="luas-bangunan-perkapita" readonly class="form-control" value="{{isset($item->luas_bangunan_perkapita) ? $item->luas_bangunan_perkapita : ""}}"/>
            </div>
        </div>
    </div>

</form>
