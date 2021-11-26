<?php
class Kelompok_model extends CI_Model
{
    private $table = "data_kelompok";
    public function getAllKelompok($limit, $start)
    {
        $this->db->order_by("data_kelompok.id_kelompok ASC");
        $this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    public function totalRows()
    {
        $this->db->select();
        $this->db->from('data_kelompok');
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function search($keyword)
    {
        $this->db->select('*');
        $this->db->from('data_kelompok');
        $this->db->like('nama_kelompok', $keyword);
        return $this->db->get()->result();
    }

    public function tambah()
    {
        $data = [
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
            // 'kode_kelompok'  => htmlspecialchars($this->input->post('kode_kelompok', true)),
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