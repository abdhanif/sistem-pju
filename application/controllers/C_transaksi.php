<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_transaksi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Transaksi_model');
        $this->load->model('Donatur_model');
        $this->load->model('Merchant_model');
        $this->load->library('form_validation');
        $this->load->helper('text');
    }
    public function index()
    {
        $data['transaksi'] = $this->Transaksi_model->getAllTransaksi();
        $donatur['donatur'] = $this->Donatur_model->getAllDonatur();
        $merchant['merchant'] = $this->Merchant_model->getAllMerchant();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar', $donatur);
        $this->load->view('templates/topbar', $merchant);
        $this->load->view('transaksi/index_trans', $data);
        $this->load->view('transaksi/tambah_trans');
        $this->load->view('transaksi/edit_trans');
        $this->load->view('templates/footer');
    }

    public function search()
    {
        $keyword = $this->input->post('keyword');
        $data['transaksi'] = $this->Transaksi_model->search($keyword);
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('transaksi/index_trans', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $this->form_validation->set_rules('jenis_transaksi', 'Jenis Transaksi', 'required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');
        $this->form_validation->set_rules('nominal', 'Nominal', 'required');
        $this->form_validation->set_rules('payment_gateway', 'Payment Gateway', 'required');
        $this->form_validation->set_rules('tanggal_transaksi', 'Tanggal Transaksi', 'required');
        $donatur['donatur'] = $this->Donatur_model->getAllDonatur();
        $merchant['merchant'] = $this->Merchant_model->getAllMerchant();

        if ($this->form_validation->run() == false) {


            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar', $donatur);
            $this->load->view('transaksi/index_trans', $merchant);
            $this->load->view('templates/footer');
            $this->load->library('form_validation');
        } else {
            $this->Transaksi_model->tambah();
            redirect('C_transaksi');
        }
    }


    public function edit($id_transaksi)
    {
        $data['transaksi'] = $this->Transaksi_model->getById($id_transaksi)->row();

        $this->form_validation->set_rules('jenis_transaksi', 'Jenis Transaksi', 'required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');
        $this->form_validation->set_rules('nominal', 'Nominal', 'required');
        $this->form_validation->set_rules('payment_gateway', 'Payment Gateway', 'required');
        $this->form_validation->set_rules('tanggal_transaksi', 'Tanggal Transaksi', 'required');
        $donatur['donatur'] = $this->Donatur_model->getAllDonatur();
        $merchant['merchant'] = $this->Merchant_model->getAllMerchant();

        if ($this->form_validation->run() == false) {

            $this->load->view('templates/header');
            $this->load->view('templates/sidebar', $merchant);
            $this->load->view('templates/topbar', $donatur);
            $this->load->view('transaksi/edit_trans', $data);
            $this->load->view('templates/footer', $data);
            $this->load->library('form_validation');
        } else {
            $this->Transaksi_model->edit();
            redirect('C_transaksi');
        }
    }

    public function update()
    {
        $id_transaksi = $this->input->post("id_transaksi");

        $data['transaksi'] = $this->Transaksi_model->getTransaksiById($id_transaksi);

        $this->form_validation->set_rules('jenis_transaksi', 'Jenis Transaksi', 'required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');
        $this->form_validation->set_rules('nominal', 'Nominal', 'required');
        $this->form_validation->set_rules('payment_gateway', 'Payment Gateway', 'required');
        $this->form_validation->set_rules('tanggal_transaksi', 'Tanggal Transaksi', 'required');
        $donatur['donatur'] = $this->Donatur_model->getAllDonatur();
        $merchant['merchant'] = $this->Merchant_model->getAllMerchant();

        if ($this->form_validation->run() == false) {

            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar', $donatur);
            $this->load->view('transaksi/edit_trans', $merchant);
            $this->load->view('templates/footer', $data);
            $this->load->library('form_validation');
        } else {

            $this->Transaksi_model->update();
            redirect('C_transaksi');
        }
    }

    public function hapus($id_transaksi)
    {
        $id_transaksi = array('id_transaksi' => $id_transaksi);
        $this->Transaksi_model->hapus($id_transaksi, 'transaksi');
        redirect('C_transaksi');
    }
}
