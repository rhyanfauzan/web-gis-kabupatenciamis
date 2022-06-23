<div class="row">
    <div class="col-12 mb-2">
        <div class="gallery gallery-fw" data-item-height="200">
            <div class="gallery-item" data-image="{{ asset(str_replace('public/', 'storage/', $item->hunian->foto_hunian)) }}" data-title="Foto Hunian"></div>
        </div>
    </div>
    <div class="col-6 mb-2">
        <dl class="row">


            <dt class="col-sm-6">Tersedia Listrik</dt>
            <dd class="col-sm-6">
                @if ($item->hunian->tersedia_listrik == 'y')
                    Ya <span class="badge badge-success"><i class="fas fa-check-circle"></i> </span>
                @else
                    Tidak <span class="badge badge-danger"><i class="fas fa-times-circle"></i> </span>
                @endif
            </dd>

            <dt class="col-sm-6">Dibangun Oleh Pengembang</dt>
            <dd class="col-sm-6">
                @if ($item->hunian->dibangun_oleh_pengembang == 'y')
                    Ya <span class="badge badge-success"><i class="fas fa-check-circle"></i> </span>
                @else
                    Tidak <span class="badge badge-danger"><i class="fas fa-times-circle"></i> </span>
                @endif
            </dd>

            @if ($item->hunian->dibangun_oleh_pengembang == 'y')
                <dt class="col-sm-6">Dibangun Oleh Pengembang</dt>
                <dd class="col-sm-6">
                    {{ $item->hunian->nama_pengembang }}
                </dd>
            @endif
        </dl>
    </div>
    <div class="col-6 mb-2">
        <dl class="row">
            <dt class="col-sm-6">Luas Tanah</dt>
            <dd class="col-sm-6">{{ $item->hunian->luas_tanah }}m<sup>2</sup></dd>

            <dt class="col-sm-6">Luas Bangunan</dt>
            <dd class="col-sm-6">{{ $item->hunian->luas_bangunan }}m<sup>2</sup></dd>

            <dt class="col-sm-6">Luas Bangunan Per Kapita</dt>
            <dd class="col-sm-6">{{ $item->hunian->luas_bangunan_perkapita }}m<sup>2</sup></dd>

            <dt class="col-sm-6">Memiliki Izin Mendirikan Bangunan (IMB)</dt>
            <dd class="col-sm-6">
                @if ($item->hunian->memiliki_imb == 'y')
                    Ya <span class="badge badge-success"><i class="fas fa-check-circle"></i> </span>
                @else
                    Tidak <span class="badge badge-danger"><i class="fas fa-times-circle"></i> </span>
                @endif
            </dd>

            @if ($item->hunian->memiliki_imb == 'y')
                <dt class="col-sm-6">Nomor IMB</dt>
                <dd class="col-sm-6">
                    {{ $item->hunian->nomor_imb }}
                </dd>
            @endif

            <dt class="col-sm-6">Memiliki Septic Tank</dt>
            <dd class="col-sm-6">
                @if ($item->hunian->septic_tank == 'y')
                    Ya <span class="badge badge-success"><i class="fas fa-check-circle"></i> </span>
                @else
                    Tidak <span class="badge badge-danger"><i class="fas fa-times-circle"></i> </span>
                @endif
            </dd>
        </dl>
    </div>
    <div class="col-12 mb-2">
        <p>Foto Kondisi Rumah</p>
        <div class="gallery gallery-md" data-item-height="100">
            @if (isset($item->hunian->kondisi_atap) && $item->hunian->kondisi_atap != null && $item->hunian->kondisi_atap != '')
                <div class="gallery-item" data-image="{{ asset(str_replace('public/', 'storage/', $item->hunian->kondisi_atap)) }}" data-title="Foto Kondisi Atap"></div>
            @endif
            @if (isset($item->hunian->kondisi_dinding) && $item->hunian->kondisi_dinding != null && $item->hunian->kondisi_dinding != '')
                <div class="gallery-item" data-image="{{ asset(str_replace('public/', 'storage/', $item->hunian->kondisi_dinding)) }}" data-title="Foto Kondisi Dinding"></div>
            @endif
            @if (isset($item->hunian->kondisi_lantai) && $item->hunian->kondisi_lantai != null && $item->hunian->kondisi_lantai != '')
                <div class="gallery-item" data-image="{{ asset(str_replace('public/', 'storage/', $item->hunian->kondisi_lantai)) }}" data-title="Foto Kondisi Lantai"></div>
            @endif
            @if (isset($item->hunian->kondisi_kamar_mandi) && $item->hunian->kondisi_kamar_mandi != null && $item->hunian->kondisi_kamar_mandi != '')
                <div class="gallery-item" data-image="{{ asset(str_replace('public/', 'storage/', $item->hunian->kondisi_kamar_mandi)) }}" data-title="Foto Kondisi Kamar Mandi"></div>
            @endif
            @if (isset($item->hunian->kondisi_mck) && $item->hunian->kondisi_mck != null && $item->hunian->kondisi_mck != '')
                <div class="gallery-item" data-image="{{ asset(str_replace('public/', 'storage/', $item->hunian->kondisi_mck)) }}" data-title="Foto Kondisi MCK"></div>
            @endif
            @if (isset($item->hunian->kondisi_sumber_air_minum) && $item->hunian->kondisi_sumber_air_minum != null && $item->hunian->kondisi_sumber_air_minum != '')
                <div class="gallery-item" data-image="{{ asset(str_replace('public/', 'storage/', $item->hunian->kondisi_sumber_air_minum)) }}" data-title="Foto Kondisi Sumber Air Minum"></div>
            @endif
        </div>
    </div>

</div>
