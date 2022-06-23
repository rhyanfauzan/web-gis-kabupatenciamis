<form enctype="multipart/form-data" id="form-hunian">
    <div class="row">
    <div class="col-md-12">
            <div class="form-group">
            <label>Nama Area</label>
                <input type="text" id="nama_area" class="form-control" value="{{isset($data->nama_area) ? $data->nama_area : ""}}"/>
                <input type="hidden" id="id_kawasan_kumuh" class="form-control" value="{{isset($data->id) ? $data->id : ""}}"/>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label>Gambar Lokasi</label>
                <div id="fileHelp" class="form-text">Ukuran maksimal 5MB dengan format .jpg, .jpeg, atau .png</div>
                <input id="file-foto-kumuh" name="file" type="file" class="file">
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label>Kecamatan</label>
                <select class="form-control select2" style="width: 100%"  id="kecamatan">
                    @foreach($kecamatans as $kecamatan)
                        @if (isset($data->kecamatan_id) && $kecamatan->id == $data->kecamatan_id)
                            <option value="{{ $kecamatan->id }}" selected>{{ $kecamatan->nama }}</option>
                        @else
                            <option value="{{ $kecamatan->id }}">{{ $kecamatan->nama }}</option>
                         @endif
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label>Desa</label>
                <select class="form-control select2" style="width: 100%"  id="desa">
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Luas Area (m<sup>2</sup>)</label>
                <input type="text" id="luas_area" class="form-control" value="{{isset($data->luas_area) ? $data->luas_area : ""}}" />
            </div>
        </div>
        
        <!-- <div class="col-md-12">
            <div class="form-group">
                <label>Pilih Lokasi Koordinat</label>
                <div id="map" class="map-js-height"></div>
                <div id="popup" class="ol-popup">
                    <a href="#" id="popup-closer" class="ol-popup-closer"></a>
                    <div id="popup-content"></div>
                </div>

            </div>
        </div> -->

</form>
