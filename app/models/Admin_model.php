<?php 


class Admin_model
{
    protected $db;
    public function __construct()
    {
        $this->db = new Database;
    }

    public function auth($data)
    {
        $this->db->query("SELECT username, password FROM user WHERE username=:username");
        $this->db->bind('username', $data['username']);
        $admin = $this->db->get();

        if(password_verify($data['password'], $admin['password'])) {

            $token = password_hash($admin['username'], PASSWORD_DEFAULT);
            
            Flasher::setSession('auth', $token);

            return true;
        }
    }

    public function getAllMahasiswa()
    {
        $this->db->query("SELECT cama.*, pendaftaran.no_pendaftar FROM cama JOIN pendaftaran ON cama.nisn = pendaftaran.nisn");
        return $this->db->getAll();
    }

    public function addMahasiswa($data)
    {
        $cama = $data['cama'];
        $dokumen = $data['dokumen']['dokumen'];
        // var_dump($data);
        $query = "INSERT INTO cama SET nisn=:nisn, nama=:nama, kode_prodi=:kode_prodi, no_hp=:tlp, email=:email, thn_lulus=:thn_lulus, jalur_masuk=:jalur_masuk, asal_sekolah=:asal_sekolah, is_submit=1";

        $this->db->query($query);
        $this->db->bind('nisn', $cama['nisn']);
        $this->db->bind('nama', $cama['nama']);
        $this->db->bind('tlp', $cama['tlp']);
        $this->db->bind('email', $cama['email']);
        $this->db->bind('thn_lulus', $cama['thn_lulus']);
        $this->db->bind('jalur_masuk', $cama['jalur_masuk']);
        $this->db->bind('kode_prodi', $cama['kode_prodi']);
        $this->db->bind('asal_sekolah', $cama['asal_sekolah']);
        // $this->db->bind('is_submit', 1);

        if ($this->db->getRow() > 0) {

            $this->db->query("SELECT is_submit FROM cama WHERE nisn=:nisn AND is_submit=1");
            $this->db->bind('nisn', $cama['nisn']);
            if ($this->db->getRow() > 0) {
                
                $this->db->query("INSERT INTO pendaftaran SET no_pendaftar=:no_pendaftar, nisn=:nisn, password=:password");
    
                $password = password_hash($cama['password'], PASSWORD_DEFAULT);
                $this->db->bind('no_pendaftar', $cama['no_pendaftar']);
                $this->db->bind('nisn', $cama['nisn']);
                $this->db->bind('password', $password); 
                $this->db->execute();     
            }
            if (isset($dokumen)) {
                $tmp = $dokumen['tmp_name'];
                $name = $dokumen['name'];
                $error = $dokumen['error'];

                if ($error == 0) {
                    $this->db->query("INSERT INTO dokumen SET nisn=:nisn, dokumen=:dokumen, is_submit=1");
                    $this->db->bind('nisn', $cama['nisn']);
                    $this->db->bind('dokumen', $name);
                    if ($this->db->getRow() > 0) {
                        $path = $cama['nisn']. '-' .$cama['nama'];
                        move_uploaded_file($tmp, '../app/storage/'. $path);
                    }
                }
            }
        }
        // var_dump($this->db->getRow());
        return 1;
    }
}