<div id="example-basic">
    <h3>Perekaman Hunian</h3>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label>Foto Hunian<sup style="color:red">*</sup></label>
                <div id="fileHelp" class="form-text">Ukuran maksimal 5MB dengan format .jpg, .jpeg, atau .png</div>
                <input id="file-foto-hunian" name="file" type="file" class="file">
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label>Status Kepemilikan<sup style="color:red">*</sup></label>
                <select class="form-control select2" style="width: 100%" id="status-kepemilikan">
                    @foreach($statusKepemilikans as $statusKepemilikan)
                    <option value="{{ $statusKepemilikan->id }}">{{ $statusKepemilikan->nama }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label>Luas Tanah (m<sup>2</sup>)<sup style="color:red">*</sup></label>
                <input type="text" id="luas-tanah" class="form-control" />
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Luas Bangunan (m<sup>2</sup>)<sup style="color:red">*</sup></label>
                <input type="text" id="luas-bangunan" class="form-control" />
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label class="form-label">Bentuk bangunan<sup style="color:red">*</sup></label>
                <div class="selectgroup w-100">
                    @foreach($bentukBangunans as $bentukBangunan)
                        <label class="selectgroup-item">
                            <input type="radio" name="bentuk-bangunan" id="bentuk-bangunan" value="{{ $bentukBangunan->id }}" class="selectgroup-input-radio">
                            <span class="selectgroup-button selectgroup-button-icon"><img src="{{ asset('assets/img/icon/'.$bentukBangunan->ikon) }}" width="24" class="img-fluid" /> </span>
                            <span style="align-content: center">{{ $bentukBangunan->nama }}</span>
                        </label>
                    @endforeach
                </div>
            </div>

        </div>
       {{-- <div class="col-md-6">
            <div class="form-group">
                <label class="d-block">Layak Huni</label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="layak_huni" id="layak-huni-y" value="y">
                    <label class="form-check-label" for="layak-huni-y">Ya</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="layak_huni" id="layak-huni-t" value="t" checked>
                    <label class="form-check-label" for="layak-huni-t">Tidak</label>
                </div>
            </div>
        </div>--}}
        <div class="col-md-6">
            <div class="form-group">
                <label class="d-block">Tersedia Listrik</label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="tersedia_listrik" id="tersedia-listrik-y" value="y">
                    <label class="form-check-label" for="tersedia-listrik-y">Ya</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="tersedia_listrik" id="tersedia-listrik-t" value="t" checked>
                    <label class="form-check-label" for="tersedia-listrik-t">Tidak</label>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label class="d-block">Dibangun Oleh Pengembang</label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="dibangun_oleh_pengembang" id="dibangun-oleh-pengembang-y" value="y">
                    <label class="form-check-label" for="dibangun-oleh-pengembang-y">Ya</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="dibangun_oleh_pengembang" id="dibangun-oleh-pengembang-t" value="t" checked>
                    <label class="form-check-label" for="dibangun-oleh-pengembang-t">Tidak</label>
                </div>
            </div>
            <div class="form-group" id="nama-pengembang-container" style="display: none">
                <label>Nama Pengembang</label>
                <input type="text" id="nama-pengembang" class="form-control" />
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="d-block">Memiliki Izin Mendirikan Bangunan (IMB)</label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="memiliki_imb" id="memiliki-imb-y" value="y">
                    <label class="form-check-label" for="memiliki-imb-y">Ya</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="memiliki_imb" id="memiliki-imb-t" value="t" checked>
                    <label class="form-check-label" for="memiliki-imb-t">Tidak</label>
                </div>
            </div>
            <div class="form-group" id="nomor-imb-container" style="display: none">
                <label>Nomor IMB</label>
                <input type="text" id="nomor-imb" class="form-control" />
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group">
                <label>Foto Kondisi Atap</label>
                <div id="fileHelp" class="form-text">Ukuran maksimal 5MB dengan format .jpg, .jpeg, atau .png</div>
                <input id="file-foto-atap" name="file" type="file" class="file">
            </div>

            <div class="form-group">
                <label>Foto Kondisi Dinding</label>
                <div id="fileHelp" class="form-text">Ukuran maksimal 5MB dengan format .jpg, .jpeg, atau .png</div>
                <input id="file-foto-dinding" name="file" type="file" class="file">
            </div>

            <div class="form-group">
                <label>Foto Kondisi Lantai</label>
                <div id="fileHelp" class="form-text">Ukuran maksimal 5MB dengan format .jpg, .jpeg, atau .png</div>
                <input id="file-foto-lantai" name="file" type="file" class="file">
            </div>

            <div class="form-group">
                <label>Foto Kondisi Kamar Mandi</label>
                <div id="fileHelp" class="form-text">Ukuran maksimal 5MB dengan format .jpg, .jpeg, atau .png</div>
                <input id="file-foto-kamar-mandi" name="file" type="file" class="file">
            </div>

            <div class="form-group">
                <label>Foto Kondisi MCK<sup style="color:red">*</sup></label>
                <div id="fileHelp" class="form-text">Ukuran maksimal 5MB dengan format .jpg, .jpeg, atau .png</div>
                <input id="file-foto-mck" name="file" type="file" class="file">
            </div>

            <div class="form-group">
                <label class="d-block">Memiliki Septic Tank</label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="septic_tank" id="septic-tank-y" value="y">
                    <label class="form-check-label" for="septic-tank-y">Ya</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="septic_tank" id="septic-tank-t" value="t" checked>
                    <label class="form-check-label" for="septic-tank-t">Tidak</label>
                </div>
            </div>

            <div class="form-group">
                <label>Foto Kondisi Sumber Air Minum</label>
                <div id="fileHelp" class="form-text">Ukuran maksimal 5MB dengan format .jpg, .jpeg, atau .png</div>
                <input id="file-foto-sumber-air-minum" name="file" type="file" class="file">
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group">
                <label>Foto Pemilik berserta rumah<sup style="color:red">*</sup></label>
                <div id="fileHelp" class="form-text">Ukuran maksimal 5MB dengan format .jpg, .jpeg, atau .png</div>
                <input id="file-foto-pemilik" name="file" type="file" class="file">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Nama Pemilik<sup style="color:red">*</sup></label>
                <input type="text" id="nama-pemilik" class="form-control" />
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>No KTP<sup style="color:red">*</sup></label>
                <input type="text" id="nik-pemilik" class="form-control" />
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label>Tanggal Lahir<sup style="color:red">*</sup></label>
                <input type="date" id="tanggal-lahir" class="form-control" />
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>No Telepon</label>
                <input type="text" id="no-telepon-pemilik" class="form-control" />
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label>Email</label>
                <input type="email" id="email-pemilik" class="form-control" />
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Jumlah Keluarga<sup style="color:red">*</sup></label>
                <input type="text" id="jumlah-keluarga" class="form-control" />
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label>No Kartu Keluarga<sup style="color:red">*</sup></label>
                <input type="text" id="no-kk-pemilik" class="form-control" />
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Pendapatan Keluarga<sup style="color:red">*</sup></label>
                <select class="form-control select2" style="width: 100%"  id="pendapatan-keluarga">
                    @foreach($pendapatanKeluargas as $pendapatanKeluarga)
                        <option value="{{ $pendapatanKeluarga->id }}">{{ $pendapatanKeluarga->nama }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <!-- <div class="col-md-6">
            <div class="form-group">
                <label>Luas Bangunan Per Kapita</label>
                <input type="text" id="luas-bangunan-perkapita" readonly class="form-control" />
            </div>
        </div> -->

    </div>
    <h3>Perekaman Bantuan</h3>
    <div class="row">
    <div class="col-md-12">
            <div class="form-group">
                <label>Pengusul<sup style="color:red">*</sup></label>
                <select class="form-control select2" style="width: 100%" id="sumber-dana-bantuan">
                    @foreach($sumberdana as $dana)
                        <option value="{{ $dana->id }}">{{ $dana->nama }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    <div class="col-md-12">
            <div class="form-group">
                <label>Foto Hunian sesudah perbaikan<sup style="color:red">*</sup></label>
                <div id="fileHelp" class="form-text">Ukuran maksimal 5MB dengan format .jpg, .jpeg, atau .png</div>
                <input id="file-foto-hunian-final" name="file" type="file" class="file">
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group">
                <label>Foto MCK sesudah pebaikan<sup style="color:red">*</sup></label>
                <div id="fileHelp" class="form-text">Ukuran maksimal 5MB dengan format .jpg, .jpeg, atau .png</div>
                <input id="file-foto-mck-final" name="file" type="file" class="file">
            </div>
        </div>
    <div class="col-md-6">
                <div class="form-group">
                    <label>Rencana Tahun Penanganan</label>
                    <select class="form-control select2" style="width: 100%" name="rencana_tahun_penanganan" id="rencana-tahun-penanganan">
                        @for($i = 2020; $i <= date('Y') + 5; $i++)
                            <option value="{{ $i }}">{{ $i }}</option>
                        @endfor
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Nominal</label>
                    <input type="text" name="nominal" class="form-control" id="nominal">
                </div>
            </div>
    </div>
    <h3>Isi Data Lokasi</h3>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Kecamatan</label>
                <select class="form-control select2" style="width: 100%" id="kecamatan">
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
                <select class="form-control select2" style="width: 100%" id="desa">
                </select>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label>Alamat Detail</label>
                <textarea class="form-control" id="alamat-detail"></textarea>
            </div>
        </div>

    </div>
</div>
