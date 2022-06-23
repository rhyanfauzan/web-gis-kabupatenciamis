<script>
    let fotoHunian = ''
    $("#file-foto-hunian").fileinput(getFileInputOptions('foto-hunian'))
        .on('fileuploaded', function(event, previewId, index, fileId) {
            fotoHunian = previewId.response.filename
        }).on('fileuploaderror', function(event, data, msg) {
            console.log(msg)
        }).on('fileerror', function(event, data, msg) {
            console.log(msg)
        }).on('fileselect', function(event, numFiles, label) {
            $("#file-foto-hunian").fileinput('upload')
        })

    let fotoAtap = ''
    $("#file-foto-atap").fileinput(getFileInputOptions('foto-atap'))
        .on('fileuploaded', function(event, previewId, index, fileId) {
            fotoAtap = previewId.response.filename
        }).on('fileuploaderror', function(event, data, msg) {
        console.log(msg)
    }).on('fileerror', function(event, data, msg) {
        console.log(msg)
    }).on('fileselect', function(event, numFiles, label) {
        $("#file-foto-atap").fileinput('upload')
    })

    let fotoDinding = ''
    $("#file-foto-dinding").fileinput(getFileInputOptions('foto-dinding'))
        .on('fileuploaded', function(event, previewId, index, fileId) {
            fotoDinding = previewId.response.filename
        }).on('fileuploaderror', function(event, data, msg) {
        console.log(msg)
    }).on('fileerror', function(event, data, msg) {
        console.log(msg)
    }).on('fileselect', function(event, numFiles, label) {
        $("#file-foto-dinding").fileinput('upload')
    })

    let fotoLantai = ''
    $("#file-foto-lantai").fileinput(getFileInputOptions('foto-lantai'))
        .on('fileuploaded', function(event, previewId, index, fileId) {
            fotoLantai = previewId.response.filename
        }).on('fileuploaderror', function(event, data, msg) {
        console.log(msg)
    }).on('fileerror', function(event, data, msg) {
        console.log(msg)
    }).on('fileselect', function(event, numFiles, label) {
        $("#file-foto-lantai").fileinput('upload')
    })

    let fotoKamarMandi = ''
    $("#file-foto-kamar-mandi").fileinput(getFileInputOptions('foto-kamar-mandi'))
        .on('fileuploaded', function(event, previewId, index, fileId) {
            fotoKamarMandi = previewId.response.filename
        }).on('fileuploaderror', function(event, data, msg) {
        console.log(msg)
    }).on('fileerror', function(event, data, msg) {
        console.log(msg)
    }).on('fileselect', function(event, numFiles, label) {
        $("#file-foto-kamar-mandi").fileinput('upload')
    })

    let fotoMck = ''
    $("#file-foto-mck").fileinput(getFileInputOptions('foto-mck'))
        .on('fileuploaded', function(event, previewId, index, fileId) {
            fotoMck = previewId.response.filename
        }).on('fileuploaderror', function(event, data, msg) {
        console.log(msg)
    }).on('fileerror', function(event, data, msg) {
        console.log(msg)
    }).on('fileselect', function(event, numFiles, label) {
        $("#file-foto-mck").fileinput('upload')
    })

    let fotoSumberAirMinum = ''
    $("#file-foto-sumber-air-minum").fileinput(getFileInputOptions('foto-sumber-air-minum'))
        .on('fileuploaded', function(event, previewId, index, fileId) {
            fotoSumberAirMinum = previewId.response.filename
        }).on('fileuploaderror', function(event, data, msg) {
        console.log(msg)
    }).on('fileerror', function(event, data, msg) {
        console.log(msg)
    }).on('fileselect', function(event, numFiles, label) {
        $("#file-foto-sumber-air-minum").fileinput('upload')
    })

    $('#status-kepemilikan').select2({
        tags: false
    })
    
    $('#bentuk-bangunan').select2({
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
