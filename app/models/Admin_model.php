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
        $this->db->query("SELECT cama.*, pendaftaran.no_pendaftar FROM cama JOIN pendaftaran ON cama.nisn = pendaftaran.nisn ORDER BY cama.nama ASC");
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

                $this->db->query("INSERT INTO dokumen SET nisn=:nisn, dokumen=:dokumen");
                $this->db->bind('nisn', $cama['nisn']);
                $this->db->bind('dokumen', $name);
                if ($this->db->getRow() > 0) {
                    $path = $cama['nisn']. '-' .$cama['nama']. '.pdf';
                    move_uploaded_file($tmp, '../app/storage/'. $path);
                }
            }
        }
        return 1;
    }

    public function hapus($nisn)
    {
        $this->db->query("DELETE FROM cama WHERE nisn=:nisn");
        $this->db->bind('nisn', $nisn);
        if ($this->db->getRow() > 0) {
            $path = 'storage/'. $nisn .'-*';

            $file = glob($path);

            foreach ($file as $f) {
                if (is_file($f)) {
                    unlink($f);
                }
            }
        }

        return 1;
    }


    public function getUbah($nisn)
    {
        $this->db->query("SELECT cama.*, pendaftaran.no_pendaftar FROM cama JOIN pendaftaran ON cama.nisn = pendaftaran.nisn WHERE cama.nisn = :nisn");
        $this->db->bind('nisn', $nisn);
        return $this->db->get();
    }

    public function ubah($data)
    {
        $this->db->query("UPDATE cama SET 
                        nisn=:nisn,
                        kode_prodi=:kode_prodi,
                        nama=:nama,
                        email=:email,
                        thn_lulus=:thn_lulus,
                        jalur_masuk=:jalur_masuk,
                        no_hp=:no_hp,
                        asal_sekolah=:asal_sekolah
                        WHERE nisn=:nisn");

        $this->db->bind('nisn', $data[0]['nisn']);
        $this->db->bind('kode_prodi', $data[0]['kode_prodi']);
        $this->db->bind('nama', $data[0]['nama']);
        $this->db->bind('email', $data[0]['email']);
        $this->db->bind('thn_lulus', $data[0]['thn_lulus']);
        $this->db->bind('jalur_masuk', $data[0]['jalur_masuk']);
        $this->db->bind('no_hp', $data[0]['tlp']);
        $this->db->bind('asal_sekolah', $data[0]['asal_sekolah']);


        if ($this->db->getRow() > 0) {
            if (isset($data[1]['dokumen'])) {
                $dokumen = $data[1]['dokumen'];
                $tmp = $dokumen['tmp_name'];
                $name = $dokumen['name'];

                $this->db->query("UPDATE dokumen SET dokumen=:dokumen WHERE nisn=:nisn");
                $this->db->bind('nisn', $data[0]['nisn']);
                $this->db->bind('dokumen', $name);
                if ($this->db->getRow() > 0) {
                    $path = $data[0]['nisn']. '-' .$data[0]['nama']. '.pdf';
                    move_uploaded_file($tmp, 'storage/'. $path);
                }
            }

            return 1;
        }

    }

    public function getAllDokumen()
    {
        $this->db->query("SELECT dokumen.*, cama.nama FROM dokumen JOIN cama ON dokumen.nisn = cama.nisn");
        return $this->db->getAll();
    }
}