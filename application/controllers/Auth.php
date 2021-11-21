<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Mlogin', 'Mlogin');
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
                    Akun kamu telah di blokir. Silahkan hubungi admin. </div>');
                    redirect('Auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Password yang kamu masukan salah. </div>');
                redirect('Auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Uupps! Email yang kamu masukan salah.
          </div>');
            redirect('Auth');
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('Auth');
    }
}