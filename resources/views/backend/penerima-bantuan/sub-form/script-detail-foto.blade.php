<script>
    let fotoHunian = ''
    $("#file-foto-hunian").fileinput(getFileInputOptions('foto-hunian'))
        .on('fileuploaded', function(event, previewId, index, fileId) {
            fotoHunian = previewId.response.filename
            console.log(fotoHunian);
        }).on('fileuploaderror', function(event, data, msg) {
            console.log(msg)
        }).on('fileerror', function(event, data, msg) {
            console.log(msg)
        }).on('fileselect', function(event, numFiles, label) {
            $("#file-foto-hunian").fileinput('upload')
        })

    let fotoMck = ''
    $("#file-foto-mck").fileinput(getFileInputOptions('foto-mck'))
        .on('fileuploaded', function(event, previewId, index, fileId) {
            fotoMck = previewId.response.filename
            console.log(fotoMck);
        }).on('fileuploaderror', function(event, data, msg) {
        console.log(msg)
    }).on('fileerror', function(event, data, msg) {
        console.log(msg)
    }).on('fileselect', function(event, numFiles, label) {
        $("#file-foto-mck").fileinput('upload')
    })

</script>
