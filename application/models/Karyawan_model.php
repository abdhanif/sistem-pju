<?php
class Karyawan_model extends CI_Model
{
    private $table = "data_karyawan";
    public function getAllKaryawan()
    {
        $this->db->from($this->table);
        $this->db->order_by("nama", "asc");
        $query = $this->db->get();
        return $query->result();
    }

    public function search($keyword)
    {
        $this->db->select('*');
        $this->db->from('data_karyawan');
        $this->db->like('nama', $keyword);
        return $this->db->get()->result();
    }

    public function tambah()
    {
        $data = [
            'nik'  => htmlspecialchars($this->input->post('nik', true)),
            'nama'  => htmlspecialchars($this->input->post('nama', true)),
            'gender' => htmlspecialchars($this->input->post('gender', true)),
            'tgl_lahir' => htmlspecialchars($this->input->post('tgl_lahir', true)),
            'alamat' => htmlspecialchars($this->input->post('alamat', true)),
            'no_tlpn' => htmlspecialchars($this->input->post('no_tlpn', true)),
            'jabatan' => htmlspecialchars($this->input->post('jabatan', true)),
            'email' => htmlspecialchars($this->input->post('email', true)),
            'status_karyawan' => htmlspecialchars($this->input->post('status_karyawan', true))
        ];

        $this->db->insert('data_karyawan', $data);
        redirect('C_karyawan');
    }

    public function update()
    {
        $id_karyawan =  htmlspecialchars($this->input->post('id_karyawan', true));
        $data = [
            'nik'  => htmlspecialchars($this->input->post('nik', true)),
            'nama'  => htmlspecialchars($this->input->post('nama', true)),
            'gender' => htmlspecialchars($this->input->post('gender', true)),
            'tgl_lahir' => htmlspecialchars($this->input->post('tgl_lahir', true)),
            'alamat' => htmlspecialchars($this->input->post('alamat', true)),
            'no_tlpn' => htmlspecialchars($this->input->post('no_tlpn', true)),
            'jabatan' => htmlspecialchars($this->input->post('jabatan', true)),
            'email' => htmlspecialchars($this->input->post('email', true)),
            'status_karyawan' => htmlspecialchars($this->input->post('status_karyawan', true))
        ];

        $this->db->where("id_karyawan", $id_karyawan);
        $this->db->update('data_karyawan', $data);
        //     $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        //     Selamat! Akun Anda Sudah terdaftar, Silahkan Login!
        //   </div>');
        redirect('C_karyawan');
    }

    public function getById($id_karyawan)
    {
        return $this->db->get_where('data_karyawan', ['id_karyawan' => $id_karyawan]);
    }

    public function getKaryawanById($id_karyawan)
    {
        return $this->db->get_where('data_karyawan', ['id_karyawan' => $id_karyawan])->row_array();
    }

    public function hapus($id_karyawan, $data_karyawan)
    {
        $this->db->where($id_karyawan);
        $this->db->delete($data_karyawan);
    }
}