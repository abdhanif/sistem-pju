<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_pengaduan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Deteksi_model');
        $this->load->library('form_validation');
        $this->load->helper('url', 'form');
        $this->load->model("Mlogin");
        $this->Mlogin->Check_Login();
    }
    public function index()
    {
        $this->load->view('frontend/landingpage/pengaduan', array('error' => ' '));
    }

    public function insert()
    {
        //Input
        $nama = $this->input->post('nama');
        $whatsapp = $this->input->post('whatsapp');
        $alamat = $this->input->post('alamat');
        $kecamatan = $this->input->post('kecamatan');
        $kelurahan = $this->input->post('kelurahan');
        $kode_pju_box = $this->input->post('kode_pju_box');
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
            $data['content'] = $this->load->view('frontend/landingpage/pengaduan', $data, true);
            $this->load->view('frontend/landingpage/pengaduan', $data);
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
                'kode_pju_box' => $kode_pju_box,
                'laporan' => $laporan,
                'gambar' => $this->upload->data('file_name')
            );

            $this->Deteksi_model->tambah($res);
            $this->session->set_flashdata('deteksi');
            redirect('C_pengaduan');
        }
    }
}