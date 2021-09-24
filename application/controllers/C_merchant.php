<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_merchant extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Merchant_model');
        $this->load->library('form_validation');
    }
    public function index()
    {
        $data['merchant'] = $this->Merchant_model->getAllMerchant();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('merchant/index', $data);
        $this->load->view('merchant/tambah_merc');
        $this->load->view('merchant/edit');
        $this->load->view('templates/footer');
    }

    public function search()
    {
        $keyword = $this->input->post('keyword');
        $data['merchant'] = $this->Merchant_model->search($keyword);
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('merchant/index', $data);
        $this->load->view('merchant/tambah_merc');
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $this->form_validation->set_rules('name_merchant', 'Name Merchant', 'required');

        if ($this->form_validation->run() == false) {


            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar');
            $this->load->view('merchant/tambah_merc');
            $this->load->view('templates/footer');
            $this->load->library('form_validation');
        } else {
            $this->Merchant_model->tambah();
            redirect('C_merchant');
        }
    }

    public function hapus($id_merchant)
    {
        $id_merchant = array('id_merchant' => $id_merchant);
        $this->Merchant_model->hapus($id_merchant, 'merchant');
        redirect('C_merchant');
    }

    public function edit($id_merchant)
    {

        $data['merchant'] = $this->Merchant_model->getById($id_merchant)->row();

        $this->form_validation->set_rules('name_merchant', 'Name Merchant', 'required');

        if ($this->form_validation->run() == false) {

            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar');
            $this->load->view('merchant/edit', $data);
            $this->load->view('templates/footer');
            $this->load->library('form_validation');
        } else {
            $this->Merchant_model->edit();
            redirect('C_Merchant');
        }
    }

    public function update()
    {
        $id_merchant = $this->input->post("id_merchant");

        $data['merchant'] = $this->Merchant_model->getMerchantById($id_merchant);


        $this->form_validation->set_rules('name_merchant', 'Name Merchant', 'required');


        if ($this->form_validation->run() == false) {


            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar');
            $this->load->view('merchant/edit', $data);
            $this->load->view('templates/footer');
            $this->load->library('form_validation');
        } else {
            $this->Merchant_model->update();
            redirect('C_merchant');
        }
    }
}
