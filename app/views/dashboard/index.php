



  <div class="container">
    <div class="card-box" style="margin-top: 10rem;">
      <div class="col-md-12">
        <?php Flasher::flash('home') ?? Flasher::flash('dashboard') ?>
      </div>
      <div class="card-body bg-warning shadow p-0">
        <marquee style="font-size: 2rem;" hspace="5%" scrollamount="10px">Selamat Datang, <strong><?= $data['cama']['nama']; ?></strong> dengan No Pendaftaran <strong><?= $data['cama']['no_pendaftar']; ?></strong> sampai pada tahap <strong><?= $data['cama']['agenda'] ?></strong></marquee>
      </div>
    </div>

    <br><br>
    <div class="card col-md-12">
      <div class="card-header">Data Diri :</div>
      <div class="card-body">
          <div class="row mb-3">
            <label for="nisn" class="col-sm-2 col-form-label">NISN</label>
            <div class="col-sm-10">
              <input type="text" class="form-control field border" name="nisn" value="<?php echo($data['cama']['nisn']) ?>" readonly>
            </div>
          </div>
          
          <div class="row mb-3">
            <label for="no_pendaftar" class="col-sm-2 col-form-label">No Pendaftaran</label>
            <div class="col-sm-10">
              <input type="text" class="form-control field border" name="no_pendaftar" value="<?php echo($data['cama']['no_pendaftar']) ?>" readonly>
            </div>
          </div>

          <div class="row mb-3">
            <label for="nama" class="col-sm-2 col-form-label">Nama</label>
            <div class="col-sm-10">
              <input type="text" class="form-control field border" name="nama" value="<?php echo($data['cama']['nama']) ?>" readonly>
            </div>
          </div>

          <div class="row mb-3">
            <label for="email" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
              <input type="text" class="form-control field border" name="email" value="<?php echo($data['cama']['email']) ?>" readonly>
            </div>
          </div>

           <div class="row mb-3">
            <label for="email" class="col-sm-2 col-form-label">No Telepon</label>
            <div class="col-sm-10">
              <input type="text" class="form-control field border" name="no_hp" value="<?php echo($data['cama']['no_hp']) ?>" readonly>
            </div>
          </div>

          <div class="row mb-3">
            <label for="text" class="col-sm-2 col-form-label">Tahun Lulus</label>
            <div class="col-sm-10">
              <input type="text" class="form-control field border" name="thn_lulus" value="<?php echo($data['cama']['thn_lulus']) ?>" readonly>
            </div>
          </div>

          <div class="row mb-3">
            <label for="text" class="col-sm-2 col-form-label">Asal Sekolah</label>
            <div class="col-sm-10">
              <input type="text" class="form-control field border" name="asal_sekolah" value="<?php echo($data['cama']['asal_sekolah']) ?>" readonly>
            </div>
          </div>

          <div class="row mb-3">
            <label for="text" class="col-sm-2 col-form-label">Program Studi Pilihan</label>
            <div class="col-sm-10">
              <input type="text" class="form-control field border" name="prodi" value="<?= $data['cama']['prodi'];?>" readonly>
            </div>
          </div>

          <div class="row mb-3">
            <label for="text" class="col-sm-2 col-form-label">Jalur Seleksi</label>
            <div class="col-sm-10">
              <input type="text" class="form-control field border" name="jalur_masuk" value="<?php echo($data['cama']['jalur_masuk']) ?>" readonly>
            </div>
          </div>
      </div>
    </div>

     <!-- Modal tambah-->
    <div class="modal fade" id="addSM" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title font-weight-bold" id="exampleModalLabel">Formulir PMB UNIYAP 2023</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="bi bi-x-lg" style="font-size: 1.5rem;"></i></button>
          </div>
          <div class="modal-body">
            <small><i class="fw-md text-danger mb-3 d-block">Note : Data diri hanya dapat dilakukan satu kali, harap isi data dengan benar !</i></small>
            <form action="<?= BASEURL ?>/dashboard/formulir" method="POST" id="formModal">
              <label>NISN</label>
              <div class="form-floating mb-3">
                  <input type="text" class="form-control" name="nisn" required id="nisn" value="<?= $data['cama']['nisn']; ?>" readonly>
              </div>
              <label>Nama</label>
              <div class="form-floating mb-3">
                  <input type="text" class="form-control" name="nama" required id="nama" value="<?= $data['cama']['nama']; ?>" readonly>
              </div>
              <label>No Tlp</label>
              <div class="form-floating mb-3">
                  <input type="text" class="form-control" name="tlp" required id="tlp" value="<?= $data['cama']['no_hp'] ?>" autocomplete="off">
              </div>
              <label>Email</label>
              <div class="form-floating mb-3">
                  <input type="email" class="form-control" name="email" required id="email" value="<?= $data['cama']['email']; ?>" readonly>
              </div>
              <label>Tahun Lulus</label>
              <div class="form-floating mb-3">
                <input type="number" min="2015" max="2025" step="1" class="form-control" name="thn_lulus" id="thn_lulus" value="<?= $data['cama']['thn_lulus'] ?>" required>
              </div>
            <label for="jalur">Jalur Masuk</label>
                  <select name="jalur_masuk" class="form-control" id="jalur">
                    <option value="Mandiri">Mandiri</option>
                    <option value="Undangan">Undangan</option>
                  </select>
                  <br>
              <label for="prodi">Program Studi Pilihan</label>
                <select name="prodi" class="form-control">
                  <?php foreach($data['prodi'] as $prodi): ?>
                    <option value="<?= $prodi['kode_prodi'] ?>"><?= $prodi['prodi'] ?></option>
                  <?php endforeach; ?>
                </select>
                  <br>

              <label>Asal Sekolah</label>
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" name="asal_sekolah" value="<?= $data['cama']['asal_sekolah'] ?>" required id="asal" autocomplete="off">
                </div>

              <br> 

              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="submit" style="width: 100px; float: left;" class="btn btn-success">Submit</button>
              </div>   
            </form>
          </div>         
        </div>
      </div>
    </div>

    <!-- modal upload -->
    
    <div class="modal fade" id="uploaddoc" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title font-weight-bold" id="exampleModalLabel">Upload Dokumen PMB UNIYAP 2023</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <small><i class="fw-md text-danger mb-3 d-block">Note : Upload Dokumen hanya dapat dilakukan satu kali, pastikan dokumen yang anda upload adalah benar !</i></small>
            
            <form action="<?= BASEURL ?>/dashboard/upload/<?= $data['cama']['nisn'] ?>" method="post" enctype="multipart/form-data">
              <div class="form-floating" style="height: 400px; display: none;" id="prevParent">
                <embed frameborder="0" id="prev" class="w-100 h-100"></embed>
              </div>
              <label>Upload dokumen</label>
              <div class="form-floating">
                <input type="file" accept=".pdf" class="form-control" name="dokumen"  id="dokumen" onchange="preview()">
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="submit" style="width: 100px; float: left;" class="btn btn-success">Submit</button>
              </div> 
            </form>
          </div> 
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-sm-6 mb-3 mb-sm-0 ">
        <div class="card bg-warning shadow">
          <div class="card-body">
            <h5 class="card-title font-weight-bold">Formulir PMB UNIYAP</h5>
            <p class="card-text">Calon Mahasiswa wajib mengisi seluruh data formulir dengan baik dan benar.</p>
            <a class="btn btn-success" id="tambahDataBtn" data-bs-toggle="modal" data-bs-target="#addSM">Isi Formulir</a>
          </div>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="card bg-info shadow">
          <div class="card-body">
            <h5 class="card-title font-weight-bold">Upload Dokumen</h5>
            <p class="card-text">Calon Mahasiswa wajib mengunggah dokumen Ijazah atau SKL(Surat Keterangan Lulus) dengan format .pdf</p>
            <a class="btn btn-warning" id="btnupload" data-bs-toggle="modal" data-bs-target="#uploaddoc">Upload</a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script>
    function preview(){
      let doc = document.getElementById('dokumen');
      let prev = document.getElementById('prev');
      let parent = document.getElementById('prevParent');
      let reader = new FileReader();

      parent.style.display = "block";
      reader.readAsDataURL(doc.files[0]);
      reader.onload =function(e) {
        prev.src = e.target.result;
      }
    }
  </script>

