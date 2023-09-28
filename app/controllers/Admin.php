<?php 

class Admin extends Controller
{
    public function login()
    {   
        if (isset($_SESSION['auth'])) {
            header('Location: '. BASEURL .'/admin');
            exit;
        }
        
        $this->view('admin/templates/header');
        $this->view('admin/login');
        $this->view('admin/templates/footer');
    }
    
    public function auth()
    {
        // var_dump($_POST);
        if (!(isset($_POST['username']) && isset($_POST['password']))) {   
            unset($_SESSION['auth']);
            header('Location:'. BASEURL .'/');
            exit;
        }

        // $this->model('Admin_model')->auth($_POST);

        if($this->model('Admin_model')->auth($_POST))
        {
            header('Location: '. BASEURL .'/admin');
            exit;

        } else {

            Flasher::setFlash('Gagal', 'Login Administrator', 'danger', 'admin');
            header('Location: '. BASEURL .'/admin/login');
            exit;

        }
        
    }



    public function index()
    {
        if (!(isset($_SESSION['auth']))) {
            unset($_SESSION['auth']);
            header('Location:'. BASEURL .'/');
            exit;
        }

        $data['cama'] = $this->model('Admin_model')->getAllMahasiswa();
        $data['prodi'] = $this->model('Cama_model')->getProdi();

        $this->view('admin/dashboard/templates/header');
        $this->view('admin/dashboard/index', $data);
        $this->view('admin/dashboard/templates/footer');
    }

    public function tambah()
    {
    
        if (!(isset($_SESSION['auth']))) {
            unset($_SESSION['auth']);
            header('Location:'. BASEURL .'/');
            exit;
        }
        
        $data['cama'] = $_POST;
        $data['dokumen'] = $_FILES;

        if ($this->model('Admin_model')->addMahasiswa($data) > 0) {
            Flasher::setFlash('Berhasil', 'Menambah Data Mahasiswa !', 'success', 'admin');
            header('Location: '. BASEURL .'/admin');
            exit;
        }else {
            Flasher::setFlash('Gagal', 'Menambah Data Mahasiswa !', 'danger', 'admin');
            header('Location: '. BASEURL .'/admin');
            exit;
        }
    }


    public function hapus($nisn = [])
    {
        if (!(isset($_SESSION['auth']))) {
            unset($_SESSION['auth']);
            header('Location:'. BASEURL .'/');
            exit;
        }

        if ($this->model('Admin_model')->hapus($nisn) == 1) 
        {
            Flasher::setFlash('Berhasil', 'Menghapus Data Mahasiswa !', 'success', 'admin');
            header('Location: '. BASEURL .'/admin');
            exit;
        } else {
            Flasher::setFlash('Gagal', 'Menghapus Data Mahasiswa !', 'danger', 'admin');
            header('Location: '. BASEURL .'/admin');
            exit;
        }
    }

    public function getUbah()
    {

        if (!(isset($_SESSION['auth']))) {
            unset($_SESSION['auth']);
            header('Location:'. BASEURL .'/');
            exit;
        }


        $data = $this->model('Admin_model')->getUbah($_POST['nisn']);

        echo json_encode($data);
    }

    public function ubah()
    {

        if (!(isset($_SESSION['auth']))) {
            unset($_SESSION['auth']);
            header('Location:'. BASEURL .'/');
            exit;
        }

        if ($this->model('Admin_model')->ubah([$_POST, $_FILES]) > 0) {
            Flasher::setFlash('Berhasil', 'Mengubah Data Mahasiswa !', 'success', 'admin');
            header('Location: '. BASEURL .'/admin');
            exit;
        }else {
            Flasher::setFlash('Gagal', 'Mengubah Data Mahasiswa !', 'danger', 'admin');
            header('Location: '. BASEURL .'/admin');
            exit;
        }
    }


    // halaman prodi admin
    public function prodi()
    {

        if (!(isset($_SESSION['auth']))) {
            unset($_SESSION['auth']);
            header('Location:'. BASEURL .'/');
            exit;
        }

        $data = $this->model('Cama_model')->getProdi();

        $this->view('admin/dashboard/templates/header');
        $this->view('admin/dashboard/prodi', $data);
        $this->view('admin/dashboard/templates/footer');
    }

    public function addProdi()
    {

        if (!(isset($_SESSION['auth']))) {
            unset($_SESSION['auth']);
            header('Location:'. BASEURL .'/');
            exit;
        }

        if ($this->model('Admin_prodi_model')->addProdi($_POST) > 0) {
            Flasher::setFlash('Berhasil', 'Menambah Program Studi !', 'success', 'admin/prodi');
            header('Location: '. BASEURL .'/admin/prodi');
            exit;
        }else {
            Flasher::setFlash('Gagal', 'Menambah Program Studi !', 'danger', 'admin/prodi');
            header('Location: '. BASEURL .'/admin/prodi');
            exit;
        }
    }

    public function deleteProdi($kode_prodi)
    {

        if (!(isset($_SESSION['auth']))) {
            unset($_SESSION['auth']);
            header('Location:'. BASEURL .'/');
            exit;
        }

        if ($this->model('Admin_prodi_model')->deleteProdi($kode_prodi) > 0) {
            Flasher::setFlash('Berhasil', 'Menghapus Program Studi !', 'success', 'admin/prodi');
            header('Location: '. BASEURL .'/admin/prodi');
            exit;
        }else {
            Flasher::setFlash('Gagal', 'Menghapus Program Studi !', 'danger', 'admin/prodi');
            header('Location: '. BASEURL .'/admin/prodi');
            exit;
        }
    }

