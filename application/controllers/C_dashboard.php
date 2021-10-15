<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_dashboard extends CI_Controller
{

    public $CI = NULL;
    function __construct()
    {
        parent::__construct();
        $this->CI = &get_instance();
        $this->load->model('Kelompok_model');
        $this->load->model('DataPju_model');
        $this->load->library('form_validation');
        $this->load->library('session');
    }
    public function index()
    {
        $pju['data_pju'] = $this->DataPju_model->getAllDataPju()->result();
        $data['markerdata'] = array();

        for ($i = 0; $i < count($pju['data_pju']); $i++) {
            $markerpju = (object) array(
                'kode' => $pju['data_pju'][$i]->kode_pju,
                'alamat' => $pju['data_pju'][$i]->alamat_pju,
                'lat' => $pju['data_pju'][$i]->lat,
                'lng' => $pju['data_pju'][$i]->lng
            );

            array_push($data['markerdata'], $markerpju);
        }
        // var_dump($data['markerdata']);

        $this->load->view('backend/templates/header');
        $this->load->view('backend/templates/sidebar');
        $this->load->view('backend/templates/topbar');
        $this->load->view('backend/dashboard/index', $data);
        $this->load->view('backend/templates/footer');
    }
}