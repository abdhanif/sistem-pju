<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_landingpage extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Deteksi_model');
        $this->load->library('form_validation');
        $this->load->helper('url', 'form');
    }
    public function index()
    {
        $this->load->view('frontend/templates/header');
        $this->load->view('frontend/landingpage/index', array('error' => ' '));
        $this->load->view('frontend/templates/footer');
    }
}