<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_kelompok extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Kelompok_model');
        $this->load->library('form_validation');
    }
    public function index()
    {
        $data['kelompok'] = $this->Kelompok_model->getAllKelompok();
        $data['kode'] = $this->Kelompok_model->kode();

        $this->load->view('backend/templates/header');
        $this->load->view('backend/templates/sidebar');
        $this->load->view('backend/templates/topbar');
        $this->load->view('backend/data_kelompok/index', $data);
        $this->load->view('backend/data_kelompok/tambah');
        $this->load->view('backend/data_kelompok/edit');
        $this->load->view('backend/templates/footer');
    }

    public function search()
    {
        $keyword = $this->input->post('keyword');
        $data['kelompok'] = $this->Kelompok_model->search($keyword);
        $this->load->view('backend/templates/header');
        $this->load->view('backend/templates/sidebar');
        $this->load->view('backend/templates/topbar');
        $this->load->view('backend/data_kelompok/index', $data);
        $this->load->view('backend/data_kelompok/tambah');
        $this->load->view('backend/data_kelompok/edit');
        $this->load->view('backend/templates/footer');
    }

    public function tambah()
    {
        $this->form_validation->set_rules('kode_kelompok', 'Kode Kelompok', 'required');
        $this->form_validation->set_rules('nama_kelompok', 'Nama Kelompok', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('backend/templates/header');
            $this->load->view('backend/templates/sidebar');
            $this->load->view('backend/templates/topbar');
            $this->load->view('backend/data_kelompok/tambah');
            $this->load->view('backend/templates/footer');
            $this->load->library('form_validation');
        } else {
            $this->Kelompok_model->tambah();
            redirect('C_kelompok');
        }
    }

    public function hapus($id_kelompok)
    {
        $id_kelompok = array('id_kelompok' => $id_kelompok);
        $this->Kelompok_model->hapus($id_kelompok, 'data_kelompok');
        redirect('C_kelompok');
    }

    public function edit($id_kelompok)
    {

        $data['kelompok'] = $this->Kelompok_model->getById($id_kelompok)->row();

        $this->form_validation->set_rules('kode_kelompok', 'Kode Kelompok', 'required');
        $this->form_validation->set_rules('nama_kelompok', 'Nama Kelompok', 'required');

        if ($this->form_validation->run() == false) {

            $this->load->view('backend/templates/header');
            $this->load->view('backend/templates/sidebar');
            $this->load->view('backend/templates/topbar');
            $this->load->view('backend/data_kelompok/edit', $data);
            $this->load->view('backend/templates/footer');
            $this->load->library('form_validation');
        } else {
            $this->Merchant_model->edit();
            redirect('C_Kelompok');
        }
    }

    public function update()
    {
        $id_kelompok = $this->input->post("id_kelompok");

        $data['kelompok'] = $this->Kelompok_model->getKelompokById($id_kelompok);

        $this->form_validation->set_rules('kode_kelompok', 'Kode Kelompok', 'required');
        $this->form_validation->set_rules('nama_kelompok', 'Nama Kelompok', 'required');

        if ($this->form_validation->run() == false) {

            $this->load->view('backend/templates/header');
            $this->load->view('backend/templates/sidebar');
            $this->load->view('backend/templates/topbar');
            $this->load->view('backend/data_kelompok/edit', $data);
            $this->load->view('backend/templates/footer');
            $this->load->library('form_validation');
        } else {
            $this->Kelompok_model->update();
            redirect('C_kelompok');
        }
    }

    public function cetak()
    {
        $data['kelompok'] = $this->Kelompok_model->getAllKelompok();

        $this->load->library('mypdf');
        $this->mypdf->generate('backend/data_kelompok/cetak', $data, 'Laporan-Data-Kelompok', 'A4', 'portrait');
    }
}