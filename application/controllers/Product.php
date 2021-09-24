<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Product extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Coba');
    }
    public function edit($id_pju)
    {
        $data['data_pju'] = $this->Coba_model->lihat($id_pju)->row();
        $this->load->view('coba', $data);
    }
}
