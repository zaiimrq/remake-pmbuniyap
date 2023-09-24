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
        $this->db->query('SELECT nisn FROM cama WHERE nisn=:nisn');
        $this->db->bind('nisn', $data['nisn']);
        if ($this->db->getRow() > 0) {
            return $data['nisn'];
        } else {
            $query = "INSERT INTO cama SET
                        nisn=:nisn,
                        nama=:nama,
                        email=:email";
            $this->db->query($query);
            $this->db->bind('nisn', $data['nisn']);
            $this->db->bind('nama', $data['nama']);
            $this->db->bind('email', $data['email']);
    
            if ($this->db->getRow() > 0) {
                $this->db->query("INSERT INTO dokumen SET nisn=:nisn");
                $this->db->bind('nisn', $data['nisn']);
                if ($this->db->getRow() > 0) {
                    $password = password_hash($data['password'], PASSWORD_DEFAULT);
                    $this->db->query("INSERT INTO pendaftaran SET no_pendaftar=:no_pendaftar, nisn=:nisn, password=:password");
                    $this->db->bind('no_pendaftar', $data['noPendaftaran']);
                    $this->db->bind('nisn', $data['nisn']);
                    $this->db->bind('password', $password);
                }
            }
            return $this->db->getRow();
        }

      
    }

    public function login($data)
    {
        $nopen = intval($data['nopen']);
        $this->db->query('SELECT no_pendaftar, nisn, password FROM pendaftaran WHERE no_pendaftar=:pendaftar');
        $this->db->bind('pendaftar', $nopen);

        $credential = $this->db->get();
 
        if ($this->db->getRow() > 0) {
            if (password_verify($data['password'], $credential['password'])) {
                Flasher::setSession('login', $credential['nisn']);
                return $this->db->getRow();
            }
        }
    }

    public function getCama($nisn)
    {
        $query = "SELECT cama.*, pendaftaran.no_pendaftar, jadwal_pendaftaran.*, prog_studi.* FROM cama JOIN pendaftaran ON pendaftaran.nisn = cama.nisn JOIN jadwal_pendaftaran ON jadwal_pendaftaran.id_jadwal=:id_jadwal LEFT JOIN prog_studi ON cama.kode_prodi = prog_studi.kode_prodi WHERE cama.nisn = :nisn";

        $this->db->query($query);
        $this->db->bind('nisn', $nisn);
        $this->db->bind('id_jadwal', 2);
        return $this->db->getAll();
    }

    public function formulir($data)
    {
        $this->db->query("SELECT is_submit FROM cama WHERE nisn=:nisn");
        $this->db->bind('nisn', $data['nisn']);
        $submit = $this->db->get();
        
        if (is_null($submit['is_submit'])) {
            // echo "<script>alert('ok')</script>";
            $query = "UPDATE cama SET nama=:nama, kode_prodi=:kode_prodi, no_hp=:tlp, email=:email, thn_lulus=:thn_lulus, jalur_masuk=:jalur_masuk, asal_sekolah=:asal_sekolah, is_submit=1 WHERE nisn=:nisn";
    
            $this->db->query($query);
            $this->db->bind('nisn', $data['nisn']);
            $this->db->bind('nama', $data['nama']);
            $this->db->bind('tlp', $data['tlp']);
            $this->db->bind('email', $data['email']);
            $this->db->bind('thn_lulus', $data['thn_lulus']);
            $this->db->bind('jalur_masuk', $data['jalur_masuk']);
            $this->db->bind('kode_prodi', $data['prodi']);
            $this->db->bind('asal_sekolah', $data['asal_sekolah']);
    
            return $this->db->getRow();
        } else {
            return 'not';
            // echo "<script>alert('not')</script>";
        }
    }

    public function upload($data)
    {
        $this->db->query("SELECT is_submit FROM dokumen WHERE nisn=:nisn");
        $this->db->bind('nisn', $data[1]);
        $submit = $this->db->get();
        
        if (is_null($submit['is_submit'])) {
            $dok = $data[0]['dokumen'];
            $query = "UPDATE dokumen SET dokumen=:dokumen, is_submit=1 WHERE nisn=:nisn";
            $this->db->query($query);
            $this->db->bind('dokumen', $dok['name']);
            $this->db->bind('nisn', $data[1]);
    
            var_dump($this->db->getRow());
        } else {
            return 'not';
        }
        // var_dump($data[0]['dokumen']['name']);
    }


    public function pengumuman($nisn)
    {
        $this->db->query("SELECT hasil_seleksi FROM cama WHERE nisn=$nisn");
        $hasil = $this->db->get();
        if (is_null($hasil['hasil_seleksi'])) {
            return "not";
        } else {
            $query = "SELECT cama.nisn, cama.nama, cama.hasil_seleksi, pendaftaran.no_pendaftar, prog_studi.prodi FROM cama JOIN pendaftaran ON cama.nisn=pendaftaran.nisn LEFT JOIN prog_studi ON cama.kode_prodi=prog_studi.kode_prodi WHERE cama.nisn=:nisn";
            $this->db->query($query);
            $this->db->bind('nisn', $nisn);
            return $this->db->get();
        }
    }

}