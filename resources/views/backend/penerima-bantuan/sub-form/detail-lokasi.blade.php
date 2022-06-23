<div class="row">
    <div class="col-12 mb-2">
        <div id="map" class="map-js-height"></div>
        <div id="popup" class="ol-popup">
            <a href="#" id="popup-closer" class="ol-popup-closer"></a>
            <div id="popup-content"></div>
        </div>
    </div>
    <div class="col-12 mt-2">
        <dl class="row">
            <dt class="col-sm-6">Alamat Detail</dt>
            <dd class="col-sm-6">{{ $item->hunian->alamat_detail }}</dd>

            <dt class="col-sm-6">Desa</dt>
            <dd class="col-sm-6">{{ $item->hunian->desa->nama }}</dd>

            <dt class="col-sm-6">Kecamatan</dt>
            <dd class="col-sm-6">{{ $item->hunian->desa->kecamatan->nama }}</dd>
        </dl>
    </div>
</div>
