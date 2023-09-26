<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
    $(function () {

        $('#tambahDataBtn').click(function () {
            $('#modalLabel').html('Tambah Program Studi')
            $('.modal-footer button[type="submit"]').html('Submit')
            $('.modal-body form').attr('action', '<?= BASEURL ?>/admin/addProdi')
            $('#kode').val('')
            $('#prodi').val('')
            $('#fakultas').val('')
            $('#akreditasi').val('')
        })

        $('.editdata').click(function () {
            $('#modalLabel').html('Edit Program Studi')
            $('.modal-footer button[type="submit"]').html('Update')
            $('.modal-body form').attr('action', '<?= BASEURL ?>/admin/editProdi')

            const kode = $(this).data("kode")

            $.ajax({
                url: "<?= BASEURL ?>/admin/getEditProdi",
                method: "post",
                data: {kode : kode},
                dataType: "json",
                success:function (data) {
                    $('#kode').val(data.kode_prodi)
                    $('#prodi').val(data.prodi)
                    $('#fakultas').val(data.fakultas)
                    $('#akreditasi').val(data.akreditasi)
                }
            })
        })
    })
</script>