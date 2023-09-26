<?php 


class Admin_prodi_model
{
    protected $db;
    public function __construct()
    {
        $this->db = new Database;
    }


    public function addProdi($data)
    {
        $this->db->query("INSERT INTO prog_studi SET
                            kode_prodi=:kode_prodi,
                            prodi=:prodi,
                            fakultas=:fakultas,
                            akreditasi=:akreditasi");
        $this->db->bind('kode_prodi', $data['kode']);
        $this->db->bind('prodi', $data['prodi']);
        $this->db->bind('fakultas', $data['fakultas']);
        $this->db->bind('akreditasi', $data['akreditasi']);

        return $this->db->getRow();
    }

    public function deleteProdi($kode_prodi)
    {
        $this->db->query("DELETE FROM prog_studi WHERE kode_Prodi=:kode_prodi");
        $this->db->bind('kode_prodi', $kode_prodi);
        return $this->db->getRow();
    }

    public function getEditProdi($kode)
    {
        $this->db->query('SELECT * FROM prog_studi WHERE kode_prodi=:kode');
        $this->db->bind('kode', $kode);
        return $this->db->get();
    }

    public function editProdi($data)
    {
        var_dump($data);
        $this->db->query("UPDATE prog_studi SET 
                            kode_prodi=:kode,
                            prodi=:prodi,
                            fakultas=:fakultas,
                            akreditasi=:akreditasi WHERE kode_prodi=:kode");
        $this->db->bind('kode', $data['kode']);
        $this->db->bind('prodi', $data['prodi']);
        $this->db->bind('fakultas', $data['fakultas']);
        $this->db->bind('akreditasi', $data['akreditasi']);

        return true;
    }
}