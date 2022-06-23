<script>
    const noKkPemilikInput = $('#no-kk-pemilik')
    const noKkPemilikFeedback = $('#no-kk-pemilik-feedback')
    $('#btn-cek-keluarga').on('click', function (event){
        event.preventDefault()
        $.get('{{ route('backend.hunian.cek') }}', {
            noKk: noKkPemilikInput.val()
        }).done((response) => {
            if (response.count === 0)
            {
                valid = true
                noKkPemilikInput.attr('class', 'form-control is-valid')
                noKkPemilikFeedback.attr('class', 'valid-feedback')
                noKkPemilikFeedback.html('No KK belum pernah menerima bantuan 5 tahun terakhir')
            } else
            {
                noKkPemilikInput.attr('class', 'form-control is-invalid')
                noKkPemilikFeedback.attr('class', 'invalid-feedback')
                noKkPemilikFeedback.html('No KK pernah menerima bantuan 5 tahun terakhir')
            }
        })
    })

    noKkPemilikInput.on('keyup', function () {
        valid = false
        noKkPemilikInput.attr('class', 'form-control')
        noKkPemilikFeedback.html('')
    })
</script>
