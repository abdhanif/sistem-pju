<?php
class Coba extends CI_Model
{

    public function getAllDataPju()
    {
        $this->db->select();
        $this->db->from('data_pju');
        $this->db->join('data_kelompok', 'data_kelompok.kode_kelompok = data_pju.kode_kelompok');
        $this->db->order_by("data_pju.id_pju", "DESC");
        $query = $this->db->get();
        return $query->result();
    }

    public function lihat($id_pju)
    {
        $this->db->select('*');
        $this->db->from('data_pju');
        $this->db->where('id_pju', $id_pju);

        return $this->db->get();
    }
}
