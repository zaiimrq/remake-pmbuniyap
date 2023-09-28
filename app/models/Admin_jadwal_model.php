<?php 



class Admin_jadwal_model
{
    protected $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getJadwal()
    {
        $this->db->query("SELECT * FROM jadwal_pendaftaran ORDER BY periode_mulai ASC");
        return $this->db->getAll();
    }

    public function addJadwal($data)
    {
        $this->db->query("INSERT INTO jadwal_pendaftaran SET 
                            agenda=:agenda,
                            periode_mulai=:mulai,
                            periode_akhir=:akhir");
        $this->db->bind('agenda', $data['agenda']);
        $this->db->bind('mulai', $data['periode_mulai']);
        $this->db->bind('akhir', $data['periode_akhir']);

        return $this->db->getRow();
    }


    public function deleteJadwal($id)
    {
        $this->db->query("DELETE FROM  jadwal_pendaftaran WHERE id_jadwal=:id_jadwal");
        $this->db->bind('id_jadwal', $id);
        return $this->db->getRow();
    }

    public function getUbahJadwal($id)
    {
        $this->db->query("SELECT * FROM jadwal_pendaftaran WHERE id_jadwal=:id");
        $this->db->bind('id', $id);
        return $this->db->get();
    }

    public function editJadwal($data)
    {
        $this->db->query("UPDATE jadwal_pendaftaran SET 
                            agenda=:agenda,
                            periode_mulai=:mulai,
                            periode_akhir=:akhir WHERE id_jadwal=:id_jadwal");
        $this->db->bind('agenda', $data['agenda']);
        $this->db->bind('mulai', $data['periode_mulai']);
        $this->db->bind('akhir', $data['periode_akhir']);
        $this->db->bind('id_jadwal', $data['id_jadwal']);

        return $this->db->getRow();
    }
}