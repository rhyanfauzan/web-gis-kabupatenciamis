<form enctype="multipart/form-data" id="form-hunian">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Pengusul<sup style="color:red">*</sup></label>
                <select class="form-control select2" style="width: 100%" id="sumber-dana-bantuan">
                    @foreach($sumberDanaBantuans as $sumberDanaBantuan)
                        <option value="{{ $sumberDanaBantuan->id }}">{{ $sumberDanaBantuan->nama }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label>Status Kepemilikan</label>
                <select class="form-control select2" style="width: 100%" id="status-kepemilikan">
                    @foreach($statusKepemilikans as $statusKepemilikan)
                        <option value="{{ $statusKepemilikan->id }}">{{ $statusKepemilikan->nama }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label>Luas Tanah (m<sup>2</sup>)</label>
                <input type="text" id="luas-tanah" class="form-control" />
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Luas Bangunan (m<sup>2</sup>)</label>
                <input type="text" id="luas-bangunan" class="form-control" />
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label>Luas Bangunan Per Kapita</label>
                <input type="text" id="luas-bangunan-perkapita" readonly class="form-control" />
            </div>
        </div>
        <div class="col-md-6">
        </div>

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
    </div>

</form>
