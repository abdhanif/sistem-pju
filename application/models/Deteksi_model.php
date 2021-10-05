<?php
class Deteksi_model extends CI_Model
{

    public function getAllDeteksi()
    {
        $this->db->select();
        $this->db->from('deteksi_pju');
        $this->db->order_by("deteksi_pju.id_deteksi", "DESC");
        $query = $this->db->get();
        return $query->result();
    }

    // public function search($keyword)
    // {
    //     $this->db->select('*');
    //     $this->db->from('data_pju');
    //     $this->db->join('data_kelompok', 'data_kelompok.kode_kelompok = data_pju.kode_kelompok');
    //     $this->db->like('kode_pju', $keyword);
    //     return $this->db->get()->result();
    // }

    // public function tambah()
    // {
    //     $data = [
    //         'kode_kelompok'  => htmlspecialchars($this->input->post('kode_kelompok', true)),
    //         'kode_pju'  => htmlspecialchars($this->input->post('kode_pju', true)),
    //         'alamat_pju'  => htmlspecialchars($this->input->post('alamat_pju', true)),
    //         'lat'  => htmlspecialchars($this->input->post('lat', true)),
    //         'lng'  => htmlspecialchars($this->input->post('lng', true))
    //     ];

    //     $this->db->insert('data_pju', $data);
    //     redirect('C_data_pju');
    // }

    // public function hapus($id_pju, $data_pju)
    // {
    //     $this->db->where($id_pju);
    //     $this->db->delete($data_pju);
    // }

    // public function update()
    // {
    //     $id_pju =  htmlspecialchars($this->input->post('id_pju', true));
    //     $data = [
    //         'kode_kelompok'  => htmlspecialchars($this->input->post('kode_kelompok', true)),
    //         'kode_pju'  => htmlspecialchars($this->input->post('kode_pju', true)),
    //         'alamat_pju'  => htmlspecialchars($this->input->post('alamat_pju', true)),
    //         'lat'  => htmlspecialchars($this->input->post('lat', true)),
    //         'lng'  => htmlspecialchars($this->input->post('lng', true))
    //     ];

    //     $this->db->where('id_pju', $id_pju);
    //     $this->db->update('data_pju', $data);

    //     redirect('C_data_pju');
    // }

    // public function getById($id_pju)
    // {
    //     return $this->db->get_where('data_pju', ['id_pju' => $id_pju]);
    // }

    // public function getDataPjuById($id_pju)
    // {
    //     return $this->db->get_where('data_pju', ['id_pju' => $id_pju])->row_array();
    // }
}