<div class="row">
    <div class="col-12 mb-2">
        <p>Foto {{ $label }}</p>
        <div class="gallery gallery-md" data-item-height="100">
            @foreach($item->fotoPrasaranaSaranaUmums as $foto)
                @if (in_array($foto->jenis, $jenisFotos))
                <div class="gallery-item" data-image="{{ asset(str_replace('public/', 'storage/', $foto->foto)) }}" data-title="{{ $foto->jenis }}"></div>
                @endif
            @endforeach
        </div>
    </div>

</div>
