<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_ymd extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Ymd_model');
    }
    public function index()
    {
        $recency = $this->Ymd_model->recency();
        $frequency = $this->Ymd_model->frequency();
        $monetary = $this->Ymd_model->monetary();
        $treshold = $this->Ymd_model->treshold();
        $data['ymd'] = $this->Ymd_model->index();

        for ($i = 1; $i <= count($recency); $i++) {
            if (
                $i == (int)$treshold[0]->ta
            ) {
                $data['ra'] = $recency[$i - 1];
            }
        }

        for ($i = 1; $i <= count($recency); $i++) {
            if (
                $i == (int)$treshold[0]->tb
            ) {
                $data['rb'] = $recency[$i - 1];
            }
        }

        for ($i = 1; $i <= count($frequency); $i++) {
            if ($i == (int)$treshold[0]->ta) {
                $data['fa'] = $frequency[$i - 1];
            }
        }

        for ($i = 1; $i <= count($frequency); $i++) {
            if ($i == (int)$treshold[0]->tb) {
                $data['fb'] = $frequency[$i - 1];
            }
        }

        for ($i = 1; $i <= count($monetary); $i++) {
            if ($i == (int)$treshold[0]->ta) {
                $data['ma'] = $monetary[$i - 1];
                // var_dump($data['ma']);
            }
        }

        for ($i = 1; $i <= count($monetary); $i++) {
            if ($i == (int)$treshold[0]->tb) {
                $data['mb'] = $monetary[$i - 1];
                // var_dump($data['mb']);
            }
        }

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('ymd/index_ymd', $data);
        $this->load->view('templates/footer');
    }
}
