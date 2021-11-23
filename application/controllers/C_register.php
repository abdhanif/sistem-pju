<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_register extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Mlogin', 'Mlogin');
        $this->load->library('form_validation');
        $this->load->helper('text');
    }

    public function index()
    {
        $this->form_validation->set_rules('user_name', 'User Name', 'required|trim');
        $this->form_validation->set_rules('user_email', 'User Email', 'required|trim|valid_email|is_unique[table_user.user_email]', [
            'is_unique' => 'This email has already registered!'
        ]);
        $this->form_validation->set_rules('user_password', 'User Password', 'required|trim|min_length[3]|matches[user_password]', [
            'matches' => 'password dont match!',
            'min_length' => 'password to short!'
        ]);

        if ($this->form_validation->run() == false) {

            $this->load->library('form_validation');
            $this->load->view('frontend/templates/header');
            $this->load->view('auth/register');
            $this->load->view('frontend/templates/footer');
        } else {
            $data = [
                'user_name'  => htmlspecialchars($this->input->post('user_name', true)),
                'user_email' => htmlspecialchars($this->input->post('user_email', true)),
                'user_password' => password_hash($this->input->post('user_password'), PASSWORD_DEFAULT),
                'user_akses' => 3,
                'user_status' => 0,
            ];

            $this->db->insert('table_user', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Selamat! Akun Anda Sudah terdaftar, Silahkan minta verifikasi Admin !
          </div>');
            redirect('Auth');
        }
    }
}