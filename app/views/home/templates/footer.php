<div class="footerbox col-md-12 text-white" style="background-color: #004d40;">
    <footer class="footer">
        <div class="ftr">
          <div class="row">
            <div class="col-lg-6">
              <div id="map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3985.9289176276047!2d140.71457037424182!3d-2.5301007382490392!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x686c582dc46936e3%3A0xae68a981d3dd7cbc!2sUniversitas%20YAPIS%20Papua%20(UNIYAP)%20Jayapura!5e0!3m2!1sid!2sid!4v1685886013348!5m2!1sid!2sid"  width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="contact-info">
                <h3><strong>Kontak Kami</strong></h3><hr>
                <p>UNIT ADMISI</p>
                <p>Jl. Sam Ratulangi No.1 Jayapura 55281 Dok V Auditorium, Lantai 1</p>
                <p>Telp: +62-274 548811 (Jam Kerja 07.30 - 16.00 WIB)</p>
                <p>WA: 085158116006</p>
                <p>Mail: pmb@uniyap.ac.id</p>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12">
              <div class="text-center text-white">
                <span>&copy;2023 PMB UNIYAP. All rights reserved.</span>
              </div>
            </div>
          </div>
        </div>
    </footer>
</div>
  
  
  
  
  <!-- Typed Js -->
  <script src="https://unpkg.com/typed.js@2.0.16/dist/typed.umd.js"></script>
  <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <script src="<?= BASEURL ?>/dist/js/bootstrap.min.js"></script>
  <script type="text/javascript">
    var typed = new Typed('#element', {
      strings: ['Selamat Datang <br> di UNIYAP','Penerimaan <br> Mahasiswa Baru'],
      typeSpeed: 100,
      backSpeed: 50,
      backDelay: 1000,
      loop: true
    });
  </script>

  <script>
    function showForm(formId) {
        if (formId === 'loginForm') {
            document.getElementById('loginForm').style.display = 'block';
            document.getElementById('registerForm').style.display = 'none';
        } else if (formId === 'registerForm') {
            document.getElementById('registerForm').style.display = 'block';
            document.getElementById('loginForm').style.display = 'none';
        }
    }


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
<script>
  $(function() {
    $('#uploaddoc').on('shown.bs.modal', function() {
      $(this).find('input:first').focus();
    });

    $('#btnupload').click(function() {
      $('#uploaddoc').modal('show');
    });

    $('.btn.btn-secondary').click(function() {
      $('#uploaddoc').modal('hide');
    });

    $('.btn-close').click(function() {
      $('#uploaddoc').modal('hide');
    });

    $('.btn-close').click(function() {
      $('#addSM').modal('hide');
    });
  });
</script>

<script>
  $(document).ready(function() {
    $('#addSM').on('shown.bs.modal', function() {
      $(this).find('input:first').focus();
    });

    $('#tambahDataBtn').click(function() {
      $('#addSM').modal('show');
      console.log('test');
    });

    $('.btn.btn-secondary').click(function() {
      $('#addSM').modal('hide');
    });
  });
</script>

</body>
</html>
