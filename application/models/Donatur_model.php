<?php
class Donatur_model extends CI_Model
{
    private $table = "donatur";
    public function getAllDonatur()
    {
        $this->db->from($this->table);
        $this->db->order_by("name", "asc");
        $query = $this->db->get();
        return $query->result();
    }

    public function search($keyword)
    {
        $this->db->select('*');
        $this->db->from('donatur');
        $this->db->like('name', $keyword);
        return $this->db->get()->result();
    }

    public function tambah()
    {
        $data = [
            'nik'  => htmlspecialchars($this->input->post('nik', true)),
            'name'  => htmlspecialchars($this->input->post('name', true)),
            'gender' => htmlspecialchars($this->input->post('gender', true)),
            'tgl_lahir' => htmlspecialchars($this->input->post('tgl_lahir', true)),
            'alamat' => htmlspecialchars($this->input->post('alamat', true)),
            'no_tlpn' => htmlspecialchars($this->input->post('no_tlpn', true)),
            'hobi' => htmlspecialchars($this->input->post('hobi', true)),
            'status' => htmlspecialchars($this->input->post('status', true)),
            'pekerjaan' => htmlspecialchars($this->input->post('pekerjaan', true)),
            'email' => htmlspecialchars($this->input->post('email', true)),
            'status_donatur' => htmlspecialchars($this->input->post('status_donatur', true)),
        ];

        $this->db->insert('donatur', $data);
        redirect('C_donatur');
    }

    public function update()
    {
        $id_donatur =  htmlspecialchars($this->input->post('id_donatur', true));
        $data = [
            'nik'  => htmlspecialchars($this->input->post('nik', true)),
            'name'  => htmlspecialchars($this->input->post('name', true)),
            'gender' => htmlspecialchars($this->input->post('gender', true)),
            'tgl_lahir' => htmlspecialchars($this->input->post('tgl_lahir', true)),
            'alamat' => htmlspecialchars($this->input->post('alamat', true)),
            'no_tlpn' => htmlspecialchars($this->input->post('no_tlpn', true)),
            'hobi' => htmlspecialchars($this->input->post('hobi', true)),
            'status' => htmlspecialchars($this->input->post('status', true)),
            'pekerjaan' => htmlspecialchars($this->input->post('pekerjaan', true)),
            'email' => htmlspecialchars($this->input->post('email', true)),
            'status_donatur' => htmlspecialchars($this->input->post('status_donatur', true)),
        ];

        $this->db->where("id_donatur", $id_donatur);
        $this->db->update('donatur', $data);
        //     $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        //     Selamat! Akun Anda Sudah terdaftar, Silahkan Login!
        //   </div>');
        redirect('C_donatur');
    }

    public function getById($id_donatur)
    {
        return $this->db->get_where('donatur', ['id_donatur' => $id_donatur]);
    }

    public function getDonaturById($id_donatur)
    {
        return $this->db->get_where('donatur', ['id_donatur' => $id_donatur])->row_array();
    }

    public function hapus($id_donatur, $donatur)
    {
        $this->db->where($id_donatur);
        $this->db->delete($donatur);
    }
}
