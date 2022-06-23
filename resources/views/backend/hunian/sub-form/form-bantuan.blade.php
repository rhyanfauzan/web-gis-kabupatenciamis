<form id="form-bantuan" style="display: none">
    <div class="row">
        <div class="col-md-12 mb-2">
            Pernah mendapatkan bantuan dari
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Sumber Dana</label>
                <select class="form-control select2" style="width: 100%"  id="sumber-dana-bantuan">
                    @foreach($sumberDanaBantuans as $sumberDanaBantuan)
                        <option value="{{ $sumberDanaBantuan->id }}">{{ $sumberDanaBantuan->nama }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Tahun</label>
                <select class="form-control select2" style="width: 100%"  id="tahun">
                    @for($tahun = 1970; $tahun <= date('Y'); $tahun++)
                        <option value="{{ $tahun }}" @if($tahun == date('Y')) selected @endif>{{ $tahun }}</option>
                    @endfor
                </select>
            </div>
        </div>

        <div class="col-md-12 mb-2">
            <button class="btn btn-primary" id="btn-tambah-bantuan">Tambah</button>
        </div>

        <div class="col-md-12 table-responsive">
            <table class="table table-striped" id="table-data">
                <thead>
                <tr>
                    <th class="text-center">
                        #
                    </th>
                    <th>Sumber Dana</th>
                    <th>Tahun</th>
                    <th></th>
                </tr>
                </thead>
            </table>
        </div>
    </div>

</form>
