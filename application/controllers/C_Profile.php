<?php
class C_profile extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Profile_model');
        $this->load->library('form_validation');
        $this->load->helper('text');
    }

    public function index()
    {
        $data['profile'] = $this->Profile_model->index();
        $role['user_role'] = $this->Profile_model->getAllUserRole();

        $this->load->view('backend/templates/header');
        $this->load->view('backend/templates/sidebar');
        $this->load->view('backend/templates/topbar');
        $this->load->view('backend/data_user/index_profil', $data);
        $this->load->view('backend/data_user/edit', $role);
        $this->load->view('backend/templates/footer');
    }

    public function edit($user_id)
    {

        $data['profile'] = $this->Profile_model->getById($user_id)->row();
        $role['user_role'] = $this->Profile_model->getAllUserRole();

        $this->form_validation->set_rules('user_name', 'User_Name', 'required');
        $this->form_validation->set_rules('user_email', 'User_Email', 'required');
        $this->form_validation->set_rules('user_password', 'User_Password', 'required');
        $this->form_validation->set_rules('user_akses', 'User_Akses', 'required');

        if ($this->form_validation->run() == false) {

            $this->load->view('backend/templates/header');
            $this->load->view('backend/templates/sidebar');
            $this->load->view('backend/templates/topbar', $role);
            $this->load->view('backend/data_user/edit', $data);
            $this->load->view('backend/templates/footer');

            $this->load->library('form_validation');
        } else {
            $this->Profile_model->edit();
            redirect('C_Profile');
        }
    }

    public function update()
    {
        $user_id = $this->input->post("user_id");

        $data['profile'] = $this->Profile_model->getProfileById($user_id);
        $role['user_role'] = $this->Profile_model->getAllUserRole();

        $this->form_validation->set_rules('user_name', 'User_Name', 'required');
        $this->form_validation->set_rules('user_email', 'User_Email', 'required');
        $this->form_validation->set_rules('user_password', 'User_Password', 'required');
        $this->form_validation->set_rules('user_akses', 'User_Akses', 'required');


        if ($this->form_validation->run() == false) {


            $this->load->view('backend/templates/header');
            $this->load->view('backend/templates/sidebar');
            $this->load->view('backend/templates/topbar', $role);
            $this->load->view('backend/data_user/edit', $data);
            $this->load->view('backend/templates/footer');

            $this->load->library('form_validation');
        } else {
            $this->Profile_model->update();
            redirect('C_Profile');
        }
    }

    public function hapus($id)
    {
        $id = array('id' => $id);
        $this->Profile_model->hapus($id, 'user');
        redirect('C_profile');
    }
}