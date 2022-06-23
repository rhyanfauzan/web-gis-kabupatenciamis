<form enctype="multipart/form-data" id="form-keluarga">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Nama Pemilik</label>
                <input type="text" id="nama-pemilik" class="form-control" />
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label>No KTP</label>
                <input type="text" id="nik-pemilik" class="form-control" />
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label>Tanggal Lahir</label>
                <input type="date" id="tanggal-lahir" class="form-control" />
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>No Telepon</label>
                <input type="text" id="no-telepon-pemilik" class="form-control" />
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label>Email</label>
                <input type="email" id="email-pemilik" class="form-control" />
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Jumlah Keluarga</label>
                <input type="text" id="jumlah-keluarga" class="form-control" />
            </div>
        </div>


        <div class="col-md-6">
            <div class="form-group">
                <label>Pendapatan Keluarga</label>
                <select class="form-control select2" style="width: 100%"  id="pendapatan-keluarga">
                    @foreach($pendapatanKeluargas as $pendapatanKeluarga)
                        <option value="{{ $pendapatanKeluarga->id }}">{{ $pendapatanKeluarga->nama }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>

</form>
