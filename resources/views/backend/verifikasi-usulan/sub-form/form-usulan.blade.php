<div id="example-basic">
    <h3>Cek Nomor KK</h3>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group row">
                <label class="col-sm-3 form-label">Cek No Kartu Keluarga</label>
                <div class="col-sm-9">
                    <input type="text" id="no-kk-pemilik" class="form-control mb-3" />
                    <span id="no-kk-pemilik-feedback"></span>
                </div>

            </div>
        </div>

        <div class="col-md-6">
            <button class="btn btn-primary" id="btn-cek-keluarga">Cek</button>
        </div>
    </div>
    <h3>Isi Data Keluarga</h3>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Nama Pemilik</label>
                <input type="text" id="nama-pemilik" class="form-control" readonly/>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label>No KTP</label>
                <input type="text" id="nik-pemilik" class="form-control" readonly/>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label>Tanggal Lahir</label>
                <input type="date" id="tanggal-lahir" class="form-control" readonly/>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>No Telepon</label>
                <input type="text" id="no-telepon-pemilik" class="form-control" readonly/>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label>Email</label>
                <input type="email" id="email-pemilik" class="form-control" readonly/>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Jumlah Keluarga</label>
                <input type="text" id="jumlah-keluarga" class="form-control" readonly/>
            </div>
        </div>


        <div class="col-md-6">
            <div class="form-group">
                <label>Pendapatan Keluarga</label>
                <select class="form-control select2" style="width: 100%" id="pendapatan-keluarga">
                    <option value="1">0-1 juta</option>
                    <option value="2">1-2,5 juta</option>
                    <option value="3">&gt;2,5 juta</option>
                </select>
            </div>
        </div>
    </div>
    <h3>Unggah Foto Dokumen</h3>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label>Foto Pemilik</label>
                <div class="row cold-md-6 ml-4">
                    <img src="" class="img-thumbnail" width="300" id="foto-pemilik">
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group">
                <label>Foto KTP</label>
                <div id="fileHelp" class="form-text">Ukuran maksimal 5MB dengan format .jpg, .jpeg, atau .png</div>
                <input id="file-foto-ktp" name="file" type="file" class="file">
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label>Foto KK</label>
                <div id="fileHelp" class="form-text">Ukuran maksimal 5MB dengan format .jpg, .jpeg, atau .png</div>
                <input id="file-foto-kk" name="file" type="file" class="file">
            </div>
        </div>
    </div>
    <h3>Isi Data Hunian</h3>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Diusulkan Kepada</label>
                <select class="form-control select2" style="width: 100%" id="sumber-dana-bantuan">
                    @foreach ($sumberdana as $row)
                        <option value="{{$row->id}}">{{$row->nama}}</option>
                @endforeach
                </select>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label>Status Kepemilikan</label>
                <select class="form-control select2" style="width: 100%" id="status-kepemilikan">
                    @foreach ($statusKepemilikans as $row)
                        <option value="{{$row->id}}">{{$row->nama}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label>Luas Tanah (m<sup>2</sup>)</label>
                <input type="text" id="luas-tanah" class="form-control" readonly/>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Luas Bangunan (m<sup>2</sup>)</label>
                <input type="text" id="luas-bangunan" class="form-control" readonly/>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label>Luas Bangunan Per Kapita</label>
                <input type="text" id="luas-bangunan-perkapita" readonly class="form-control" />
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Rencana Penanganan</label>
                <input type="date" id="rencana-penanganan" class="form-control" />
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label class="d-block">Tersedia Listrik</label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="tersedia_listrik" id="tersedia-listrik-y"
                        value="y">
                    <label class="form-check-label" for="tersedia-listrik-y">Ya</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="tersedia_listrik" id="tersedia-listrik-t"
                        value="t" checked>
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
                    <input class="form-check-input" type="radio" name="memiliki_imb" id="memiliki-imb-t" value="t"
                        checked>
                    <label class="form-check-label" for="memiliki-imb-t">Tidak</label>
                </div>
            </div>
            <div class="form-group" id="nomor-imb-container" style="display: none">
                <label>Nomor IMB</label>
                <input type="text" id="nomor-imb" class="form-control" />
            </div>
        </div>
    </div>
    <h3>Foto Unggahan</h3>
    <div class="col-md-12">
        <div class="form-group">
            <div class="table-responsive">
                <table class="table table-striped" id="table-data" style="width:100%">
                    <thead>
                        <tr class="text-center">
                            <th>#</th>
                            <th>Foto</th>
                            <th>Jenis</th>
                        </tr>
                        <div>
                            <tr class="text-center mb-2 gallery-item">
                                <td>
                                    1
                                </td>
                                <td>
                                    <img src="" class="img-thumbnail" width="150" id="foto-atap">
                                </td>
                                <td>Foto Atap</td>
                            </tr>
                            <tr class="text-center mb-2 gallery-item">
                                <td>
                                    2
                                </td>
                                <td>
                                    <img src="" class="img-thumbnail" width="150" id="foto-dinding">
                                </td>
                                <td>Foto Dinding</td>
                            </tr>
                            <tr class="text-center mb-2 gallery-item">
                                <td>
                                    3
                                </td>
                                <td>
                                    <img src="" class="img-thumbnail" width="150" id="foto-lantai">
                                </td>
                                <td>Foto Lantai</td>
                            </tr>
                            <tr class="text-center mb-2 gallery-item">
                                <td>
                                    4
                                </td>
                                <td>
                                    <img src="" class="img-thumbnail" width="150" id="foto-kamar-mandi">
                                </td>
                                <td>Foto Kamar Mandi</td>
                            </tr>
                            <tr class="text-center mb-2 gallery-item">
                                <td>
                                    5
                                </td>
                                <td>
                                    <img src="" class="img-thumbnail" width="150" id="foto-mck">
                                </td>
                                <td>Foto MCK</td>
                            </tr>
                            <tr class="text-center mb-2 gallery-item">
                                <td>
                                    6
                                </td>
                                <td>
                                    <img src="" class="img-thumbnail" width="150" id="foto-sumber-airminum">
                                </td>
                                <td>Foto Sumber Air Minum</td>
                            </tr>
                        </div>
                    </thead>
                </table>
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
                <textarea class="form-control" id="alamat-detail" readonly></textarea>
            </div>
        </div>
    </div>
</div>
