<?php 

class Home extends Controller
{
    public function index()
    {
        if (isset($_SESSION['auth']['login'])) {
            header('Location:'. BASEURL .'/dashboard/index/'. $_SESSION['auth']['login']);
            exit;
        } else {
            $data = $this->model('Cama_model')->getPeriode();
            $this->view('home/templates/header');
            $this->view('home/index', $data);
            $this->view('home/templates/footer');
        }
    }
    public function prodi()
    {
        $data = $this->model('Cama_model')->getProdi();
        $this->view('home/templates/header');
        $this->view('home/prodi', $data);
        $this->view('home/templates/footer');
    }

    public function register()
    {
        if($this->model('Cama_model')->register($_POST) == $_POST['nisn']){
            Flasher::setFlash('Perhatian', 'NISN Anda Sudah Terdaftar, Silahkan Login Menggunakan Nomor Pendaftaran !', 'warning', 'home');
            header('Location: '. BASEURL .'/');
            exit;
        } else {    
            if ($this->model('Cama_model')->register($_POST) > 0) {
                 Flasher::setFlash('Berhasil', 'melakukan register, silahkan login menggunakan nomor pendafataran!', 'success', 'home');
                 header('Location: '. BASEURL .'/');
                 exit;
             } else {
                 Flasher::setFlash('Gagal', 'melakukan register, silahkan hubungi admin!', 'danger', 'home');
                 header('Location: '. BASEURL .'/');
                 exit;
            }
        }
    }

    public function login()
    {
    
        // $this->model('Cama_model')->login($_POST);

        if ($this->model('Cama_model')->login($_POST) > 0) {
            header('Location: '. BASEURL .'/dashboard/index/'. $_SESSION['auth']['login']);
            Flasher::setFlash('Berhasil Login', 'Silahkan lengkapi data diri anda!', 'success', 'home');
            exit;
        } else {
            Flasher::setFlash('Gagal', 'melakukan login !', 'danger', 'home');
            header('Location: '. BASEURL .'/');
            exit;
       }
    }


}