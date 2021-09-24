<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_donatur extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Donatur_model');
        $this->load->library('form_validation');
        $this->load->helper('text');
    }
    public function index()
    {
        $data['donatur'] = $this->Donatur_model->getAllDonatur();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('donatur/data_donatur', $data);
        $this->load->view('donatur/tambah');
        $this->load->view('donatur/edit');
        $this->load->view('templates/footer');
    }

    public function search()
    {
        $keyword = $this->input->post('keyword');
        $data['donatur'] = $this->Donatur_model->search($keyword);
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('donatur/data_donatur', $data);
        $this->load->view('donatur/tambah');
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $this->form_validation->set_rules('nik', 'NIK', 'required');
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('gender', 'Gender', 'required');
        $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('no_tlpn', 'No.Telephon', 'required');
        $this->form_validation->set_rules('hobi', 'Hobi', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');
        $this->form_validation->set_rules('pekerjaan', 'Pekerjaan', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('status_donatur', 'Status_Donatur', 'required');

        if ($this->form_validation->run() == false) {


            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar');
            $this->load->view('donatur/tambah');
            $this->load->view('templates/footer');
            $this->load->library('form_validation');
        } else {
            $this->Donatur_model->tambah();
            redirect('C_donatur');
        }
    }

    public function edit($id_donatur)
    {
        // $id = array('id' => $id);
        // return $id;
        // var_dump($id);

        $data['donatur'] = $this->Donatur_model->getById($id_donatur)->row();

        // var_dump($data);
        // return;

        $this->form_validation->set_rules('nik', 'NIK', 'required');
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('gender', 'Gender', 'required');
        $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('no_tlpn', 'No.Telephon', 'required');
        $this->form_validation->set_rules('hobi', 'Hobi', 'required|trim');
        $this->form_validation->set_rules('status', 'Status', 'required');
        $this->form_validation->set_rules('pekerjaan', 'Pekerjaan', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('status_donatur', 'Status_Donatur', 'required');

        if ($this->form_validation->run() == false) {


            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar');
            $this->load->view('donatur/edit', $data);
            $this->load->view('templates/footer');
            $this->load->library('form_validation');
        } else {
            $this->Donatur_model->edit();
            redirect('C_donatur');
        }
    }

    public function update()
    {
        $id_donatur = $this->input->post("id_donatur");
        $data['donatur'] = $this->Donatur_model->getById($id_donatur)->row();
        $data['donatur'] = $this->Donatur_model->getDonaturById($id_donatur);

        $this->form_validation->set_rules('nik', 'NIK', 'required');
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('gender', 'Gender', 'required');
        $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('no_tlpn', 'No.Telephon', 'required');
        $this->form_validation->set_rules('hobi', 'Hobi', 'required|trim');
        $this->form_validation->set_rules('status', 'Status', 'required');
        $this->form_validation->set_rules('pekerjaan', 'Pekerjaan', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('status_donatur', 'Status_Donatur', 'required');

        if ($this->form_validation->run() == false) {


            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar');
            $this->load->view('donatur/edit', $data);
            $this->load->view('templates/footer');
            $this->load->library('form_validation');
        } else {
            $this->Donatur_model->update();
            redirect('C_donatur');
        }
    }

    public function hapus($id_donatur)
    {
        $id_donatur = array('id_donatur' => $id_donatur);
        $this->Donatur_model->hapus($id_donatur, 'donatur');
        redirect('C_donatur');
    }
}