    public function getEditProdi()
    {
        if (!(isset($_SESSION['auth']))) {
            unset($_SESSION['auth']);
            header('Location:'. BASEURL .'/');
            exit;
        }

        echo json_encode($this->model('Admin_prodi_model')->getEditProdi($_POST['kode']));
    }

    public function editProdi()
    {

        if (!(isset($_SESSION['auth']))) {
            unset($_SESSION['auth']);
            header('Location:'. BASEURL .'/');
            exit;
        }

        if ($this->model('Admin_prodi_model')->editProdi($_POST) > 0) {
            Flasher::setFlash('Berhasil', 'Edit Program Studi !', 'success', 'admin/prodi');
            header('Location: '. BASEURL .'/admin/prodi');
            exit;
        }else {
            Flasher::setFlash('Tidak Ada', 'Data Yang Berubah !', 'warning', 'admin/prodi');
            header('Location: '. BASEURL .'/admin/prodi');
            exit;
        }
    }

    //halaman jadwal admin


    public function jadwal()
    {
        if (!(isset($_SESSION['auth']))) {
            unset($_SESSION['auth']);
            header('Location:'. BASEURL .'/');
            exit;
        }

        $data = $this->model('Admin_jadwal_model')->getJadwal();

        $this->view('admin/dashboard/templates/header');
        $this->view('admin/dashboard/jadwal', $data);
        $this->view('admin/dashboard/templates/footer');
    }

    public function addJadwal()
    {
        if (!(isset($_SESSION['auth']))) {
            unset($_SESSION['auth']);
            header('Location:'. BASEURL .'/');
            exit;
        }

        if ($this->model('Admin_jadwal_model')->addJadwal($_POST)) {
            Flasher::setFlash('Berhasil', 'Menambahkan Jadwal !', 'success', 'admin/jadwal');
            header('Location: '. BASEURL .'/admin/jadwal');
            exit;
        }else {
            Flasher::setFlash('Gagal', 'Menambahkan Jadwal !', 'danger', 'admin/jadwal');
            header('Location: '. BASEURL .'/admin/jadwal');
            exit;
        }
    }

    public function deleteJadwal($id)
    {
        if (!(isset($_SESSION['auth']))) {
            unset($_SESSION['auth']);
            header('Location:'. BASEURL .'/');
            exit;
        }

        if ($this->model('Admin_jadwal_model')->deleteJadwal($id)) {
            Flasher::setFlash('Berhasil', 'Menghapus Jadwal !', 'success', 'admin/jadwal');
            header('Location: '. BASEURL .'/admin/jadwal');
            exit;
        }else {
            Flasher::setFlash('Gagal', 'Menghapus Jadwal !', 'danger', 'admin/jadwal');
            header('Location: '. BASEURL .'/admin/jadwal');
            exit;
        }
    }

    public function getUbahJadwal()
    {
        if (!(isset($_SESSION['auth']))) {
            unset($_SESSION['auth']);
            header('Location:'. BASEURL .'/');
            exit;
        }

        echo json_encode($this->model('Admin_jadwal_model')->getUbahJadwal($_POST['id']));
    }

    public function editJadwal()
    {
        if (!(isset($_SESSION['auth']))) {
            unset($_SESSION['auth']);
            header('Location:'. BASEURL .'/');
            exit;
        }

        if ($this->model('Admin_jadwal_model')->editJadwal($_POST) > 0) {
            Flasher::setFlash('Berhasil', 'Mengubah Jadwal !', 'success', 'admin/jadwal');
            header('Location: '. BASEURL .'/admin/jadwal');
            exit;
        }else {
            Flasher::setFlash('Tidak Ada', 'Data Yang Berubah !', 'warning', 'admin/jadwal');
            header('Location: '. BASEURL .'/admin/jadwal');
            exit;
        }
    }


    // dokumen

    public function dokumen()
    {
        if (!(isset($_SESSION['auth']))) {
            unset($_SESSION['auth']);
            header('Location:'. BASEURL .'/');
            exit;
        }

      
        $data = $this->model('Admin_model')->getAllDokumen();

        $this->view('admin/dashboard/templates/header');
        $this->view('admin/dashboard/dokumen', $data);
        $this->view('admin/dashboard/templates/footer');
    }



    // seleksi


    public function seleksi()
    {
        if (!(isset($_SESSION['auth']))) {
            unset($_SESSION['auth']);
            header('Location:'. BASEURL .'/');
            exit;
        }

        $data = $this->model('Admin_seleksi_model')->getData();

        $this->view('admin/dashboard/templates/header');
        $this->view('admin/dashboard/seleksi', $data);
        $this->view('admin/dashboard/templates/footer');
    }


    public function getStatus()
    {
        if (!(isset($_SESSION['auth']))) {
            unset($_SESSION['auth']);
            header('Location:'. BASEURL .'/');
            exit;
        }
        
        if ($this->model('Admin_seleksi_model')->getStatus($_POST))
        {
            header('Location:'. BASEURL .'/admin/seleksi');
            exit;
        }

    }
}