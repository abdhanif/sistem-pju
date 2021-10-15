<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_dashboard extends CI_Controller
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

        $this->load->view('templates/header');
        $this->load->view('templates/user_sidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('dashboard/user_dash');
        $this->load->view('templates/footer');
    }
}
