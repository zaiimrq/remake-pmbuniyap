<?php 

class Home extends Controller
{
    public function index()
    {
        if (isset($_SESSION['auth']['login'])) {
            header('Location:'. BASEURL .'/dashboard/index/'. $_SESSION['auth']['login']);
            exit;
        }
        $data = $this->model('Cama_model')->getPeriode();
        $this->view('home/templates/header');
        $this->view('home/index', $data);
        $this->view('home/templates/footer');
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
       if ($this->model('Cama_model')->register($_POST) > 0) {
            Flasher::setFlash('Berhasil', 'melakukan register, silahkan login menggunakan nomor pendafataran!', 'success');
            header('Location: '. BASEURL .'/');
            exit;
        } else {
            Flasher::setFlash('Gagal', 'melakukan register, silahkan hubungi admin!', 'danger');
            header('Location: '. BASEURL .'/');
            exit;
       }
    }

    public function login()
    {
        if ($this->model('Cama_model')->login($_POST) > 0) {
            Flasher::setFlash('Berhasil', 'Silahkan lengkapi data diri anda!', 'success');
            header('Location: '. BASEURL .'/dashboard/index/'. $_SESSION['auth']['login']);
            exit;
        } else {
            Flasher::setFlash('Gagal', 'melakukan login !', 'danger');
            header('Location: '. BASEURL .'/');
            exit;
       }
    }


}