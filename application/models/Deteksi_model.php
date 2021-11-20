<?php
class Deteksi_model extends CI_Model
{
    public function getAllDeteksi()
    {
        $this->db->select('*');
        $this->db->from('deteksi_pju');
        $this->db->join('data_pju', 'data_pju.kode_pju = deteksi_pju.kode_pju_box');
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

    public function tambah($data)
    {
        $this->db->insert('deteksi_pju', $data);
        redirect('C_landingpage');
    }

    // public function hapus($id_pju, $data_pju)
    // {
    //     $this->db->where($id_pju);
    //     $this->db->delete($data_pju);
    // }

    public function update()
    {
        $id_deteksi =  htmlspecialchars($this->input->post('id_deteksi', true));
        $data = [
            'verifikasi'  => 'DISETUJUI'
        ];

        $this->db->where('id_deteksi', $id_deteksi);
        $this->db->update('deteksi_pju', $data);


        redirect('C_deteksi');
    }

    public function insertToJadwal($kode_pju_box)
    {
        //Generate Kode Untuk Insert Jadwal
        $this->db->select('RIGHT(jadwal.kode_jadwal,2) as kode_jadwal', FALSE);
        $this->db->order_by('kode_jadwal', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('jadwal');  //cek dulu apakah ada sudah ada kode di tabel.    
        if ($query->num_rows() <> 0) {
            //cek kode jika telah tersedia    
            $data = $query->row();
            $kode = intval($data->kode_jadwal) + 1;
        } else {
            $kode = 1;  //cek jika kode belum terdapat pada table
        }
        $batas = str_pad($kode, 3, "0", STR_PAD_LEFT);
        $kodetampil = "J" . "-" . $batas;  //format kode

        //Insert Jadwal
        $dataPju = $this->db->get_where('data_pju', ['kode_pju' => $kode_pju_box])->row();
        var_dump($dataPju);
        var_dump($kode_pju_box);
        $dataInsertJadwal = [
            'kode_jadwal'  => $kodetampil,
            'kode_kelompok'  => $dataPju->kode_kelompok,
            'kode_pju'  => $dataPju->kode_pju,
            'status'  => 'BELUM'
        ];
        //END Insert Jadwal

        return $this->db->insert('jadwal', $dataInsertJadwal);
    }

    public function getById($id_deteksi)
    {
        return $this->db->get_where('deteksi_pju', ['id_deteksi' => $id_deteksi]);
    }

    public function getDeteksiPjuById($id_deteksi)
    {
        return $this->db->get_where('deteksi_pju', ['id_deteksi' => $id_deteksi])->row_array();
    }

    private function _uploadImage()
    {
        $config['upload_path']          = './upload/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['file_name']            = $this->id_deteksi;
        $config['overwrite']            = true;
        $config['max_size']             = 1024; // 1MB
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('gambar')) {
            return $this->upload->data("file_name");
        }

        return "default.jpg";
    }
}