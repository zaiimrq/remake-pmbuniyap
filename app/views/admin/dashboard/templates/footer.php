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
          var noPendaftaranInput = document.getElementById('noPendaftaran');
          noPendaftaranInput.value = generateNoPendaftaran();
          showForm('loginForm');

      };
    </script>
  </body>
</html>