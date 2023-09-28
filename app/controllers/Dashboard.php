<?php 


class Dashboard extends Controller
{
    public function index($nopen = [])
    {

        if (!isset($_SESSION['login'])) {
            header('Location: '. BASEURL .'/');
            exit;
        }

        if ($_SESSION['login'] == $nopen) {    
            $cama = $this->model('Cama_model')->getCama($nopen);
            $prodi = $this->model('Cama_model')->getProdi();
            
            
            $data = [
                "cama" => $cama[0],
                "prodi" => $prodi
            ];
    
            // var_dump($data);
    
            $this->view('dashboard/templates/header', $data);
            $this->view('dashboard/index',  $data);
            $this->view('dashboard/templates/footer');
        } else {
            if (isset($_SESSION['login'])) {
                header('Location:'. BASEURL .'/dashboard/index/'. $_SESSION['login']);
                exit;
            }
        }
        // $nopen = intval($nopen);
    }


    public function formulir()
    {
        
        if ($this->model('Cama_model')->formulir($_POST) === "not") {
            Flasher::setFlash('Mohon maaf,', 'Anda Sudah Mengisi Data Diri !, Hubungi Admin Jika Ada Kesalahan', 'warning', 'dashboard');
            header('Location: '. BASEURL .'/dashboard');
            exit;    
        } else {
            if ($this->model('Cama_model')->formulir($_POST) > 0) {
                Flasher::setFlash('Berhasil', 'Melengkapi Data Diri !', 'success', 'dashboard');
                header('Location: '. BASEURL .'/dashboard');
                exit;
            }else {
                Flasher::setFlash('Gagal,', 'Melengkapi Data Diri !', 'danger', 'dashboard');
                header('Location: '. BASEURL .'/dashboard');
                exit;
            }
        }
      
   
    }

    public function upload($nisn = [])
    {
        // $this->model('Cama_model')->upload([$_FILES, $nisn]);
        // var_dump($_FILES);
        if (isset($_FILES['dokumen'])) {
            if ($_FILES['dokumen']['error'] == 4) {
                Flasher::setFlash('Perhatian,', 'Pastikan Anda Telah Memilih Dokumen !', 'warning', 'dashboard');
                header('Location: '. BASEURL .'/dashboard');
                exit;
            }

            if ($this->model('Cama_model')->upload([$_FILES, $nisn]) == 'not') {
                Flasher::setFlash('Perhatian ', 'Anda Sudah Upload Dokumen ! Hubungi Admin Jika Ada Kesalahan', 'warning', 'dashboard');
                header('Location: '. BASEURL .'/dashboard');
                exit;
            } else {
                if ($this->model('Cama_model')->upload([$_FILES, $nisn]) > 0) {
                    $dokName = $_FILES['dokumen']['name'];
                    $dokName = $nisn . '-' . $dokName;
                    move_uploaded_file($_FILES['dokumen']['tmp_name'], 'storage/'. $dokName);
                    Flasher::setFlash('Berhasil', 'Dokumen Anda Telah Di Upload !', 'success', 'dashboard');
                    header('Location: '. BASEURL .'/dashboard');
                    exit;
                } else {
                    Flasher::setFlash('Gagal', 'Dokumen Anda Gagal Di Upload', 'danger', 'dashboard');
                    header('Location: '. BASEURL .'/dashboard');
                    exit;
                }
            }


        }
    }

    public function pengumuman()
    {
        // var_dump($_SERVER['REQUEST_URI']);
        $data = $this->model('Cama_model')->pengumuman($_SESSION['login']);
        // var_dump($data);
        if ($data == "not") {
            Flasher::setFlash('Perhatian', 'Data Sedang Di Validasi Cek Kembali Pada Tanggal 01 Oktober 2023', 'warning', 'dashboard');
            header('Location: '. BASEURL .'/dashboard');
            exit;
        }

        $this->view('dashboard/templates/header');
        $this->view('dashboard/pengumuman', $data);
        $this->view('home/templates/footer');
    }
}