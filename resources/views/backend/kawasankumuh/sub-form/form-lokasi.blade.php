<form id="form-lokasi" style="display: none">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Kecamatan</label>
                <select class="form-control select2" style="width: 100%"  id="kecamatan">
                    @foreach($kecamatans as $kecamatan)
                        <option value="{{ $kecamatan->id }}">{{ $kecamatan->nama }}</option>
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
        <!-- <div class="col-md-12">
            <div id="map" class="map-js-height"></div>
            <div id="popup" class="ol-popup">
                <a href="#" id="popup-closer" class="ol-popup-closer"></a>
                <div id="popup-content"></div>
            </div>
        </div> -->

        <div class="col-md-12">
            <div class="form-group">
                <label>Alamat Detail</label>
                <textarea class="form-control" id="alamat-detail"></textarea>
            </div>
        </div>
    </div>

</form>
