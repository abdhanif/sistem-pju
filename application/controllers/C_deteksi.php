<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_deteksi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Deteksi_model');
        $this->load->library('form_validation');
    }
    public function index()
    {
        $data['deteksi'] = $this->Deteksi_model->getAllDeteksi();

        $this->load->view('backend/templates/header');
        $this->load->view('backend/templates/sidebar');
        $this->load->view('backend/templates/topbar');
        $this->load->view('backend/deteksi_pju/index', $data);
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

    // public function tambah()
    // {
    //     $this->form_validation->set_rules('kode_kelompok', 'Kode Kelompok', 'required');
    //     $this->form_validation->set_rules('kode_pju', 'Kode PJU', 'required');
    //     $this->form_validation->set_rules('alamat_pju', 'Alamat PJU', 'required');
    //     $this->form_validation->set_rules('lat', 'Lat', 'required');
    //     $this->form_validation->set_rules('lng', 'Lng', 'required');
    //     $kelompok['data_kelompok'] = $this->Kelompok_model->getAllKelompok();

    //     if ($this->form_validation->run() == false) {


    //         $this->load->view('backend/templates/header');
    //         $this->load->view('backend/templates/sidebar');
    //         $this->load->view('backend/templates/topbar');
    //         $this->load->view('backend/data_pju/tambah', $kelompok);
    //         $this->load->view('backend/templates/footer');
    //         $this->load->library('form_validation');
    //     } else {
    //         $this->DataPju_model->tambah();
    //         redirect('C_data_pju');
    //     }
    // }

    // public function hapus($id_pju)
    // {
    //     $id_pju = array('id_pju' => $id_pju);
    //     $this->DataPju_model->hapus($id_pju, 'data_pju');
    //     redirect('C_data_pju');
    // }

    // public function edit($id_pju)
    // {
    //     $data['data_pju'] = $this->DataPju_model->getById($id_pju)->row();

    //     $this->form_validation->set_rules('kode_kelompok', 'Kode Kelompok', 'required');
    //     $this->form_validation->set_rules('kode_pju', 'Kode PJU', 'required');
    //     $this->form_validation->set_rules('alamat_pju', 'Alamat PJU', 'required');
    //     $this->form_validation->set_rules('lat', 'Lat', 'required');
    //     $this->form_validation->set_rules('lng', 'Lng', 'required');
    //     $kelompok['data_kelompok'] = $this->Kelompok_model->getAllKelompok();

    //     if ($this->form_validation->run() == false) {

    //         $this->load->view('backend/templates/header');
    //         $this->load->view('backend/templates/sidebar');
    //         $this->load->view('backend/templates/topbar', $kelompok);
    //         $this->load->view('backend/data_pju/edit', $data);
    //         $this->load->view('backend/templates/footer');
    //         $this->load->library('form_validation');
    //     } else {
    //         $this->DataPju_model->edit();
    //         redirect('C_data_pju');
    //     }
    //     // var_dump($data['data_pju']->id_pju);
    // }

    // public function update()
    // {
    //     $id_pju = $this->input->post("id_pju");

    //     $data['data_pju'] = $this->DataPju_model->getDataPjuById($id_pju);


    //     $this->form_validation->set_rules('kode_kelompok', 'Kode Kelompok', 'required');
    //     $this->form_validation->set_rules('kode_pju', 'Kode PJU', 'required');
    //     $this->form_validation->set_rules('alamat_pju', 'Alamat PJU', 'required');
    //     $this->form_validation->set_rules('lat', 'Lat', 'required');
    //     $this->form_validation->set_rules('lng', 'Lng', 'required');
    //     $kelompok['data_kelompok'] = $this->Kelompok_model->getAllKelompok();


    //     if ($this->form_validation->run() == false) {


    //         $this->load->view('backend/templates/header');
    //         $this->load->view('backend/templates/sidebar');
    //         $this->load->view('backend/templates/topbar', $kelompok);
    //         $this->load->view('backend/data_pju/edit', $data);
    //         $this->load->view('backend/templates/footer');
    //         $this->load->library('form_validation');
    //     } else {
    //         $this->DataPju_model->update();
    //         redirect('C_data_pju');
    //     }
    // }
}
