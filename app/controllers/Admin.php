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
        echo "ok";
    }

}