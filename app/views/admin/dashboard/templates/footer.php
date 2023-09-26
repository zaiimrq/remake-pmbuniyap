    <script src="<?= BASEURL ?>/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script>
      $(document).ready( function () {
          $('#tabelsm').DataTable();
      } );
      function generateNoPendaftaran() {
          var currentDate = new Date();
          var year = currentDate.getFullYear().toString();
          var randomDigits = Math.floor(Math.random() * 1000).toString().padStart(3, '0');

          var noPendaftaran = year + randomDigits;
          return noPendaftaran;
      }

      // Setel nilai nomor pendaftaran saat halaman dimuat
      window.onload = function() {
          var noPendaftaranInput = document.getElementById('no_pendaftar');
          noPendaftaranInput.value = generateNoPendaftaran();
      };
    </script>

    <script>
        $(function () {
          $('#tambahDataBtn').click(function () {
            $('#modalLabel').html('Tambah Data Mahasiswa')
            $('.modal-footer button[type="submit"]').html('Submit')
            $('.modal-body form').attr('action', 'http://pmbuniyap.test/public/admin/tambah');
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
            $('.modal-body form').attr('action', 'http://pmbuniyap.test/public/admin/ubah');


            const nisn = $(this).data('nisn')
            $.ajax({
              url: 'http://pmbuniyap.test/public/admin/getUbah/',
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
  </body>
</html>