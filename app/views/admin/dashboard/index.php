



<div class="container-fluid">
  <div class="row">
    <?php require_once('../app/views/admin/dashboard/templates/sidebar.php') ?>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <h2 class="mt-3">Daftar Mahasiswa</h2>
        <button type="button" class="btn btn-success" id="tambahDataBtn" data-bs-toggle="modal" data-bs-target="#addSM" style="margin-bottom: 10px;width: 200px;">
        Tambah Data
      </button>
      <div class="row">
        <div class="col-lg-8">
          <?php Flasher::flash('admin') ?>
        </div>
      </div>
      <div class="table-responsive">
        <table id="tabelsm" class="table table-striped" style="width:100%; text-align: center;">
              <thead>
                  <tr>
                      <th>No</th>
                      <th>Pendaftaran</th>
                      <th>NISN</th>
                      <th>Nama Mahasiswa</th>
                      <th>No Telp</th>
                      <th>Email</th>
                      <th>Tahun  Lulus</th>
                      <th>Jalur Masuk</th>
                      <th>Asal Sekolah</th>
                      <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php $i = 1; ?>
                <?php foreach($data['cama'] as $mhs): ?>
                  <tr>
                    <td><?= $i++ ?></td>
                    <td><?= $mhs['no_pendaftar'] ?></td>
                    <td><?= $mhs['nisn'] ?></td>
                    <td><?= $mhs['nama'] ?></td>
                    <td><?= $mhs['no_hp'] ?></td>
                    <td><?= $mhs['email'] ?></td>
                    <td><?= $mhs['thn_lulus'] ?></td>
                    <td><?= $mhs['jalur_masuk'] ?></td>
                    <td><?= $mhs['asal_sekolah'] ?></td>
                    <td class="px-3">
                      <div class="d-flex justify-content-between align-items-center">
                        <a class="btn btn-warning mx-1" id="editdata" data-bs-toggle="modal" data-bs-target="#addSM" data-nisn="<?= $mhs['nisn'] ?>">
                          <i class="fas fa-edit"></i>
                        </a>
                        <a href="" class="btn btn-danger mx-1">
                          <i class="fas fa-trash"></i>
                        </a>
                      </div>
                    </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>     
        </table>
      </div>
    </main>
  </div>
</div>

<!-- modal -->

<div class="modal fade" id="addSM" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Mahasiswa</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="<?= BASEURL ?>/admin/tambah" method="POST" enctype="multipart/form-data">

          <div class="form-group mb-3">
            <label for="noPendaftaran">Nomor Pendaftaran</label>
            <input type="text" name="no_pendaftar" class="form-control" id="noPendaftaran" readonly>
          </div>

          <div class="form-group mb-3">
            <label for="password">Password</label>
            <input type="text" class="form-control" name="password" id="password">
          </div>

          <div class="form-group mb-3">
            <label for="nisn">NISN</label>
            <input type="text" class="form-control" name="nisn" id="nisn">
          </div>

          <div class="form-group mb-3">
            <label for="nama">Nama</label>
            <input type="text" class="form-control" name="nama" id="nama">
          </div>

          <div class="form-group mb-3">
            <label for="tlp">No Tlp</label>
            <input type="text" class="form-control" name="tlp" id="tlp">
          </div>

          <div class="form-group mb-3">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email" id="email">
          </div>


          <div class="form-group mb-3">
            <label for="thn_lulus">Tahun Lulus</label>
            <input type="number" class="form-control" name="thn_lulus" id="thn_lulus" min="2012" max="2023" >
          </div>

          <label for="jalur">Jalur Masuk</label>
          <select name="jalur_masuk" class="form-control">
              <option value="mandiri">Mandiri</option>
              <option value="undangan">Undangan</option>
          </select>

            <br>

          <label for="prodi">Program Studi Pilihan</label>
          <select name="kode_prodi" class="form-select">
            <?php foreach ($data['prodi'] as $data): ?>
              <option value="<?= $data['kode_prodi'] ?>"><?= $data['prodi'] ?></option>
            <?php endforeach; ?>
          </select>

            <br>

          <div class="form-group mb-3">
            <label for="asal">Asal Sekolah</label>
            <input type="text" class="form-control" name="asal_sekolah" id="asal">
          </div>

          <br>

          <div class="form-group mb-3">
            <label for="dokumen">Upload Dokumen</label>
            <input type="file" class="form-control" name="dokumen" id="dokumen">
          </div>

          <br> 

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" style="width: 100px; float: left;" class="btn btn-success">Submit</button>
          </div>          
        </form>  
      </div         
    </div>
  </div>
</div>