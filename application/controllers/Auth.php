<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
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
        if ($this->session->userdata('logged') != TRUE) {
            $this->load->view('frontend/templates/header');
            $this->load->view('auth/login');
            $this->load->view('frontend/templates/footer');
        } else {
            redirect('C_dashboard');
        };
    }

    public function autentikasi()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('pass');

        $validasi_email = $this->Mlogin->query_validasi_email($email);
        if ($validasi_email->num_rows() > 0) {
            $validate_ps = $this->Mlogin->query_validasi_password($email, $password);
            if ($validate_ps->num_rows() > 0) {
                $x = $validate_ps->row_array();
                if ($x['user_status'] == '1') {
                    $this->session->set_userdata('logged', TRUE);
                    $this->session->set_userdata('user', $email);
                    $id = $x['user_id'];
                    if ($x['user_akses'] == '1') { //Administrator
                        $name = $x['user_name'];
                        $this->session->set_userdata('access', 'Administrator');
                        $this->session->set_userdata('id', $id);
                        $this->session->set_userdata('name', $name);
                        redirect('C_dashboard');
                    } else if ($x['user_akses'] == '2') { //Teknisi
                        $name = $x['user_name'];
                        $this->session->set_userdata('access', 'Teknisi');
                        $this->session->set_userdata('id', $id);
                        $this->session->set_userdata('name', $name);
                        redirect('C_dashboard');
                    } else if ($x['user_akses'] == '3') { //Mayarakat
                        $name = $x['user_name'];
                        $this->session->set_userdata('access', 'Masyarakat');
                        $this->session->set_userdata('id', $id);
                        $this->session->set_userdata('name', $name);
                        redirect('C_pengaduan');
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    Akun kamu belum di verifikasi. Silahkan hubungi admin. </div>');
                    redirect('Auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Uupps! Password yang kamu masukan salah. </div>');
                redirect('Auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Uupps! Email yang kamu masukan salah.
          </div>');
            redirect('Auth');
        }
    }


    public function register()
    {
        $this->form_validation->set_rules('user_name', 'User Name', 'required|trim');
        $this->form_validation->set_rules('user_email', 'User Email', 'required|trim|valid_email|is_unique[user.email]', [
            'is_unique' => 'This email has already registered!'
        ]);
        $this->form_validation->set_rules('user_password1', 'User Password', 'required|trim|min_length[3]|matches[user_password2]', [
            'matches' => 'password dont match!',
            'min_length' => 'password to short!'
        ]);
        $this->form_validation->set_rules('user_password2', 'User Password', 'required|trim|matches[user_password1]');

        if ($this->form_validation->run() == false) {

            $this->load->library('form_validation');
            $this->load->view('frontend/templates/header');
            $this->load->view('auth/login');
            $this->load->view('frontend/templates/footer');
        } else {
            $data = [
                'user_name'  => htmlspecialchars($this->input->post('user_name', true)),
                'user_email' => htmlspecialchars($this->input->post('user_email', true)),
                'user_password' => password_hash($this->input->post('user_password1'), PASSWORD_DEFAULT),
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

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('C_landingpage');
    }
}