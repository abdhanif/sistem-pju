<?php
class Kelompok_model extends CI_Model
{
    private $table = "data_kelompok";
    public function getAllKelompok()
    {
        $this->db->order_by("data_kelompok.kode_kelompok ASC");
        return $this->db->get($this->table)->result();
    }

    // public function search($keyword)
    // {
    //     $this->db->select('*');
    //     $this->db->from('merchant');
    //     $this->db->like('name_merchant', $keyword);
    //     return $this->db->get()->result();
    // }

    public function tambah()
    {
        $data = [
            'kode_kelompok'  => htmlspecialchars($this->input->post('kode_kelompok', true)),
            'nama_kelompok'  => htmlspecialchars($this->input->post('nama_kelompok', true)),
        ];

        $this->db->insert('data_kelompok', $data);
        redirect('C_kelompok');
    }

    public function hapus($id_kelompok, $kelompok)
    {
        $this->db->where($id_kelompok);
        $this->db->delete($kelompok);
    }

    public function update()
    {
        $id_kelompok =  htmlspecialchars($this->input->post('id_kelompok', true));
        $data = [
            'kode_kelompok'  => htmlspecialchars($this->input->post('kode_kelompok', true)),
            'nama_kelompok'  => htmlspecialchars($this->input->post('nama_kelompok', true))
        ];

        $this->db->where('id_kelompok', $id_kelompok);
        $this->db->update('data_kelompok', $data);

        redirect('C_kelompok');
    }

    public function getById($id_kelompok)
    {
        return $this->db->get_where('data_kelompok', ['id_kelompok' => $id_kelompok]);
    }

    public function getKelompokById($id_kelompok)
    {
        return $this->db->get_where('data_kelompok', ['id_kelompok' => $id_kelompok])->row_array();
    }
}
