<script>
    let fotoPemilik = ''
    $("#file-foto-pemilik").fileinput(getFileInputOptions('foto-pemilik'))
        .on('fileuploaded', function(event, previewId, index, fileId) {
            fotoPemilik = previewId.response.filename
        }).on('fileuploaderror', function(event, data, msg) {
            console.log(msg)
        }).on('fileerror', function(event, data, msg) {
            console.log(msg)
        })

    let fotoKtp = ''
    $("#file-foto-ktp").fileinput(getFileInputOptions('foto-ktp'))
        .on('fileuploaded', function(event, previewId, index, fileId) {
            fotoPemilik = previewId.response.filename
        }).on('fileuploaderror', function(event, data, msg) {
            console.log(msg)
        }).on('fileerror', function(event, data, msg) {
            console.log(msg)
        })

    let fotoKk = ''
    $("#file-foto-kk").fileinput(getFileInputOptions('foto-kk'))
        .on('fileuploaded', function(event, previewId, index, fileId) {
            fotoKk = previewId.response.filename
        }).on('fileuploaderror', function(event, data, msg) {
            console.log(msg)
        }).on('fileerror', function(event, data, msg) {
            console.log(msg)
        })
</script>
