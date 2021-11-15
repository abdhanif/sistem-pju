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
    // public function tambah()
    // {
    //     $this->form_validation->set_rules('nama', 'Nama', 'required');
    //     $this->form_validation->set_rules('whatsapp', 'Whatsapp', 'required');
    //     $this->form_validation->set_rules('alamat', 'Alamat', 'required');
    //     $this->form_validation->set_rules('kecamatan', 'Kecamatan', 'required');
    //     $this->form_validation->set_rules('kelurahan', 'Kelurahan', 'required');
    //     $this->form_validation->set_rules('laporan', 'Laporan', 'required');
    //     $this->form_validation->set_rules('gambar', 'Gambar', 'required');
    //     $data['deteksi_pju'] = $this->Deteksi_model->getAllDeteksi();

    //     if ($this->form_validation->run() == false) {

    //         $this->load->view('frontend/templates/header');
    //         $this->load->view('frontend/landingpage/index', $data);
    //         $this->load->view('frontend/templates/footer');
    //     } else {
    //         var_dump('sukses upload');
    //         $config['upload_path'] = './upload_dir/';
    //     		$config['allowed_types'] = 'gif|jpg|png';
    //     		$config['max_size'] = 5000;

    //     		$this->load->library('upload', $config);

    //     		if (!$this->upload->do_upload('gambar')){
    //     			$error = array('error' => $this->upload->display_errors());
    //           $this->load->view('frontend/landingpage/index', $error);
    //     		}else{
    //     			$data = array('upload_data' => $this->upload->data());
    //     			$this->load->view('frontend/landingpage/index', $data);

    //           $url_img = $this->upload->data('file_name');
    //           $this->Deteksi_model->tambah($url_img);
    //           redirect('C_landingpage');
    //         }
    //     }
    // }

    public function insert()
    {
        //Input
        $nama = $this->input->post('nama');
        $whatsapp = $this->input->post('whatsapp');
        $alamat = $this->input->post('alamat');
        $kecamatan = $this->input->post('kecamatan');
        $kelurahan = $this->input->post('kelurahan');
        $no_meter = $this->input->post('no_meter');
        $laporan = $this->input->post('laporan');

        $key = $nama;

        //Config Upload
        $file_ext = pathinfo($_FILES["gambar"]['name'], PATHINFO_EXTENSION);
        $new_name = $key . "." . $file_ext;

        $config['file_name'] = $new_name;
        $config['upload_path'] = './upload_dir/';
        $config['allowed_types'] = 'gif|jpg|png|mp4|mkv|jpeg';
        $config['max_size']  = 100000;
        $config['remove_space'] = TRUE;

        $this->load->library('upload', $config);

        $this->upload->initialize($config);

        if (!$this->upload->do_upload('gambar')) {
            $error = array('error' => $this->upload->display_errors());
            $data['error'] = $error;
            $data['content'] = $this->load->view('frontend/landingpage/index', $data, true);
            $this->load->view('frontend/landingpage/index', $data);
        } else {
            $data = array('upload_data' => $this->upload->data());

            $upload = $this->upload->data();
            $confi['image_library'] = 'gd2';
            $confi['source_image'] = $upload['full_path'];

            $this->load->library('image_lib', $config);
            // $this->image_lib->clear();
            $this->image_lib->initialize($confi);
            // $this->image_lib->resize();

            $res = array(
                'nama' => $nama,
                'whatsapp' => $whatsapp,
                'alamat' => $alamat,
                'kecamatan' => $kecamatan,
                'kelurahan' => $kelurahan,
                'no_meter' => $no_meter,
                'laporan' => $laporan,
                'gambar' => $this->upload->data('file_name')
            );

            $this->Deteksi_model->tambah($res);
            $this->session->set_flashdata('deteksi');
            redirect('C_landingpage');
        }
    }
}