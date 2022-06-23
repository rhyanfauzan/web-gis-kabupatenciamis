<script>
    let fotoAtap = ''
    $("#file-foto-atap").fileinput(getFileInputOptions('foto-kawasan-bencana'))
        .on('fileuploaded', function(event, previewId, index, fileId) {
            fotoAtap = previewId.response.filename
        }).on('fileuploaderror', function(event, data, msg) {
        console.log(msg)
    }).on('fileerror', function(event, data, msg) {
        console.log(msg)
    }).on('fileselect', function(event, numFiles, label) {
        $("#file-foto-atap").fileinput('upload')
    })

    $('#status-kepemilikan').select2({
        tags: false
    })

    /*$('#layak-huni-y').on('click', function (){
        toggleLayakHuni()
    })

    $('#layak-huni-t').on('click', function (){
        toggleLayakHuni()
    })

    function toggleLayakHuni()
    {
        if ($('#layak-huni-y').is(':checked') === 0)
        {
            $('#kondisi-rumah-container').attr('style', 'display: none')
        } else {
            $('#kondisi-rumah-container').attr('style', 'display: block')
        }
    }*/

    $('#dibangun-oleh-pengembang-y').on('click', function (){
        toggleNamaPengembang()
    })

    $('#dibangun-oleh-pengembang-t').on('click', function (){
        toggleNamaPengembang()
    })

    function toggleNamaPengembang()
    {
        if ($('#dibangun-oleh-pengembang-y').is(':checked') === 0)
        {
            $('#nama-pengembang-container').attr('style', 'display: none')
        } else {
            $('#nama-pengembang-container').attr('style', 'display: block')
        }
    }

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
</script>
