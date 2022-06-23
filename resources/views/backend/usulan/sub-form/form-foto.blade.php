<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label>Jenis Foto</label>
            <select class="form-control select2" style="width: 100%"  id="jenis-foto-usulan">
                @foreach($jenisFotoUsulans as $jenisFotoUsulan)
                    <option value="{{ $jenisFotoUsulan->id }}">{{ $jenisFotoUsulan->keterangan }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label>Keterangan</label>
            <textarea class="form-control" id="keterangan-foto-usulan"></textarea>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <label>Foto</label>
            <div id="fileHelp" class="form-text">Ukuran maksimal 5MB dengan format .jpg, .jpeg, atau .png</div>
            <input id="file-foto-usulan" name="file" type="file" class="file">
        </div>
    </div>

    <div class="col-md-12 table-responsive">
        <table class="table table-striped" id="table-foto">
            <thead>
            <tr>
                <th class="text-center">
                    #
                </th>
                <th>Foto</th>
                <th>Jenis</th>
                <th>Keterangan</th>
                <th></th>
            </tr>
            </thead>
        </table>
    </div>
</div>
