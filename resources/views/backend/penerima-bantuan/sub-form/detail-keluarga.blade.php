<div class="row">
    <div class="col-12 mb-2">
        <div class="gallery gallery-fw" data-item-height="200">
            <div class="gallery-item" data-image="{{ asset(str_replace('public/', 'storage/', $item->hunian->foto_pemilik)) }}" data-title="Foto Pemilik"></div>
        </div>
    </div>
    <div class="col-6 mb-2">
        <dl class="row">
            <dt class="col-sm-6">Nama Pemilik</dt>
            <dd class="col-sm-6">{{ $item->hunian->nama_pemilik }}</dd>

            <dt class="col-sm-6">No KTP Pemilik</dt>
            <dd class="col-sm-6">{{ $item->hunian->nik_pemilik }}</dd>

            <dt class="col-sm-6">No KK Pemilik</dt>
            <dd class="col-sm-6">{{ $item->hunian->no_kk_pemilik }}</dd>

            <dt class="col-sm-6">Jumlah Keluarga</dt>
            <dd class="col-sm-6">{{ $item->hunian->jumlah_keluarga }}</dd>
        </dl>
    </div>
    <div class="col-6 mb-2">
        <dl class="row">
            <dt class="col-sm-6">Tanggal Lahir Pemilik</dt>
            <dd class="col-sm-6">{{ $item->hunian->tanggal_lahir_pemilik }}</dd>

            <dt class="col-sm-6">No Telepon Pemilik</dt>
            <dd class="col-sm-6">{{ $item->hunian->no_telepon_pemilik }}</dd>

            <dt class="col-sm-6">Email Pemilik</dt>
            <dd class="col-sm-6">{{ $item->hunian->email_pemilik }}</dd>

        </dl>
    </div>
</div>
