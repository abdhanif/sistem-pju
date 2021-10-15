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

    public function edit($id)
    {

        $data['profile'] = $this->Profile_model->getById($id)->row();
        $role['user_role'] = $this->Profile_model->getAllUserRole();

        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

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
        $id = $this->input->post("id");

        $data['profile'] = $this->Profile_model->getProfileById($id);
        $role['user_role'] = $this->Profile_model->getAllUserRole();

        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');


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
