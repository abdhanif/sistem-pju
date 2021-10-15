<?php
class Kelompok_model extends CI_Model
{
    private $table = "data_kelompok";
    public function getAllKelompok()
    {
        $this->db->order_by("data_kelompok.kode_kelompok ASC");
        return $this->db->get($this->table)->result();
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

    public function kode()
    {
        $this->db->select('RIGHT(data_kelompok.kode_kelompok,2) as kode_kelompok', FALSE);
        $this->db->order_by('kode_kelompok', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('data_kelompok');  //cek dulu apakah ada sudah ada kode di tabel.    
        if ($query->num_rows() <> 0) {
            //cek kode jika telah tersedia    
            $data = $query->row();
            $kode = intval($data->kode_kelompok) + 1;
        } else {
            $kode = 1;  //cek jika kode belum terdapat pada table
        }
        $batas = str_pad($kode, 3, "0", STR_PAD_LEFT);
        $kodetampil = "W" . "-" . $batas;  //format kode
        return $kodetampil;
    }
}