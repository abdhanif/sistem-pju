<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_mst_mt extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mst_mt_model');
        $this->load->library('form_validation');
        $this->load->model("Mlogin");
        $this->Mlogin->Check_Login();
    }
    public function index()
    {
        $data['mst_mt'] = $this->Mst_mt_model->getAllMstMt();

        $this->load->view('backend/templates/header');
        $this->load->view('backend/templates/sidebar');
        $this->load->view('backend/templates/topbar');
        $this->load->view('backend/maintenance/index', $data);
        // $this->load->view('backend/data_kelompok/tambah');
        // $this->load->view('backend/data_kelompok/edit');
        $this->load->view('backend/templates/footer');
    }
}