<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_kelompok extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Kelompok_model');
        $this->load->library('form_validation');
        $this->load->library("pagination");
        $this->load->model("Mlogin");
        $this->Mlogin->Check_Login();
    }
    public function index()
    {
        $config['base_url'] = 'http://localhost/sistem-pju/C_kelompok/index';
        $config['total_rows'] = $this->Kelompok_model->totalRows();
        $config['per_page'] = 10;
        $this->pagination->initialize($config);
        $data['start'] = $this->uri->segment(3);

        $data['kelompok'] = $this->Kelompok_model->getAllKelompok($config['per_page'], $data['start']);

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
            $this->session->set_flashdata('notif', '<div class="alert alert-success" role="alert"> Data Berhasil ditambahkan <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
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