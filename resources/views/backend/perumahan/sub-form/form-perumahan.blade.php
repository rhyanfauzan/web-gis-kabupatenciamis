<form enctype="multipart/form-data" id="form-perumahan">
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label>Nama Perumahan</label>
                <input type="text" id="nama_perum" name="nama_perum" class="form-control" value="{{isset($item->nama_perum) ? $item->nama_perum : ""}}"/>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label>No IMB</label>
                <input type="text" id="no_imb" name="no_imb" class="form-control" value="{{isset($item->no_imb) ? $item->no_imb : ""}}"/>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Tanggal IMB</label>
                <input type="date" id="tgl_imb" name="tgl_imb" class="form-control" value="{{isset($item->tgl_imb) ? $item->tgl_imb : ""}}"/>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Tahun</label>
                <input type="text" id="tahun" name="tahun" class="form-control" value="{{isset($item->tahun) ? $item->tahun : ""}}"/>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Pengembang</label>
                <input type="text" id="pengembang" name="pengembang" class="form-control" value="{{isset($item->pengembang) ? $item->pengembang : ""}}"/>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Perusahaan</label>
                <input type="text" id="perusahaan" name="perusahaan" class="form-control" value="{{isset($item->perusahaan) ? $item->perusahaan : ""}}"/>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label>Alamat Perusahaan</label>
                <input type="text" id="almt_perusahaan" name="almt_perusahaan" class="form-control" value="{{isset($item->almt_perusahaan) ? $item->almt_perusahaan : ""}}"/>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Jumlah Rumah Komersil</label>
                <input type="text" id="jml_rumah_komersil" name="jml_rumah_komersil" class="form-control" value="{{isset($item->jml_rumah_komersil) ? $item->jml_rumah_komersil : ""}}"/>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Jumlah Rumah MBR</label>
                <input type="text" id="jml_rumah_mbr" name="jml_rumah_mbr" class="form-control" value="{{isset($item->jml_rumah_mbr) ? $item->jml_rumah_mbr : ""}}"/>
            </div>
        </div>
    </div>

</form>
