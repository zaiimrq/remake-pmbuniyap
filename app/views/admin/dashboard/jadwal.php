<div class="container-fluid">
    <div class="row">
        <?php require_once('../app/views/admin/dashboard/templates/sidebar.php') ?>
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <h2 class="mt-3">Jadwal</h2>
            <button type="button" class="btn btn-success" id="tambahDataBtn" data-bs-toggle="modal" data-bs-target="#jadwal" style="margin-bottom: 10px;width: 200px;">
                Tambah Data
            </button>
            <div class="row">
                <div class="col-lg-8">
                <?php Flasher::flash('admin/jadwal') ?>
                </div>
            </div>
            <div class="table-responsive mb-5">
                <table id="tabelsm" class="table table-striped" style="width:100%; text-align: center;">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Agenda</th>
                            <th class="text-center">Periode Mulai</th>
                            <th class="text-center">Periode Akhir</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($data as $jadwal) : ?>
                            <tr>
                                <td><?= $i++ ?></td>
                                <td><?= $jadwal['agenda'] ?></td>
                                <td><?= $jadwal['periode_mulai'] ?></td>
                                <td><?= $jadwal['periode_akhir'] ?></td>
                                <td class="px-3"> 
                                    <a class="btn btn-warning btn-sm editdata" data-bs-toggle="modal" data-bs-target="#jadwal" data-id="<?= $jadwal['id_jadwal'] ?>"><i class="fas fa-edit"></i></a>
                                    <a href="<?= BASEURL ?>/admin/deleteJadwal/<?= $jadwal['id_jadwal'] ?>" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
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

<div class="modal fade" id="jadwal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalLabel">Tambah Data</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="bi bi-x-lg" style="font-size: 1.5rem;"></i></button>
          </div>
          <div class="modal-body">

            <form action="<?= BASEURL ?>/admin/addJadwal" method="POST">

            <input type="hidden" name="id_jadwal" id="id_jadwal">
                <label>Agenda</label>
                <div class="form-group mb-3">
                    <input type="text" class="form-control" name="agenda" required id="agenda" autofocus>
                </div>

                <label>Periode Mulai</label>
                <div class="form-group mb-3">
                    <input type="date" class="form-control" name="periode_mulai" id="periode_mulai" required>
                </div>

                <label>Periode Akhir</label>
                <div class="form-group mb-3">
                    <input type="date" class="form-control" name="periode_akhir" id="periode_akhir" required>
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
    $(function () {
        $('#tambahDataBtn').click(function () {
            $('#modalLabel').html('Tambah Data')
            $('.modal-footer button[type="submit"]').html('Submit')
            $('.modal-body form').attr('action', '<?= BASEURL ?>/admin/addJadwal')
            $('#agenda').val('')
            $('#periode_mulai').val('')
            $('#periode_akhir').val('')
        })

        $('.editdata').click(function () {
            $('#modalLabel').html('Edit Data')
            $('.modal-footer button[type="submit"]').html('Update')
            $('.modal-body form').attr('action', '<?= BASEURL ?>/admin/editJadwal')

            const id = $(this).data('id')

            $.ajax({
                url: "<?= BASEURL ?>/admin/getUbahJadwal",
                data: {id : id},
                method: "post",
                dataType: "json",
                success: function (data) {
                    $('#agenda').val(data.agenda)
                    $('#periode_mulai').val(data.periode_mulai)
                    $('#periode_akhir').val(data.periode_akhir)
                    $('#id_jadwal').val(data.id_jadwal)
                }
                
            })
        })
    })
</script>