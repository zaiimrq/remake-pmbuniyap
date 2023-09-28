<?php 


class Admin_seleksi_model
{
    protected $db;
    public function __construct()   
    {
        $this->db = new Database;
    }


    public function getData()
    {
        $query = "SELECT cama.nisn, cama.kode_prodi, cama.nama, cama.hasil_seleksi, pendaftaran.no_pendaftar, prog_studi.kode_prodi, prog_studi.prodi FROM cama JOIN pendaftaran ON cama.nisn = pendaftaran.nisn LEFT JOIN prog_studi ON cama.kode_prodi = prog_studi.kode_prodi";

        $this->db->query($query);
        return $this->db->getAll();
    }

    public function getStatus($data)
    {
        $this->db->query("UPDATE cama SET hasil_seleksi = :hasil WHERE nisn = :nisn");

        $this->db->bind('hasil', strtoupper($data['status']));
        $this->db->bind('nisn', $data['nisn']);
        $this->db->execute();
        return true;
    }
}