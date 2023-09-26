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
        // var_dump($_POST);
        
        $data['cama'] = $_POST;
        $data['dokumen'] = $_FILES;
        // $this->model('Admin_model')->addMahasiswa($data);

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
        $data = $this->model('Admin_model')->getUbah($_POST['nisn']);

        echo json_encode($data);
    }

    public function ubah()
    {
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
        $data = $this->model('Cama_model')->getProdi();

        $this->view('admin/dashboard/templates/header');
        $this->view('admin/dashboard/prodi', $data);
        $this->view('admin/dashboard/templates/footer');
    }

    public function addProdi()
    {
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
        echo json_encode($this->model('Admin_prodi_model')->getEditProdi($_POST['kode']));
    }

    public function editProdi()
    {
        if ($this->model('Admin_prodi_model')->editProdi($_POST)) {
            Flasher::setFlash('Berhasil', 'Edit Program Studi !', 'success', 'admin/prodi');
            header('Location: '. BASEURL .'/admin/prodi');
            exit;
        }else {
            Flasher::setFlash('Gagal', 'Edit Program Studi !', 'danger', 'admin/prodi');
            header('Location: '. BASEURL .'/admin/prodi');
            exit;
        }
    }
}