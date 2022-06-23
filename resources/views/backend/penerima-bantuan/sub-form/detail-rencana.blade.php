<div class="row">
    <div class="col-12 mb-2">
        <form action="{{ route('backend.penerimaBantuan.update', ['id' => $item->id]) }}" method="post">
            {{ csrf_field() }}
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
            <div class="col-md-12">
                <!-- <a href="{{ route('backend.penerimaBantuan.index') }}" class="btn btn-primary">Kembali</a>&nbsp; -->
                <button type="submit" class="btn btn-primary" id="btn-simpan-edit">Simpan</button>
            </div>
        </form>
    </div>
</div>
