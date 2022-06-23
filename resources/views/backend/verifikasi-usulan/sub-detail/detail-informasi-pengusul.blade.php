<div class="row">
    <div class="col-12 mt-2">
        <dl class="row">
            <dt class="col-sm-6">Diusulkan Oleh</dt>
            <dd class="col-sm-6">{{$item->pengusul->name}}</dd>

            <dt class="col-sm-6">Role Pengusul</dt>
            <dd class="col-sm-6">{{$item->pengusul->role}}</dd>

            <dt class="col-sm-6">Disulkan Pada</dt>
            <dd class="col-sm-6">{{indonesian_date($item->created_at)}}</dd>

            <dt class="col-sm-6">Status</dt>
            @if ($item->status == 0)
                <dd class="col-sm-6"><div class="badge badge-warning">Pending</div></dd>
            @elseif ($item->status == 1)
                <dd class="col-sm-6"><div class="badge badge-success">Diterima</div></dd>
            @elseif ($item->status == 3)
                <dd class="col-sm-6"><div class="badge badge-success">Telah diproses</div></dd>
            @else
                <dd class="col-sm-6"><div class="badge badge-danger">Ditolak</div></dd>
            @endif
        </dl>
    </div>
</div>
