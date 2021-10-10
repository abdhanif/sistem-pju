<?php
class Jadwal_model extends CI_Model
{

    public function getAllJadwal()
    {
        $this->db->select();
        $this->db->from('jadwal');
        $this->db->join('data_kelompok', 'data_kelompok.kode_kelompok = jadwal.kode_kelompok');
        $this->db->join('data_pju', 'data_pju.kode_pju = jadwal.kode_pju');
        $this->db->order_by("jadwal.id_jadwal", "DESC");
        $query = $this->db->get();
        return $query->result();
    }
    public function tambah()
    {
        $data = [
            'kode_kelompok'  => htmlspecialchars($this->input->post('kode_kelompok', true)),
            'kode_pju'  => htmlspecialchars($this->input->post('kode_pju', true)),
            'status'  => htmlspecialchars('BELUM')
        ];

        $this->db->insert('jadwal', $data);
        redirect('C_jadwal');
    }

    public function hapus($id_jadwal, $jadwal)
    {
        $this->db->where($id_jadwal);
        $this->db->delete($jadwal);
    }

    public function search($keyword)
    {
        $this->db->select('*');
        $this->db->from('jadwal');
        $this->db->join('data_kelompok', 'data_kelompok.kode_kelompok = jadwal.kode_kelompok');
        $this->db->join('data_pju', 'data_pju.kode_pju = jadwal.kode_pju');
        $this->db->like('id_jadwal', $keyword);
        return $this->db->get()->result();
    }

    public function update()
    {
        $id_jadwal =  htmlspecialchars($this->input->post('id_jadwal', true));
        $data = [
            'kode_kelompok'  => htmlspecialchars($this->input->post('kode_kelompok', true)),
            'kode_pju'  => htmlspecialchars($this->input->post('kode_pju', true)),
            'status'  => htmlspecialchars($this->input->post('status', true)),
            'update_at'  => htmlspecialchars($this->input->post('update_at', true))
        ];

        $this->db->where('id_jadwal', $id_jadwal);
        $this->db->update('jadwal', $data);

        redirect('C_jadwal');
    }

    public function getById($id_jadwal)
    {
        return $this->db->get_where('jadwal', ['id_jadwal' => $id_jadwal]);
    }

    public function getJadwalById($id_jadwal)
    {
        return $this->db->get_where('jadwal', ['id_jadwal' => $id_jadwal])->row_array();
    }

    function get_jadwal_by_id($id_jadwal)
    {
        $query = $this->db->get_where('jadwal', array('id_jadwal' =>  $id_jadwal));
        return $query;
    }

    function get_pju_edit($id_kelompok)
    {
        $query = $this->db->get_where('data_pju', array('kode_kelompok' => $id_kelompok));
        return $query;
    }

    // public function kode()
    // {
    //     $this->db->select('RIGHT(jadwal.kode_jadwal,2) as kode_jadwal', FALSE);
    //     $this->db->order_by('kode_jadwal', 'DESC');
    //     $this->db->limit(1);
    //     $query = $this->db->get('jadwal');  //cek dulu apakah ada sudah ada kode di tabel.    
    //     if ($query->num_rows() <> 0) {
    //         //cek kode jika telah tersedia    
    //         $data = $query->row();
    //         $kode = intval($data->kode_kelompok) + 1;
    //     } else {
    //         $kode = 1;  //cek jika kode belum terdapat pada table
    //     }
    //     $batas = str_pad($kode, 3, "0", STR_PAD_LEFT);
    //     $kodetampil = "J" . "-" . $batas;  //format kode
    //     return $kodetampil;
    // }
}