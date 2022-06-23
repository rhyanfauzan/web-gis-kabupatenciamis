<script>
    $('#nama').val('{{ $item->nama }}')
    $('#keterangan').val('{{ $item->keterangan }}')
    $('#kecamatan').val('{{ $item->kecamatan_id }}').trigger('change')
    window.addPoint({{ $item->lokasi->getLat() }}, {{ $item->lokasi->getLng() }})
</script>