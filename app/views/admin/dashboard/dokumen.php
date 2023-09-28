<div class="container-fluid">
    <div class="row">
        <?php require_once('../app/views/admin/dashboard/templates/sidebar.php') ?>
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mt-5">
            <div class="table-responsive">
                <table id="tabelsm" class="table table-striped" style="width:100%; text-align: center;">
                    <thead>
                            <tr>
                                <th>No</th>
                                <th>NISN</th>
                                <th>Nama Lengkap</th>
                                <th>Jenis Dokumen</th>
                                <th>File</th>
                                <th>Preview</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($data as $dok) :?>
                            <tr>
                                <td><?= $i++ ?></td>

                                <td><?= $dok['nisn'] ?></td>
                                <td><?= $dok['nama'] ?></td>
                                <td>Ijazah/SKL</td>
                                <td><?= $dok['dokumen'] ?></td>
                                <td>
                                    <button type="button" class="btn btn-primary btnshow" data-bs-toggle="modal" data-bs-target="#showdoc" data-nisn="<?= $dok['nisn'] ?>" data-dokumen="<?= $dok['dokumen'] ?>" >
                                    <i class="fas fa-file-pdf fa-lg"></i>
                                    </button>
                                </td>
                            </tr>
                         
                        <?php endforeach; ?>
                    </tbody>        
                </table>
            </div>        
        </main>
    </div>
</div>
<div class="modal fade" id="showdoc" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Preview Dokumen</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="bi bi-x-lg"></i></button>
            </div>
            <div class="modal-body" >
                <div class="embed-responsive" style="height: 30rem;">
                    <iframe class="embed-responsive-item preview" style="width: 100%; height: 100%;" src="" type="application/pdf"></iframe>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<script>
$(function () {
    $('.btnshow').click(function () {
        let nisn = $(this).data('nisn')
        let dokumen = $(this).data('dokumen');
        let url = '<?= BASEURL ?>' + '/storage/' + nisn + '-' + dokumen;
        let newUrl = url.replace(/ /g, '%20')

        console.log(url);
        
        console.log(nisn);
        console.log(dokumen);
        $('.preview').attr('src', newUrl)

    })
})
</script>