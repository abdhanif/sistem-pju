<?php
class Profile_model extends CI_Model
{

    public function index($limit, $start)
    {
        $this->db->select();
        $this->db->from('table_user');
        $this->db->join('user_akses', 'table_user.user_akses = user_akses.akses_id');
        $this->db->limit($limit, $start);
        return $query->result();
    }

    public function totalRows()
    {
        $this->db->select();
        $this->db->from('table_user');
        $this->db->join('user_akses', 'table_user.user_akses = user_akses.akses_id');
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function update()
    {
        $user_id =  htmlspecialchars($this->input->post('user_id', true));
        $data = [
            'user_name'  => htmlspecialchars($this->input->post('user_name', true)),
            'user_email' => htmlspecialchars($this->input->post('user_email', true)),
            'user_password' => htmlspecialchars($this->input->post('user_password'), true),
            'user_akses'  => htmlspecialchars($this->input->post('user_akses', true)),
            'user_status' => 1,
        ];

        $this->db->where('user_id', $user_id);
        $this->db->update('table_user', $data);

        redirect('C_profile');
    }

    public function getAllUserakses()
    {
        $query = $this->db->query("SELECT user_akses.akses_id, user_akses.akses
        FROM user_akses");
        return $query->result();
    }

    public function getById($user_id)
    {
        return $this->db->get_where('table_user', ['user_id' => $user_id]);
    }

    public function getProfileById($user_id)
    {
        return $this->db->get_where('table_user', ['user_id' => $user_id])->row_array();
    }

    public function hapus($user_id, $user)
    {
        $this->db->where($user_id);
        $this->db->delete($user);
    }
}