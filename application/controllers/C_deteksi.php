<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_deteksi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Deteksi_model');
        $this->load->library('form_validation');
        $this->load->helper('text');
    }
    public function index()
    {
        $data['deteksi_pju'] = $this->Deteksi_model->getAllDeteksi();

        $this->load->view('backend/templates/header');
        $this->load->view('backend/templates/sidebar');
        $this->load->view('backend/templates/topbar');
        $this->load->view('backend/deteksi_pju/index', $data);
        $this->load->view('backend/deteksi_pju/detail');
        $this->load->view('backend/deteksi_pju/edit');
        $this->load->view('backend/templates/footer');
    }

    // public function search()
    // {
    //     $keyword = $this->input->post('keyword');
    //     $data['data_pju'] = $this->DataPju_model->search($keyword);
    //     $this->load->view('backend/templates/header');
    //     $this->load->view('backend/templates/sidebar');
    //     $this->load->view('backend/templates/topbar');
    //     $this->load->view('backend/data_pju/index', $data);
    //     $this->load->view('backend/templates/footer');
    // }

    // public function hapus($id_pju)
    // {
    //     $id_pju = array('id_pju' => $id_pju);
    //     $this->DataPju_model->hapus($id_pju, 'data_pju');
    //     redirect('C_data_pju');
    // }

    public function edit($id_deteksi)
    {

        $data['deteksi_pju'] = $this->Deteksi_model->getById($id_deteksi)->row();

        $this->form_validation->set_rules('verifikasi', 'Verifikasi', 'required');


        if ($this->form_validation->run() == false) {


            $this->load->view('backend/templates/header');
            $this->load->view('backend/templates/sidebar');
            $this->load->view('backend/templates/topbar');
            $this->load->view('backend/deteksi_pju/edit', $data);
            $this->load->view('backend/templates/footer');
            $this->load->library('form_validation');
        } else {
            $this->Deteksi_model->edit();
            redirect('C_deteksi');
        }
    }

    public function update()
    {
        $id_deteksi = $this->input->post("id_deteksi");
        $data['deteksi_pju'] = $this->Deteksi_model->getDeteksiPjuById($id_deteksi);

        $this->form_validation->set_rules('verifikasi', 'Verifikasi', 'required');


        if ($this->form_validation->run() == false) {


            $this->load->view('backend/templates/header');
            $this->load->view('backend/templates/sidebar');
            $this->load->view('backend/templates/topbar');
            $this->load->view('backend/deteksi_pju/edit', $data);
            $this->load->view('backend/templates/footer');
            $this->load->library('form_validation');
        } else {
            $this->Deteksi_model->update();
            redirect('C_deteksi');
        }
        var_dump($data);
    }

    public function detail($id_deteksi)
    {

        $data['deteksi_pju'] = $this->Deteksi_model->getById($id_deteksi)->row();

        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('whatsapp', 'Whatsapp', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('kecamatan', 'Kecamatan', 'required');
        $this->form_validation->set_rules('kelurahan', 'Kelurahan', 'required');
        $this->form_validation->set_rules('laporan', 'Laporan', 'required');
        $this->form_validation->set_rules('gambar', 'Gambar', 'required');
        $this->form_validation->set_rules('verifikasi', 'Verifikasi', 'required');


        if ($this->form_validation->run() == false) {


            $this->load->view('backend/templates/header');
            $this->load->view('backend/templates/sidebar');
            $this->load->view('backend/templates/topbar');
            $this->load->view('backend/deteksi_pju/detail', $data);
            $this->load->view('backend/templates/footer');
            $this->load->library('form_validation');
        } else {
            $this->Deteksi_model->edit();
            redirect('C_deteksi');
        }
    }
}
