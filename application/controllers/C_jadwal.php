<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_jadwal extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Jadwal_model');
        $this->load->model('Kelompok_model');
        $this->load->model('DataPju_model');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model("Mlogin");
        $this->Mlogin->Check_Login();
    }

    public function index()
    {
        $data['jadwal'] = $this->Jadwal_model->getAllJadwal();
        $data['kode'] = $this->Jadwal_model->kode();
        $data_pju['data_kelompok'] = $this->Kelompok_model->getAllKelompok();
        $data_pju['data_pju'] = $this->DataPju_model->getAllDataPju();

        $this->load->view('backend/templates/header');
        $this->load->view('backend/templates/sidebar');
        $this->load->view('backend/templates/topbar');
        $this->load->view('backend/jadwal/index', $data);
        $this->load->view('backend/jadwal/tambah', $data_pju);
        $this->load->view('backend/jadwal/edit');
        $this->load->view('backend/jadwal/form_filter');
        $this->load->view('backend/templates/footer');
    }

    public function search()
    {
        $keyword = $this->input->post('keyword');
        $data['jadwal'] = $this->Jadwal_model->search($keyword);
        $this->load->view('backend/templates/header');
        $this->load->view('backend/templates/sidebar');
        $this->load->view('backend/templates/topbar');
        $this->load->view('backend/jadwal/index', $data);
        $this->load->view('backend/templates/footer');
    }

    public function tambah()
    {
        $this->form_validation->set_rules('kode_jadwal', 'Kode Jadwal', 'required');
        $this->form_validation->set_rules('id_kelompok', 'Kode Kelompok', 'required');
        $this->form_validation->set_rules('kode_pju', 'Kode_Pju', 'required');

        if ($this->form_validation->run() == false) {


            $this->load->view('backend/templates/header');
            $this->load->view('backend/templates/sidebar');
            $this->load->view('backend/templates/topbar');
            $this->load->view('backend/jadwal/index');
            $this->load->view('backend/templates/footer');
            $this->load->library('form_validation');
        } else {
            $this->Jadwal_model->tambah();
            redirect('C_jadwal');
        }
    }

    function get_kode_pju()
    {
        $id_kelompok = $this->input->post('id', TRUE);
        $data = $this->DataPju_model->getDataPjuByKodeKelompok($id_kelompok)->result();
        echo json_encode($data);
    }

    public function hapus($id_jadwal)
    {
        $id_jadwal = array('id_jadwal' => $id_jadwal);
        $this->DataPju_model->hapus($id_jadwal, 'jadwal');
        redirect('C_jadwal');
    }

    public function edit($id_jadwal)
    {
        $data['jadwal'] = $this->Jadwal_model->getById($id_jadwal)->row();

        $this->form_validation->set_rules('kode_jadwal', 'Kode Jadwal', 'required');
        $this->form_validation->set_rules('id_kelompok', 'Kode Kelompok', 'required');
        $this->form_validation->set_rules('kode_pju', 'Kode_Pju', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');
        $pju['data_kelompok'] = $this->Kelompok_model->getAllKelompok();
        $pju['data_pju'] = $this->DataPju_model->getAllDataPju()->result();
        $data['id_jadwal'] = $id_jadwal;

        if ($this->form_validation->run() == false) {

            $this->load->view('backend/templates/header');
            $this->load->view('backend/templates/sidebar');
            $this->load->view('backend/templates/topbar', $pju);
            $this->load->view('backend/jadwal/edit', $data);
            $this->load->view('backend/templates/footer');
            $this->load->library('form_validation');
        } else {
            $this->Jadwal_model->edit();
            redirect('C_jadwal');
        }
    }

    function get_data_edit()
    {
        $id_jadwal = $this->input->post('id_jadwal', TRUE);
        $data = $this->Jadwal_model->get_jadwal_by_id($id_jadwal)->result();
        $dataKelompok = json_encode($data[0]->id_kelompok);
        $dataPJU = $this->Jadwal_model->getDataPJU($dataKelompok);
        var_dump(json_encode($dataPJU));
    }

    function get_pju_edit()
    {
        $id_kelompok = $this->input->post('id', TRUE);
        $data = $this->Jadwal_model->get_pju_edit($id_kelompok)->result();
        echo json_encode($data);
    }

    public function update()
    {
        $id_jadwal = $this->input->post("id_jadwal");

        $data['jadwal'] = $this->Jadwal_model->getJadwalById($id_jadwal);

        $this->form_validation->set_rules('kode_jadwal', 'Kode Jadwal', 'required');
        $this->form_validation->set_rules('id_kelompok', 'Kode Kelompok', 'required');
        $this->form_validation->set_rules('kode_pju', 'Kode_Pju', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');
        $data_pju['data_kelompok'] = $this->Kelompok_model->getAllKelompok();
        $data_pju['data_pju'] = $this->DataPju_model->getAllDataPju();
        if ($this->form_validation->run() == false) {

            $this->load->view('backend/templates/header');
            $this->load->view('backend/templates/sidebar');
            $this->load->view('backend/templates/topbar', $data_pju);
            $this->load->view('backend/jadwal/edit', $data);
            $this->load->view('backend/templates/footer');
            $this->load->library('form_validation');
        } else {
            $this->Jadwal_model->update();
            redirect('C_jadwal');
        }
    }

    public function cetak()
    {
        $mulai = $this->input->post('mulai');
        $sampai = $this->input->post('sampai');
        $data['jadwal'] = $this->Jadwal_model->filter($mulai, $sampai);

        $jd['jadwal'] = $this->Jadwal_model->getAllJadwal();
        $this->load->library('mypdf');

        if ($this->form_validation->run() == false) {
            $this->mypdf->generate('backend/jadwal/cetak', $data, 'Laporan-Data-Jadwal', 'A4', 'portrait');
        } else {
            $this->mypdf->generate('backend/jadwal/cetak', $jd, 'Laporan-Data-Jadwal', 'A4', 'portrait');
        }
    }
}