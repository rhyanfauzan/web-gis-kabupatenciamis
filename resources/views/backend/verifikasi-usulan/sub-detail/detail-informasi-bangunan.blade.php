<div class="row">
    <div class="col-12 mt-2">
        <dl class="row">
            <dt class="col-sm-6">Luas Tanah</dt>
            <dd class="col-sm-6">{{$item->hunian->luas_tanah}} (m<sup>2</sup>)</dd>

            <dt class="col-sm-6">Luas Bangunan</dt>
            <dd class="col-sm-6">{{$item->hunian->luas_bangunan}} (m<sup>2</sup>)</dd>

            <dt class="col-sm-6">Dibangun Oleh Pengembang</dt>
            <dd class="col-sm-6">{{$item->hunian->dibangun_oleh_pengembang}}</dd>

            <dt class="col-sm-6">Nama Pengembang</dt>
            <dd class="col-sm-6">{{$item->hunian->nama_pengembang}}</dd>

            <dt class="col-sm-6">Bentuk Bangunan</dt>
            <dd class="col-sm-6">{{$item->hunian->bentuk_bangunan->nama}}</dd>

            <dt class="col-sm-6">Memiliki IMB</dt>
            <dd class="col-sm-6">{{$item->hunian->memiliki_imb}}</dd>

            <dt class="col-sm-6">Tersedia Listrik</dt>
            <dd class="col-sm-6">{{$item->hunian->tersedia_listrik}}</dd>

            <dt class="col-sm-6">Status Kepemilikan</dt>
            <dd class="col-sm-6">{{$item->hunian->status_kepemilikan->nama}}</dd>

            <dt class="col-sm-6">Memiliki Septic Tank</dt>
            <dd class="col-sm-6">{{$item->hunian->septic_tank}}</dd>

            <dt class="col-sm-6">Luas Bangunan Perkapita</dt>
            <dd class="col-sm-6">{{$item->hunian->luas_bangunan_perkapita}} (m<sup>2</sup>)</dd>
        </dl>
    </div>
</div>
