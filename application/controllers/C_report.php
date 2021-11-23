<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_report extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Deteksi_model');
        $this->load->model('DataPju_model');
        $this->load->library('form_validation');
        $this->load->helper('url', 'form');
        $this->load->model("Mlogin");
        $this->Mlogin->Check_Login();
    }
    public function index()
    {
        $data['deteksi_pju'] = $this->Deteksi_model->getAllDeteksi();
        $data['data_pju'] = $this->DataPju_model->getAllDataPju();

        $this->load->view('frontend/landingpage/report', $data);
    }
}