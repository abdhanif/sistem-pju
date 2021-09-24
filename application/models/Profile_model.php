<?php
class Profile_model extends CI_Model
{

    public function index()
    {
        $query = $this->db->query("SELECT user.id, user.name, user.email, user.password, user_role.role, user_role.role_id
        FROM user
        JOIN user_role ON user_role.role_id = user.role_id");
        return $query->result();
    }

    public function update()
    {
        $id =  htmlspecialchars($this->input->post('id', true));
        $data = [
            'name'  => htmlspecialchars($this->input->post('name', true)),
            'email' => htmlspecialchars($this->input->post('email', true)),
            'image' => 'default.jpg',
            'password' => htmlspecialchars($this->input->post('password'), true),
            'role_id'  => htmlspecialchars($this->input->post('role_id', true)),
            'is_active' => 1,
            'date_created' => time()
        ];

        $this->db->where('id', $id);
        $this->db->update('user', $data);

        redirect('C_profile');
    }

    public function getAllUserRole()
    {
        $query = $this->db->query("SELECT user_role.role_id, user_role.role
        FROM user_role");
        return $query->result();
    }

    public function getById($id)
    {
        return $this->db->get_where('user', ['id' => $id]);
    }

    public function getProfileById($id)
    {
        return $this->db->get_where('user', ['id' => $id])->row_array();
    }

    public function hapus($id, $user)
    {
        $this->db->where($id);
        $this->db->delete($user);
    }
}
