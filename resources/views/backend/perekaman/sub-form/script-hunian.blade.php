<script>
    $('#status-kepemilikan').select2({
        tags: false
    })

    $('#memiliki-imb-y').on('click', function (){
        toggleNomorImb()
    })

    $('#memiliki-imb-t').on('click', function (){
        toggleNomorImb()
    })

    function toggleNomorImb()
    {
        if ($('#memiliki-imb-y').is(':checked') === 0)
        {
            $('#nomor-imb-container').attr('style', 'display: none')
        } else {
            $('#nomor-imb-container').attr('style', 'display: block')
        }
    }

    $('#luas-bangunan').on('keyup', function () {
        const luasBangunan = parseFloat($('#luas-bangunan').val())
        const jumlahKeluarga = parseFloat($('#jumlah-keluarga').val())
        const luasBangunanPerkapita = luasBangunan / jumlahKeluarga
        $('#luas-bangunan-perkapita').val(luasBangunanPerkapita)
    })
</script>
