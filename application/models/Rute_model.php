<?php
class Rute_model extends CI_Model
{

    public function getAllRute()
    {
        $this->db->select('*');
        $this->db->from('jadwal');
        $this->db->join('data_kelompok', 'data_kelompok.id_kelompok = jadwal.id_kelompok');
        $this->db->join('data_pju', 'data_pju.kode_pju = jadwal.kode_pju');
        $this->db->group_by('jadwal.id_kelompok');
        $query = $this->db->get();
        return $query->result();
    }

    public function search_rute($keyword)
    {
        $this->db->select('*');
        $this->db->from('jadwal');
        $this->db->join('data_kelompok', 'data_kelompok.id_kelompok = jadwal.id_kelompok');
        $this->db->join('data_pju', 'data_pju.kode_pju = jadwal.kode_pju');
        $this->db->like('jadwal.id_kelompok', $keyword);
        return $this->db->get()->result();
    }
}