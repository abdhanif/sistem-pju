<?php
class DataPju_model extends CI_Model
{

    public function getAllDataPju()
    {
        $this->db->select();
        $this->db->from('data_pju');
        $this->db->join('data_kelompok', 'data_kelompok.kode_kelompok = data_pju.kode_kelompok');
        $this->db->order_by("id_pju", "DESC");
        $query = $this->db->get();
        return $query;
    }

    public function search($keyword)
    {
        $this->db->select('*');
        $this->db->from('data_pju');
        $this->db->join('data_kelompok', 'data_kelompok.kode_kelompok = data_pju.kode_kelompok');
        $this->db->like('kode_pju', $keyword);
        return $this->db->get()->result();
    }

    public function tambah()
    {
        $data = [
            'kode_kelompok'  => htmlspecialchars($this->input->post('kode_kelompok', true)),
            'kode_pju'  => htmlspecialchars($this->input->post('kode_pju', true)),
            'alamat_pju'  => htmlspecialchars($this->input->post('alamat_pju', true)),
            'lat'  => htmlspecialchars($this->input->post('lat', true)),
            'lng'  => htmlspecialchars($this->input->post('lng', true))
        ];

        $this->db->insert('data_pju', $data);
        redirect('C_data_pju');
    }

    public function kode()
    {
        $this->db->select('RIGHT(data_pju.kode_pju,2) as kode_pju', FALSE);
        $this->db->order_by('kode_pju', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('data_pju');  //cek dulu apakah ada sudah ada kode di tabel.    
        if ($query->num_rows() <> 0) {
            //cek kode jika telah tersedia    
            $data = $query->row();
            $kode = intval($data->kode_pju) + 1;
        } else {
            $kode = 1;  //cek jika kode belum terdapat pada table
        }
        $batas = str_pad($kode, 3, "0", STR_PAD_LEFT);
        $kodetampil = "PJU" . "-" . $batas;  //format kode
        return $kodetampil;
    }

    public function hapus($id_pju, $data_pju)
    {
        $this->db->where($id_pju);
        $this->db->delete($data_pju);
    }

    public function update()
    {
        $id_pju =  htmlspecialchars($this->input->post('id_pju', true));
        $data = [
            'kode_kelompok'  => htmlspecialchars($this->input->post('kode_kelompok', true)),
            'kode_pju'  => htmlspecialchars($this->input->post('kode_pju', true)),
            'alamat_pju'  => htmlspecialchars($this->input->post('alamat_pju', true)),
            'lat'  => htmlspecialchars($this->input->post('lat', true)),
            'lng'  => htmlspecialchars($this->input->post('lng', true))
        ];

        $this->db->where('id_pju', $id_pju);
        $this->db->update('data_pju', $data);

        redirect('C_data_pju');
    }

    public function getById($id_pju)
    {
        return $this->db->get_where('data_pju', ['id_pju' => $id_pju]);
    }

    public function getDataPjuById($id_pju)
    {
        return $this->db->get_where('data_pju', ['id_pju' => $id_pju])->row_array();
    }

    function getDataPjuByKodeKelompok($kode_kelompok)
    {
        $query = $this->db->get_where('data_pju', array('kode_kelompok' => $kode_kelompok));
        return $query;
    }

    function getDataPjuRute($kode_kelompok)
    {
        $this->db->select('*');
        $this->db->from('jadwal');
        $this->db->join('data_pju', 'data_pju.kode_pju = jadwal.kode_pju');
        $this->db->where('jadwal.kode_kelompok', $kode_kelompok);
        $query = $this->db->get();
        return $query;
    }
}