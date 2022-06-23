<form enctype="multipart/form-data" id="form-hunian">
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label>Kecamatan</label>
                <select class="form-control select2" style="width: 100%" id="kecamatan">
                    @foreach ($kecamatans as $row)
                        @if (isset($data->kecamatan_id) && $row->id == $data->kecamatan_id)
                            <option value="{{$row->id}}" selected>{{$row->nama}}</option>
                        @else
                            <option value="{{$row->id}}">{{$row->nama}}</option>
                        @endif

                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Jumlah KK</label>
                <input type="number" id="jumlah-kk" class="form-control" value="{{isset($data->jumlah_kk) ? $data->jumlah_kk : ""}}" />
                <input type="hidden" id="id_backlog" class="form-control"  value="{{isset($data->id) ? $data->id : ""}}"/>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Jumlah Penduduk</label>
                <input type="number" id="jumlah-penduduk" class="form-control"  value="{{isset($data->jumlah_penduduk) ? $data->jumlah_penduduk : ""}}"/>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Jumlah Rumah</label>
                <input type="number" id="jumlah-rumah" class="form-control" value="{{isset($data->jumlah_rumah) ? $data->jumlah_rumah : ""}}" />
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Kebutuhan Rumah</label>
                <input type="number" id="kebutuhan-rumah" class="form-control" value="{{isset($data->kebutuhan_rumah) ? $data->kebutuhan_rumah : ""}}"/>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Tangal</label>
                <input type="date" id="tgl" class="form-control" value="{{isset($data->tgl) ? $data->tgl : ""}}"/>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Backlog</label>
                <input type="number" id="backlog" class="form-control" value="{{isset($data->backlog) ? $data->backlog : ""}}" readonly/>
            </div>
        </div>
        

</form>
