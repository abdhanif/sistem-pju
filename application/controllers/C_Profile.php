<?php
class C_profile extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper('text');
        $this->load->model("Mlogin");
        $this->load->model('Profile_model');
        $this->load->library("pagination");
        $this->load->library('form_validation');
        $this->Mlogin->Check_Login();
    }

    public function index()
    {
        $config['base_url'] = 'http://localhost/sistem-pju/C_profile/index';
        $config['total_rows'] = $this->Profile_model->totalRows();
        $config['per_page'] = 10;
        $this->pagination->initialize($config);
        $data['start'] = $this->uri->segment(3);
        $data['profile'] = $this->Profile_model->index($config['per_page'], $data['start']);

        $this->load->view('backend/templates/header');
        $this->load->view('backend/templates/sidebar');
        $this->load->view('backend/templates/topbar');
        $this->load->view('backend/data_user/index_profil', $data);
        $this->load->view('backend/data_user/edit');
        $this->load->view('backend/templates/footer');
    }

    public function edit($user_id)
    {

        $data['profile'] = $this->Profile_model->getById($user_id)->row();

        $this->form_validation->set_rules('user_name', 'User_Name', 'required');
        $this->form_validation->set_rules('user_email', 'User_Email', 'required');
        $this->form_validation->set_rules('user_password', 'User_Password', 'required');
        $this->form_validation->set_rules('user_akses', 'User_Akses', 'required');
        $this->form_validation->set_rules('user_status', 'User_Status', 'required');

        if ($this->form_validation->run() == false) {

            $this->load->view('backend/templates/header');
            $this->load->view('backend/templates/sidebar');
            $this->load->view('backend/templates/topbar');
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

        $this->form_validation->set_rules('user_name', 'User_Name', 'required');
        $this->form_validation->set_rules('user_email', 'User_Email', 'required');
        $this->form_validation->set_rules('user_password', 'User_Password', 'required');
        $this->form_validation->set_rules('user_akses', 'User_Akses', 'required');
        $this->form_validation->set_rules('user_status', 'User_Status', 'required');


        if ($this->form_validation->run() == false) {


            $this->load->view('backend/templates/header');
            $this->load->view('backend/templates/sidebar');
            $this->load->view('backend/templates/topbar');
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