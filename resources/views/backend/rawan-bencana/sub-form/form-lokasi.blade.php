<form id="form-lokasi" style="display: none">
    <div class="row">
        <div class="col-md-6">
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
        <div class="col-md-6">
            <div class="form-group">
                <label>Desa</label>
                <select class="form-control select2" style="width: 100%"  id="desa">
                </select>
            </div>
        </div>
        <div class="col-md-12">
            <div id="map" class="map-js-height"></div>
            <div id="popup" class="ol-popup">
                <a href="#" id="popup-closer" class="ol-popup-closer"></a>
                <div id="popup-content"></div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group">
                <label>Luas Area Rawan Benacana (m<sup>2)</sup></label>
                <input type="text" id="luas_area" class="form-control" value="{{isset($data->luas_area) ? $data->luas_area : ""}}"/>
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group">
                <label>Jumlah Rumah Terdampak</label>
                <input type="number" id="jumlah_rumah_terdampak" class="form-control" value="{{isset($data->jumlah_rumah_terdampak) ? $data->jumlah_rumah_terdampak : ""}}"/>
            </div>
        </div>
    </div>

</form>
