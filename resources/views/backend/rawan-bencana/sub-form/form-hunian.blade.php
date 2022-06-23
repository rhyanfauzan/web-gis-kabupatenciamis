<form enctype="multipart/form-data" id="form-bencana">
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label>Nama Area</label>
                <input type="text" id="nama_area" name="nama_area" class="form-control" value="{{isset($data->nama_area) ? $data->nama_area : ""}}" />
                <input type="hidden" id="id_kawasan" name="id_kawasan" class="form-control" value="{{isset($data->id) ? $data->id : ""}}" />
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label>Gambar Lokasi</label>
                <div id="fileHelp" class="form-text">Ukuran maksimal 5MB dengan format .jpg, .jpeg, atau .png</div>
                <input id="file-foto-atap" name="file" type="file" class="file" value="{{isset($data->foto_lokasi) ? $data->foto_lokasi : ""}}">
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group">
                <label>Estimasi Waktu Bencana</label>
                <input type="date" id="estimasi_waktu" name="estimasi_waktu" class="form-control" value="{{isset($data->estimasi_waktu_bencana) ? $data->estimasi_waktu_bencana : ""}}" />
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label>Tipe Bencana</label>
                <select class="form-control select2" style="width: 100%"  id="tipe_bencana">
                @foreach($bencanas as $row)
                    @if (isset($data->bencana_id) && $row->id == $data->bencana_id)
                        <option value="{{ $row->id }}" selected>{{ $row->tipe_bencana }}</option>
                    @else
                        <option value="{{ $row->id }}">{{ $row->tipe_bencana }}</option>
                    @endif
                @endforeach
                </select>
            </div>
        </div>
    </div>
</form>
