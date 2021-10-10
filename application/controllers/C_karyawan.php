<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_karyawan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Karyawan_model');
        $this->load->library('form_validation');
        $this->load->helper('text');
    }
    public function index()
    {
        $data['karyawan'] = $this->Karyawan_model->getAllKaryawan();

        $this->load->view('backend/templates/header');
        $this->load->view('backend/templates/sidebar');
        $this->load->view('backend/templates/topbar');
        $this->load->view('backend/data_karyawan/index', $data);
        $this->load->view('backend/data_karyawan/tambah');
        $this->load->view('backend/data_karyawan/edit');
        $this->load->view('backend/templates/footer');
    }

    public function search()
    {
        $keyword = $this->input->post('keyword');
        $data['karyawan'] = $this->Karyawan_model->search($keyword);
        $this->load->view('backend/templates/header');
        $this->load->view('backend/templates/sidebar');
        $this->load->view('backend/templates/topbar');
        $this->load->view('backend/data_karyawan/index', $data);
        $this->load->view('backend/data_karyawan/tambah');
        $this->load->view('backend/templates/footer');
    }

    public function tambah()
    {
        $this->form_validation->set_rules('nik', 'NIK', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('gender', 'Gender', 'required');
        $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('no_tlpn', 'No.Telepon', 'required');
        $this->form_validation->set_rules('jabatan', 'Jabatan', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('status_karyawan', 'Status Karyawan', 'required');

        if ($this->form_validation->run() == false) {


            $this->load->view('backend/templates/header');
            $this->load->view('backend/templates/sidebar');
            $this->load->view('backend/templates/topbar');
            $this->load->view('backend/data_karyawan/tambah');
            $this->load->view('backend/templates/footer');
            $this->load->library('form_validation');
        } else {
            $this->Karyawan_model->tambah();
            redirect('C_Karyawan');
        }
    }

    public function edit($id_karyawan)
    {
        // $id = array('id' => $id);
        // return $id;
        // var_dump($id);

        $data['karyawan'] = $this->Karyawan_model->getById($id_karyawan)->row();

        // var_dump($data);
        // return;

        $this->form_validation->set_rules('nik', 'NIK', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('gender', 'Gender', 'required');
        $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('no_tlpn', 'No.Telepon', 'required');
        $this->form_validation->set_rules('jabatan', 'Jabatan', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('status_karyawan', 'Status Karyawan', 'required');

        if ($this->form_validation->run() == false) {


            $this->load->view('backend/templates/header');
            $this->load->view('backend/templates/sidebar');
            $this->load->view('backend/templates/topbar');
            $this->load->view('backend/data_karyawan/edit', $data);
            $this->load->view('backend/templates/footer');
            $this->load->library('form_validation');
        } else {
            $this->Karyawan_model->edit();
            redirect('C_Karyawan');
        }
    }

    public function update()
    {
        $id_karyawan = $this->input->post("id_karyawan");
        $data['karyawan'] = $this->Karyawan_model->getById($id_karyawan)->row();
        $data['karyawan'] = $this->Karyawan_model->getKaryawanById($id_karyawan);

        $this->form_validation->set_rules('nik', 'NIK', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('gender', 'Gender', 'required');
        $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('no_tlpn', 'No.Telepon', 'required');
        $this->form_validation->set_rules('jabatan', 'Jabatan', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('status_karyawan', 'Status Karyawan', 'required');

        if ($this->form_validation->run() == false) {


            $this->load->view('backend/templates/header');
            $this->load->view('backend/templates/sidebar');
            $this->load->view('backend/templates/topbar');
            $this->load->view('backend/data_karyawan/edit', $data);
            $this->load->view('backend/templates/footer');
            $this->load->library('form_validation');
        } else {
            $this->Karyawan_model->update();
            redirect('C_Karyawan');
        }
    }

    public function hapus($id_karyawan)
    {
        $id_karyawan = array('id_karyawan' => $id_karyawan);
        $this->Karyawan_model->hapus($id_karyawan, 'data_karyawan');
        redirect('C_karyawan');
    }
}