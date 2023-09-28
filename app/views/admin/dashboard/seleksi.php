<div class="container-fluid">
    <div class="row">
        <?php require_once('../app/views/admin/dashboard/templates/sidebar.php') ?>
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <h2 class="mt-3">Jadwal</h2>
            <div class="table-responsive">
                <table id="tabelsm" class="table table-striped" style="width:100%; text-align: center;">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NISN</th>
                            <th>No Pendaftaran</th>
                            <th>Nama Mahasiswa</th>
                            <th>Program Studi</th>
                            <th>Hasil</th>
                            <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach($data as $d): ?>
                            <tr>
                                <td><?= $i++ ?></td>
                                <td><?= $d['nisn'] ?></td>
                                <td><?= $d['no_pendaftar'] ?></td>
                                <td><?= $d['nama'] ?></td>
                                <td><?= $d['prodi'] ?></td>
                                <td><?= $d['hasil_seleksi'] ?></td>
                
                                <td>
                                    <form class="d-inline" action="<?= BASEURL ?>/admin/getStatus" method="post">
                                        <input type="hidden" name="status" value="lulus">
                                        <input type="hidden" name="nisn" value="<?= $d['nisn'] ?>">
                                        <button type="submit" class="btn btn-success"><i class="fas fa-check"></i>  Lulus</button>
                                    </form>
                                    <form class="d-inline" action="<?= BASEURL ?>/admin/getStatus" method="post">
                                        <input type="hidden" name="status" value="tidak lulus">
                                        <input type="hidden" name="nisn" value="<?= $d['nisn'] ?>">
                                        <button type="submit" class="btn btn-danger " ><i class="fas fa-times" ></i>  Tidak Lulus</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
   
        </main>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
