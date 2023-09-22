



  <div class="container">
    
    <div class="card-box">
      <div class="card-body bg-warning shadow font-weight-bold">
        Selamat Datang <?= $data['nama']; ?> dengan No Pendaftaran <?= $data['no_pendaftar']; ?> sampai pada tahap
      </div>
    </div>

    <br><br>
    <div class="card col-md-12">
      <div class="card-header">
        Data Diri :
      </div>
      <div class="card-body">
        <form action="" method="POST">
          <div class="row mb-3">
            <label for="nisn" class="col-sm-2 col-form-label">NISN</label>
            <div class="col-sm-10">
              <input type="text" class="form-control field" name="nisn" value=": <?php echo($data['nisn']) ?>" readonly>
            </div>
          </div>
          
          <div class="row mb-3">
            <label for="no_pendaftar" class="col-sm-2 col-form-label">No Pendaftaran</label>
            <div class="col-sm-10">
              <input type="text" class="form-control field" name="no_pendaftar" value=": <?php echo($data['no_pendaftar']) ?>" readonly>
            </div>
          </div>

          <div class="row mb-3">
            <label for="nama" class="col-sm-2 col-form-label">Nama</label>
            <div class="col-sm-10">
              <input type="text" class="form-control field" name="nama" value=": <?php echo($data['nama']) ?>" readonly>
            </div>
          </div>

          <div class="row mb-3">
            <label for="email" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
              <input type="text" class="form-control field" name="email" value=": <?php echo($data['email']) ?>" readonly>
            </div>
          </div>

           <div class="row mb-3">
            <label for="email" class="col-sm-2 col-form-label">No Telepon</label>
            <div class="col-sm-10">
              <input type="text" class="form-control field" name="no_hp" value=": <?php echo($data['no_hp']) ?>" readonly>
            </div>
          </div>

          <div class="row mb-3">
            <label for="text" class="col-sm-2 col-form-label">Tahun Lulus</label>
            <div class="col-sm-10">
              <input type="text" class="form-control field" name="thn_lulus" value=": <?php echo($data['thn_lulus']) ?>" readonly>
            </div>
          </div>

          <div class="row mb-3">
            <label for="text" class="col-sm-2 col-form-label">Asal Sekolah</label>
            <div class="col-sm-10">
              <input type="text" class="form-control field" name="asal_sekolah" value=": <?php echo($data['asal_sekolah']) ?>" readonly>
            </div>
          </div>

          <!-- <div class="row mb-3">
            <label for="text" class="col-sm-2 col-form-label">Program Studi Pilihan</label>
            <div class="col-sm-10">
              <input type="text" class="form-control field" name="jalur_masuk" value=": <?= $data['prodi'];?>" readonly>
            </div>
          </div> -->

          <div class="row mb-3">
            <label for="text" class="col-sm-2 col-form-label">Jalur Seleksi</label>
            <div class="col-sm-10">
              <input type="text" class="form-control field" name="jalur_masuk" value=": <?php echo($data['jalur_masuk']) ?>" readonly>
            </div>
          </div>


        </form>
      </div>
    </div>

     <!-- Modal -->
    <div class="modal fade" id="addSM" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title font-weight-bold" id="exampleModalLabel">Formulir PMB UNIYAP 2023</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="bi bi-x-lg" style="font-size: 1.5rem;"></i></button>
          </div>
          <div class="modal-body">


          <form action="" method="POST" >

            <label>NISN</label>
             <div class="form-floating mb-3">
                 <input type="text" class="form-control" name="nisn" required id="nisn" value="<?= $data['nisn']; ?>" readonly>
             </div>

             <label>Nama</label>
             <div class="form-floating mb-3">
                 <input type="text" class="form-control" name="nama" required id="nama" value="<?= $data['nama']; ?>" readonly>
             </div>

              <label>No Tlp</label>
             <div class="form-floating mb-3">
                 <input type="text" class="form-control" name="tlp" required id="tlp" autocomplete="off">
             </div>

              <label>Email</label>
             <div class="form-floating mb-3">
                 <input type="email" class="form-control" name="email" required id="email" value="<?= $data['email']; ?>" readonly>
             </div>

            <label>Tahun Lulus</label>
            <div class="form-floating mb-3">
               <input type="number" class="form-control" name="thn_lulus" id="thn_lulus" min="2012" max="2023"  required>
           </div>

           <label for="jalur">Jalur Masuk</label>
                  <select name="jalur" class="form-control">
                    <option value="Mandiri">Mandiri</option>
                    <option value="Undangan">Undangan</option>
                </select>
                <br>

            <label for="prodi">Program Studi Pilihan</label>
                  <select name="prodi" class="form-control">
    
                </select>
                <br>

          <label>Asal Sekolah</label>
             <div class="form-floating mb-3">
                 <input type="text" class="form-control" name="asal" required id="asal" autocomplete="off">
             </div>

            <br> 

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" style="width: 100px; float: left;" class="btn btn-success" name="formulir">Submit</button>
            </div>

            
          </form>
    
          </div>
          
        </div>
      </div>
    </div>

            <?php 

              if (isset($_POST['upload'])) {
                if (isset($_FILES['dok'])) {
                  $nisn = $row['nisn'];
                  $nama = $row['nama'];
                  $dokName = $_FILES['dok']['name'];
                  $dokTmp = $_FILES['dok']['tmp_name'];

              
                  $dokEx = explode('.', $dokName);
                  $dokEx = end($dokEx);
                  $dokName = $nisn.'-'.$nama.'.'.$dokEx;



                  if ($_FILES['dok']['error'] === 0) {
                    if ($dokEx === 'pdf') {
                      


                      $query = "SELECT nisn FROM dokumen WHERE nisn='$nisn'";
                      $result = mysqli_query($conn, $query);

                      if (mysqli_num_rows($result) > 0) {
                          $query = "UPDATE dokumen SET dokumen='$dokName' WHERE nisn='$nisn'";
                          mysqli_query($conn, $query);
                          move_uploaded_file($dokTmp, './doc/'.$dokName);

                      } else {
                        
                          $query = "INSERT INTO dokumen VALUES ('','$nisn','$dokName')";
                          mysqli_query($conn, $query);
                          move_uploaded_file($dokTmp, './doc/'.$dokName);

                      }
                  } else {
                    echo "
                          <script>
                                alert('Dokumen Yang Anda Pilih Bukan Pdf !');
                          </script>

                    ";  
                  }
                }
              }
            }

             ?>


     <!-- Modal -->
    <div class="modal fade" id="uploaddoc" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title font-weight-bold" id="exampleModalLabel">Upload Dokumen PMB UNIYAP 2023</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="bi bi-x-lg" style="font-size: 1.5rem;"></i></button>
          </div>
          <div class="modal-body">


          <form action="" method="POST" enctype="multipart/form-data">

            <label>Unggahlah Scan Ijazah atau Surat Keterangan Lulus(SKL) Anda dengan format .pdf. <br><br></label>
             <div class="form-floating mb-3">
                 <input type="file" class="form-control" name="dok" required id="doc">
             </div>

            <br> 

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" style="width: 100px; float: left;" class="btn btn-warning" name="upload">Upload</button>
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

