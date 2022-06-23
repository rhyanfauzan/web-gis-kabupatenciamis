<form action="{{ $action }}" method="post">
    {{ csrf_field() }}
    <div class="form-group">
        <label>Nama</label>
        <input type="text" name="name" class="form-control" @isset($item) value="{{ $item->name }}" @endisset>
    </div>
    <div class="form-group">
        <label>Email</label>
        <input type="email" name="email" class="form-control" @isset($item) value="{{ $item->email }}" @endisset>
    </div>
    <div class="form-group">
        <label>Role</label>
        <select class="form-control" name="role">
            <option>Pilih Role</option>
            <option value="admin" @isset($item) @if ($item->role == 'admin') selected @endif @endisset >Administrator</option>
            <option value="dinas" @isset($item) @if ($item->role == 'dinas') selected @endif @endisset >Dinas (SPRKPLH)</option>
            <option value="pihak-ketiga" @isset($item) @if ($item->role == 'pihak-ketiga') selected @endif @endisset >Pihak Ke-3</option>
        </select>
    </div>
    <div class="form-group">
        <label>Password</label>
        <input type="password" name="password" class="form-control">
    </div>
    <div class="form-group">
        <button class="btn btn-primary mr-1" type="submit">Submit</button>&nbsp;
        <button class="btn btn-secondary" type="reset">Reset</button>
    </div>

</form>
