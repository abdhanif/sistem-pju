<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mlogin extends CI_Model
{

    function query_validasi_email($email)
    {
        $result = $this->db->query("SELECT * FROM table_user WHERE user_email='$email' LIMIT 1");
        return $result;
    }

    function query_validasi_password($email, $password)
    {
        $result = $this->db->query("SELECT * FROM table_user WHERE user_email='$email' AND user_password=MD5('$password') LIMIT 1");
        return $result;
    }

    function Check_Login() // Fungsi cek data nilai, dari session logged tadi TRUE / FALSE / NULL
    {
        $logged = $this->session->userdata("logged"); // Cara mengambil value/nilai dari object logged di session
        if ($logged == FALSE) { // Jika false atau null berarti belum login.
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Silahkan login terlebih dahulu ! </div>');
            redirect('Auth');
        } else {
        }
    }
}