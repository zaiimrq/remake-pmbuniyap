<?php 

class Cama_model
{
    protected $db;

    public function __construct()
    {
        $this->db = new Database;
    }
    public function getPeriode()
    {
        $this->db->query("SELECT agenda, periode_mulai, periode_akhir FROM jadwal_pendaftaran WHERE id_jadwal=:id");
        $this->db->bind('id', 2);

        return $this->db->get();
    }

    public function getProdi()
    {
        $this->db->query("SELECT * FROM prog_studi");
        return $this->db->getAll();
    }

    public function register($data)
    {
        $query = "INSERT INTO cama SET
                    nisn=:nisn,
                    nama=:nama,
                    email=:email";
        $this->db->query($query);
        $this->db->bind('nisn', $data['nisn']);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('email', $data['email']);

        if ($this->db->getRow() > 0) {
            $password = password_hash($data['password'], PASSWORD_DEFAULT);
            $this->db->query("INSERT INTO pendaftaran SET no_pendaftar=:no_pendaftar, nisn=:nisn, password=:password");
            $this->db->bind('no_pendaftar', $data['noPendaftaran']);
            $this->db->bind('nisn', $data['nisn']);
            $this->db->bind('password', $password);
            return $this->db->getRow();
        }
      
    }

    public function login($data)
    {
        $this->db->query('SELECT no_pendaftar, nisn, password FROM pendaftaran WHERE no_pendaftar=:pendaftar');
        $this->db->bind('pendaftar', $data['nopen']);

        $credential = $this->db->getAll();

        if ($this->db->getRow() > 0) {
            if (password_verify($data['password'], $credential[0]['password'])) {
                Flasher::setSession($credential[0]['nisn']);
                return $this->db->getRow();
            }
        }
    }

    public function getCama($nisn)
    {
        $query = 'SELECT cama.*, pendaftaran.no_pendaftar, jadwal_pendaftaran.agenda FROM cama JOIN pendaftaran ON cama.nisn = pendaftaran.nisn JOIN jadwal_pendaftaran ON jadwal_pendaftaran.id_jadwal=:id_jadwal WHERE cama.nisn = :nisn';
        $this->db->query($query);
        $this->db->bind('nisn', $nisn);
        $this->db->bind('id_jadwal', 2);
        return $this->db->getAll();
    }
}