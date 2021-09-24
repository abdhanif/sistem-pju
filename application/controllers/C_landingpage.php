<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_landingpage extends CI_Controller
{
    public function index()
    {
        $this->load->view('frontend/templates/header');
        $this->load->view('frontend/landingpage/index');
        $this->load->view('frontend/templates/footer');
    }
}
