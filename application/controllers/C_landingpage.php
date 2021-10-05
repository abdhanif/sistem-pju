<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_landingpage extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Deteksi_model');
        $this->load->library('form_validation');
    }
    public function index()
    {
        $this->load->view('frontend/templates/header');
        $this->load->view('frontend/landingpage/index');
        $this->load->view('frontend/templates/footer');
    }
    public function tambah()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('whatsapp', 'Whatsapp', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('kecamatan', 'Kecamatan', 'required');
        $this->form_validation->set_rules('kelurahan', 'Kelurahan', 'required');
        $this->form_validation->set_rules('laporan', 'Laporan', 'required');
        $this->form_validation->set_rules('gambar', 'Gambar', 'required');
        $data['deteksi_pju'] = $this->Deteksi_model->getAllDeteksi();

        if ($this->form_validation->run() == false) {

            $this->load->view('frontend/templates/header');
            $this->load->view('frontend/landingpage/index', $data);
            $this->load->view('frontend/templates/footer');
        } else {
            $this->Deteksi_model->tambah();
            redirect('C_landingpage');
        }
    }
}
