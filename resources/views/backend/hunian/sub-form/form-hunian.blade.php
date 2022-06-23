<form enctype="multipart/form-data" id="form-hunian">
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
                    @if (isset($data->status_kepemilikan_id) && $statusKepemilikan->id == $data->status_kepemilikan_id)
                    <option value="{{ $statusKepemilikan->id }}" selected>{{ $statusKepemilikan->nama }}</option>
                    @else
                    <option value="{{ $statusKepemilikan->id }}">{{ $statusKepemilikan->nama }}</option>
                    @endif
                    
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label>Luas Tanah (m<sup>2</sup>)<sup style="color:red">*</sup></label>
                <input type="text" id="luas-tanah" class="form-control" value="{{isset($item->luas_tanah) ? $item->luas_tanah : ""}}"/>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Luas Bangunan (m<sup>2</sup>)<sup style="color:red">*</sup></label>
                <input type="text" id="luas-bangunan" class="form-control" value="{{isset($item->luas_bangunan) ? $item->luas_bangunan : ""}}"/>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label class="form-label">Bentuk bangunan<sup style="color:red">*</sup></label>
                <select class="form-control select2" style="width: 100%" id="bentuk-bangunan">
                    @foreach($bentukBangunans as $bentukBangunan)
                    @if (isset($data->bentuk_bangunan_id) && $bentukBangunan->id == $data->bentuk_bangunan_id)
                    <option value="{{ $bentukBangunan->id }}" selected>{{ $bentukBangunan->nama }}</option>
                    @else
                    <option value="{{ $bentukBangunan->id }}">{{ $bentukBangunan->nama }}</option>
                    @endif
                    @endforeach
                </select>
                <!-- <div class="selectgroup w-100">
                    @foreach($bentukBangunans as $bentukBangunan)
                        <label class="selectgroup-item">
                            <input type="radio" name="bentuk-bangunan" id="bentuk-bangunan" value="{{ $bentukBangunan->id }}" class="selectgroup-input-radio">
                            <span class="selectgroup-button selectgroup-button-icon"><img src="{{ asset('assets/img/icon/'.$bentukBangunan->ikon) }}" width="24" class="img-fluid" /> </span>
                            <span style="align-content: center">{{ $bentukBangunan->nama }}</span>
                        </label>
                    @endforeach
                </div> -->
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
    </div>

</form>
