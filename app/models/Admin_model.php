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
        // var_dump($data);
        $query = "INSERT INTO cama SET nisn=:nisn, nama=:nama, kode_prodi=:kode_prodi, no_hp=:tlp, email=:email, thn_lulus=:thn_lulus, jalur_masuk=:jalur_masuk, asal_sekolah=:asal_sekolah, is_submit=1";

        $this->db->query($query);
        $this->db->bind('nisn', $data['nisn']);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('tlp', $data['tlp']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('thn_lulus', $data['thn_lulus']);
        $this->db->bind('jalur_masuk', $data['jalur_masuk']);
        $this->db->bind('kode_prodi', $data['kode_prodi']);
        // $this->db->bind('is_submit', 1);

        var_dump($this->db->getRow());
        // return $this->db->getRow();
    }
}