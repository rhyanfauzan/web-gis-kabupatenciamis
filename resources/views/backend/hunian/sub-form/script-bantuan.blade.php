<script>
    const tableData = $('#table-data').DataTable()
    const sumberDanaBantuanSelect = $('#sumber-dana-bantuan').select2({
        tags: false
    })
    const tahunSelect = $('#tahun').select2({
        tags: false
    })

    let bantuans = [];

    function addRow(index, sumber_dana_bantuan_id, sumber_dana_bantuan_nama, tahun)
    {
        const item = [index + 1, sumber_dana_bantuan_nama, tahun, `<a href='#' class='btn btn-danger' onclick="del(${index})">Hapus</a>`]
        console.log(item)
        tableData.rows.add([item]).draw()
    }

    function del(index)
    {
        bantuans.splice(index, 1)
        refreshTable()
    }

    $('#btn-tambah-bantuan').on('click', function (e) {
        e.preventDefault()
        const data = $('#sumber-dana-bantuan').find(':selected').data()
        addRow(
            bantuans.length,
            data.data.id,
            data.data.text,
            tahunSelect.val())

        bantuans.push({
            sumber_dana_bantuan_id: data.data.id,
            sumber_dana_bantuan_nama: data.data.text,
            tahun: tahunSelect.val()
        })
    })

    function refreshTable()
    {
        tableData.clear().draw()
        let i
        for (i = 0; i < bantuans.length; i++)
        {
            const bantuan = bantuans[i]
            addRow(i, bantuan.sumber_dana_bantuan_id, bantuan.sumber_dana_bantuan_nama, bantuan.tahun)
        }
    }
</script>
