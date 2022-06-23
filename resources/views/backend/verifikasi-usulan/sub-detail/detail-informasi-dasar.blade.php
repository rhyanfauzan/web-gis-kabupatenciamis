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
            <dt class="col-sm-6">Nama Pemilik</dt>
            <dd class="col-sm-6">{{$item->hunian->nama_pemilik}}</dd>

            <dt class="col-sm-6">Tanggal Lahir</dt>
            <dd class="col-sm-6">{{$item->hunian->tanggal_lahir_pemilik}}</dd>

            <dt class="col-sm-6">Nomor Telepon Pemilik</dt>
            <dd class="col-sm-6">{{$item->hunian->no_telepon_pemilik}}</dd>

            <dt class="col-sm-6">Email Pemilik</dt>
            <dd class="col-sm-6">{{$item->hunian->email_pemilik}}</dd>


            <dt class="col-sm-6">Desa</dt>
            <dd class="col-sm-6">{{$item->hunian->desa->nama}}</dd>

            <dt class="col-sm-6">NIK Pemilik</dt>
            <dd class="col-sm-6">{{$item->hunian->nik_pemilik}}</dd>

            <dt class="col-sm-6">Nomor KK Pemilik</dt>
            <dd class="col-sm-6">{{$item->hunian->no_kk_pemilik}}</dd>

            <dt class="col-sm-6">Nomor KK Pemilik</dt>
            <dd class="col-sm-6">{{$item->hunian->no_kk_pemilik}}</dd>

            <dt class="col-sm-6">Pendapatan Keluarga</dt>
            <dd class="col-sm-6">{{$item->hunian->pendapatan_keluarga->nama}}</dd>
        </dl>
    </div>
</div>
