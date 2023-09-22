<?php 


class Dashboard extends Controller
{
    public function index($nopen = [])
    {
        if (!isset($_SESSION['auth']['login'])) {
            header('Location: '. BASEURL .'/');
        }
        $data = $this->model('Cama_model')->getCama($nopen);
        $prodi = $this->model('Cama_model')->getProdi();
        // var_dump($prodi);
        // exit;
        $data = $data[0];
        $this->view('dashboard/templates/header');
        $this->view('dashboard/index',  $data);
        $this->view('home/templates/footer');
    }
}