<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_dashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Dashboard_model');
    }
    public function index()
    {
        $data['dashboard'] = $this->Dashboard_model->index();
        $data['all'] = $this->Dashboard_model->all();
        $data['allDonatur'] = $this->Dashboard_model->allDonatur();
        $data['allNominal'] = $this->Dashboard_model->allNominal();
        // $donatur['donatur'] = $this->Dashboard_model->donatur();
        // $merchant['merchant'] = $this->Dashboard_model->merchant();

        $this->load->view('backend/templates/header');
        $this->load->view('backend/templates/sidebar');
        $this->load->view('backend/templates/topbar', $data);
        $this->load->view('dashboard/index');
        $this->load->view('backend/templates/footer');
    }
}
