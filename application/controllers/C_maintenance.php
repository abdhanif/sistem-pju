<?php
class C_maintenance extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->model('Jadwal_model');
        $this->load->model('Kelompok_model');
        $this->load->model('DataPju_model');
        $this->load->model('Maintenance_model');
        $this->load->library('form_validation');
        $this->load->model("Mlogin");
        $this->Mlogin->Check_Login();
    }

    public function index()
    {
        $data['maintenance'] = $this->Maintenance_model->getAllMaintenance();
        $this->load->view('backend/templates/header');
        $this->load->view('backend/templates/sidebar');
        $this->load->view('backend/templates/topbar');
        $this->load->view('backend/maintenance/index', $data);
        $this->load->view('backend/maintenance/tambah', $data);
        $this->load->view('backend/maintenance/edit');
        $this->load->view('backend/maintenance/form_filter');
        $this->load->view('backend/templates/footer');
    }

    public function tambah()
    {
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('backend/templates/header');
            $this->load->view('backend/templates/sidebar');
            $this->load->view('backend/templates/topbar');
            $this->load->view('backend/maintenance/tambah');
            $this->load->view('backend/templates/footer');
            $this->load->library('form_validation');
        } else {
            $this->Maintenance_model->tambah();
            $this->session->set_flashdata('notif', '<div class="alert alert-success" role="alert"> Data Berhasil ditambahkan <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('C_maintenance');
        }
    }

    public function hapus($id)
    {
        $id_mt = array('ID' => $id);
        $this->Maintenance_model->hapus($id_mt, 'master_data_maintenance');
        redirect('C_maintenance');
    }

    public function update()
    {
        $id = $this->input->post("ID");
        $data['maintenance'] = $this->Maintenance_model->getById($id)->row();
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('backend/templates/header');
            $this->load->view('backend/templates/sidebar');
            $this->load->view('backend/templates/topbar');
            $this->load->view('backend/maintenance/edit', $data);
            $this->load->view('backend/templates/footer');
            $this->load->library('form_validation');
        } else {
            $this->Maintenance_model->update();
            redirect('C_maintenance');
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