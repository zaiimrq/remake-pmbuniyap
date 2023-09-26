<div class="container-fluid">
    <div class="row">
        <?php require_once('../app/views/admin/dashboard/templates/sidebar.php') ?>
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <h2 class="mt-3">Daftar Program Studi</h2>
            <button type="button" class="btn btn-success" id="tambahDataBtn" data-bs-toggle="modal" data-bs-target="#addSM" style="margin-bottom: 10px;width: 200px;">
                Tambah Data
            </button>
            <div class="row">
                <div class="col-lg-8">
                <?php Flasher::flash('admin/prodi') ?>
                </div>
            </div>
            <div class="table-responsive mb-5">
                <table id="tabelsm" class="table table-striped" style="width:100%; text-align: center;">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode</th>
                            <th>Nama Program Studi</th>
                            <th>Fakultas</th>
                            <th>Akreditasi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1 ?>
                        <?php foreach ($data as $prodi) :?>
                         <tr>
                            <td><?= $i++ ?></td>
                            <td><?= $prodi['kode_prodi'] ?></td>
                            <td><?= $prodi['prodi'] ?></td>
                            <td><?= $prodi['fakultas'] ?></td>
                            <td><?= $prodi['akreditasi'] ?></td>
                            <td> <a class="btn btn-warning btn-sm editdata" data-bs-toggle="modal" data-bs-target="#addSM" data-kode="<?= $prodi['kode_prodi'] ?>" ><i class="fas fa-edit"></i></a>
                            <a href="<?= BASEURL ?>/admin/deleteProdi/<?= $prodi['kode_prodi'];?>" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</div>


<!-- modal -->

<div class="modal fade" id="addSM" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLabel">Tambah Program Studi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= BASEURL ?>/admin/addProdi" method="POST">
                    <label for="kode">Kode</label>
                    <div class="form-group mb-3">
                        <input type="text" class="form-control" name="kode" required id="kode" autofocus>
                    </div>

                    <label for="prodi">Nama Program Studi</label>
                    <div class="form-group mb-3">
                        <input type="text" class="form-control" name="prodi" required id="prodi" >
                    </div>

                    <label for="fakultas">Fakultas</label>
                    <div class="form-group mb-3">
                        <input type="text" class="form-control" name="fakultas" required id="fakultas" >
                    </div>

                    <label for="akreditasi">Akreditasi</label>
                    <div class="form-group mb-3">
                        <input type="text" class="form-control" name="akreditasi" required id="akreditasi" >
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

<?php require_once('templates/admin_prodi_ajax.php') ?>