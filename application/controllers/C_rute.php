<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_rute extends CI_Controller
{

    public $CI = NULL;
    function __construct()
    {
        parent::__construct();
        $this->CI = &get_instance();
        $this->load->model('Rute_model');
        $this->load->model('Jadwal_model');
        $this->load->model('Kelompok_model');
        $this->load->model('DataPju_model');
        $this->load->library('form_validation');
        $this->load->library('session');
    }
    public function index()
    {
        $data['rute'] = $this->Rute_model->getAllRute();
        $jadwal['jadwal'] = $this->Jadwal_model->getAllJadwal();
        $kelompok['data_kelompok'] = $this->Kelompok_model->getAllKelompok();
        $pju['data_pju'] = $this->DataPju_model->getAllDataPju();

        $this->load->view('backend/templates/header', $data);
        $this->load->view('backend/templates/sidebar', $kelompok);
        $this->load->view('backend/templates/topbar', $pju);
        $this->load->view('backend/rute/index', $data);
        $this->load->view('backend/templates/footer', $jadwal);
    }

    public function search()
    {
        $id_kelompok = $this->input->post('kelompok');
        $pju['data_pju'] = $this->DataPju_model->getDataPjuRute($id_kelompok)->result();
        $data['rute'] = $this->Rute_model->getAllRute();
        $data['data_pju'] = $pju['data_pju'];
        $data['arre'] = array();

        for ($i = 0; $i < count($pju['data_pju']); $i++) {
            $arr = (object) array(
                'lat' => $pju['data_pju'][$i]->lat,
                'lang' => $pju['data_pju'][$i]->lng
            );

            array_push($data['arre'], $arr);
        }

        $this->load->view('backend/templates/header');
        $this->load->view('backend/templates/sidebar');
        $this->load->view('backend/templates/topbar');
        $this->load->view('backend/rute/index', $data);
        $this->load->view('backend/templates/footer');
    }
}