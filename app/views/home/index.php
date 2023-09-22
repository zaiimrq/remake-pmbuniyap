
<div class="container col-md-11">
  <div class="col-md-12">
            <?php Flasher::flash() ?>
              <div class="row">
                  <div class="card col-sm-6 mb-3 mb-sm-0 p-0">
                  <div class="card-header" style="background-color: #f2c438;">
                    <h5><i class="fas fa-globe"></i> Portal PMB UNIYAP</h5>
                    <p>Login untuk mengisi form pendaftaran:</p>
                    <button onclick="showForm('loginForm')" class="btn border-0 text-white" >Login</button>
                    <span>/</span>
                    <button onclick="showForm('registerForm')" class="btn border-0 text-white">Register</button>
                  </div>
                  <div class="card-body px-3">
                    <form id="loginForm" action="<?= BASEURL ?>/home/login" method="post">
                      <div class="form-group">
                        <label for="nopen">No Pendaftaran</label>
                        <input type="text" name="nopen" class="form-control mb-3" id="nopen" placeholder="Masukkan No Pendaftaran Anda">
                      </div>
                      <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control mb-3" placeholder="Enter password">
                      </div>
                      <button type="submit" class="btn btn-success">Login</button>
                    </form>

                    <form id="registerForm" action="<?= BASEURL ?>/home/register" method="post">
                      <div class="form-group">
                          <label >Perhatian : Harap untuk mengingat <strong>No. Pendaftaran </strong>Anda yang akan digunakan untuk mengakses Login PMB UNIYAP.</label>
                          <label for="noPendaftaran">Nomor Pendaftaran</label>
                          <input type="text" name="noPendaftaran" class="form-control mb-3" id="noPendaftaran" readonly>
                      </div>
                      <div class="form-group">
                          <label for="nisn">NISN</label>
                          <input type="text" name="nisn" class="form-control mb-3" id="nisn" placeholder="Masukkan Nisn">
                      </div>
                      <div class="form-group">
                          <label for="nama">Nama Lengkap</label>
                          <input type="text" name="nama" class="form-control mb-3" id="nama" placeholder="Masukkan Nama Lengkap Anda">
                      </div>
                      <div class="form-group">
                          <label for="email">Email</label>
                          <input type="email" name="email" class="form-control mb-3" id="email" placeholder="Masukkan Email Anda">
                      </div>
                      <div class="form-group">
                          <label for="passReg">Password</label>
                          <input type="password" name="password" class="form-control mb-3" placeholder="Masukkan Password Anda">
                      </div>
                      <button type="submit" class="btn btn-success">Daftar</button>

                    </form>
                    

                  </div>
                </div>

                <br><br>

                <div class="card col-sm-6">
                  <img src="<?= BASEURL ?>/dist/img/illus.webp">
                </div>
            </div>

            <div class="card col-sm-12" id="agenda" style="margin-top: 70px; padding-right: 0; padding-left: 0;">
                <div class="card-header text-white" style="background-color: #004d40">
                  Agenda
                </div>
                <div class="card-body">

                  <h5 class="card-title"><?= $data['agenda'] ?></h5>
                  <p class="card-text">Pendaftaran dibuka mulai tanggal <?= date('d F Y', strtotime($data['periode_mulai'])) ?> sampai dengan <?= date('d F Y', strtotime($data['periode_akhir'])) ?> </p>
                </div>

            </div>

            <div class="my-section section">
             <center> 
              <h3 style="margin-bottom: 70px;">- Program Sarjana dan Pascasarjana -</h3>
            </center>
              <div class="row">
              <div class="col-sm-5 mx-auto mb-3 mb-sm-0">
                <div class="card shadow text-center rounded p-4">
                  <div class="card-body ">
                    <h5 class="card-title"><i class="fas fa-university"></i> Kuota Program Sarjana (S-1)</h5> <hr>
                    <p class="card-text">Program Sarjana (S1) Semester Gasal dibuka untuk 11 program studi  dengan daya tampung <strong>500</strong></p>
                  </div>
                </div>
              </div>

              <div class="col-sm-5 mx-auto">
                <div class="card shadow text-center rounded p-4">
                  <div class="card-body">
                    <h5 class="card-title"><i class="fas fa-university"></i> Kuota Program Magister (S-2)</h5> <hr>
                    <p class="card-text">Program Magister (S2) Semester Gasal dibuka untuk 2 program studi  dengan daya tampung <strong>200</strong></p>
                  </div>
                </div>
              </div>
            </div>
            </div>

          <center>
            <h3 style="margin: 70px 0; font-weight: bold;">-The Best Choice For The Future-</h3>
          </center>


            <div class="row">
              <div class="col-sm-5 mx-auto mb-3 mb-sm-0">
                <div class="card shadow text-center rounded p-4">
                  <div class="card-body">
                    <h5 class="card-title"><i class="fas fa-graduation-cap"></i> Program Studi Sarjana (S-1)</h5> <hr>
                    <p class="card-text">Memiliki 9 Program Studi dengan Akreditasi <strong>B</strong> <br> 2 Program Studi dengan Akreditasi <strong>Proses</strong>.</p>
                  </div>
                </div>
              </div>
              <div class="col-sm-5 mx-auto">
                <div class="card shadow text-center rounded p-4">
                  <div class="card-body">
                    <h5 class="card-title"><i class="fas fa-graduation-cap"></i> Program Studi Magister (S-2)</h5> <hr>
                    <p class="card-text">Memiliki 1 Program Studi dengan Akreditasi <strong>Baik</strong> <br> 1 Program Studi dengan Akreditasi <strong>B</strong>.</p>
                  </div>
                </div>
            </div>
      </div>
  </div>
</div>



