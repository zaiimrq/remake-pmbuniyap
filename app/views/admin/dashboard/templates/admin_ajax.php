
<script>
        $(function () {
          $('#tambahDataBtn').click(function () {
            $('#modalLabel').html('Tambah Data Mahasiswa')
            $('.modal-footer button[type="submit"]').html('Submit')
            $('.modal-body form').attr('action', '<?= BASEURL ?>/admin/tambah');
            $('#no_pendaftar').val(generateNoPendaftaran())
            $('#nisn').val('')
            $('#nama').val('')
            $('#email').val('')
            $('#tlp').val('')
            $('#thn_lulus').val('')
            $('#jalur_masuk').val('')
            $('#kode_prodi').val('')
            $('#asal').val('')
            $('.pass').append(`<label for="password">Password</label>
            <input type="text" class="form-control" name="password" id="password" required>`)
          })

          $('.edit').click(function (){
            $('#modalLabel').html('Edit Data Mahasiswa')
            $('.modal-footer button[type="submit"]').html('Update')
            $('.modal-body form').attr('action', '<?= BASEURL ?>/admin/ubah');


            const nisn = $(this).data('nisn')
            $.ajax({
              url: '<?= BASEURL ?>/admin/getUbah/',
              data: {nisn : nisn},
              method: 'post',
              dataType: 'json',
              success: function (data) {
                $('.form-group label[for="password"]').remove()
                $('.form-group #password').remove()
                $('#no_pendaftar').val(data.no_pendaftar)
                $('#nisn').val(data.nisn)
                $('#nama').val(data.nama)
                $('#email').val(data.email)
                $('#tlp').val(data.no_hp)
                $('#thn_lulus').val(data.thn_lulus)
                $('#jalur_masuk').val(data.jalur_masuk)
                $('#kode_prodi').val(data.kode_prodi)
                $('#asal').val(data.asal_sekolah)
                
              }
            })
          })
        })
</script>