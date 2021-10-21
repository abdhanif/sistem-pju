<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_karyawan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('pagination');
        $this->load->model('Karyawan_model');
        $this->load->library('form_validation');
        $this->load->helper('text');
        $this->load->model("Mlogin");
        $this->Mlogin->Check_Login();
    }

    public function index()
    {
        //konfigurasi pagination
        $config['base_url'] = site_url('C_karyawan/index'); //site url
        $config['total_rows'] = $this->db->count_all('data_karyawan'); //total row
        $config['per_page'] = 10;  //show record per halaman
        $config["uri_segment"] = 3;  // uri parameter
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);

        // Membuat Style pagination untuk BootStrap v4
        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';

        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        //panggil function get_mahasiswa_list yang ada pada mmodel mahasiswa_model. 
        $data['data'] = $this->Karyawan_model->get_karyawan_list($config["per_page"], $data['page']);
        $data['pagination'] = $this->pagination->create_links();
        $data['karyawan'] = $this->Karyawan_model->getAllKaryawan();

        //load view mahasiswa view
        $this->load->view('backend/templates/header');
        $this->load->view('backend/templates/sidebar');
        $this->load->view('backend/templates/topbar');
        $this->load->view('backend/data_karyawan/index', $data);
        $this->load->view('backend/data_karyawan/tambah');
        $this->load->view('backend/data_karyawan/edit');
        $this->load->view('backend/templates/footer');
    }
    // public function index()
    // {
    //     $data['karyawan'] = $this->Karyawan_model->getAllKaryawan();

    //     $this->load->view('backend/templates/header');
    //     $this->load->view('backend/templates/sidebar');
    //     $this->load->view('backend/templates/topbar');
    //     $this->load->view('backend/data_karyawan/index', $data);
    //     $this->load->view('backend/data_karyawan/tambah');
    //     $this->load->view('backend/data_karyawan/edit');
    //     $this->load->view('backend/templates/footer');
    // }

    public function search()
    {
        $keyword = $this->input->post('keyword');
        $data['karyawan'] = $this->Karyawan_model->search($keyword);
        $this->load->view('backend/templates/header');
        $this->load->view('backend/templates/sidebar');
        $this->load->view('backend/templates/topbar');
        $this->load->view('backend/data_karyawan/search', $data);
        $this->load->view('backend/data_karyawan/tambah');
        $this->load->view('backend/data_karyawan/edit');
        $this->load->view('backend/templates/footer');
    }

    public function tambah()
    {
        $this->form_validation->set_rules('nik', 'NIK', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('gender', 'Gender', 'required');
        $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('no_tlpn', 'No.Telepon', 'required');
        $this->form_validation->set_rules('jabatan', 'Jabatan', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('status_karyawan', 'Status Karyawan', 'required');

        if ($this->form_validation->run() == false) {


            $this->load->view('backend/templates/header');
            $this->load->view('backend/templates/sidebar');
            $this->load->view('backend/templates/topbar');
            $this->load->view('backend/data_karyawan/tambah');
            $this->load->view('backend/templates/footer');
            $this->load->library('form_validation');
        } else {
            $this->Karyawan_model->tambah();
            redirect('C_Karyawan');
        }
    }

    public function edit($id_karyawan)
    {
        $data['karyawan'] = $this->Karyawan_model->getById($id_karyawan)->row();

        $this->form_validation->set_rules('nik', 'NIK', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('gender', 'Gender', 'required');
        $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('no_tlpn', 'No.Telepon', 'required');
        $this->form_validation->set_rules('jabatan', 'Jabatan', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('status_karyawan', 'Status Karyawan', 'required');

        if ($this->form_validation->run() == false) {


            $this->load->view('backend/templates/header');
            $this->load->view('backend/templates/sidebar');
            $this->load->view('backend/templates/topbar');
            $this->load->view('backend/data_karyawan/edit', $data);
            $this->load->view('backend/templates/footer');
            $this->load->library('form_validation');
        } else {
            $this->Karyawan_model->edit();
            redirect('C_Karyawan');
        }
    }

    public function update()
    {
        $id_karyawan = $this->input->post("id_karyawan");
        $data['karyawan'] = $this->Karyawan_model->getById($id_karyawan)->row();
        $data['karyawan'] = $this->Karyawan_model->getKaryawanById($id_karyawan);

        $this->form_validation->set_rules('nik', 'NIK', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('gender', 'Gender', 'required');
        $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('no_tlpn', 'No.Telepon', 'required');
        $this->form_validation->set_rules('jabatan', 'Jabatan', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('status_karyawan', 'Status Karyawan', 'required');

        if ($this->form_validation->run() == false) {


            $this->load->view('backend/templates/header');
            $this->load->view('backend/templates/sidebar');
            $this->load->view('backend/templates/topbar');
            $this->load->view('backend/data_karyawan/edit', $data);
            $this->load->view('backend/templates/footer');
            $this->load->library('form_validation');
        } else {
            $this->Karyawan_model->update();
            redirect('C_Karyawan');
        }
    }

    public function hapus($id_karyawan)
    {
        $id_karyawan = array('id_karyawan' => $id_karyawan);
        $this->Karyawan_model->hapus($id_karyawan, 'data_karyawan');
        redirect('C_karyawan');
    }

    public function export()
    {
        $orders = $this->Karyawan_model->getAllKaryawan();
        $tanggal = date('d-m-Y');

        $pdf = new \TCPDF('l', 'mm', 'A4');
        $pdf->AddPage();
        $pdf->SetFont('', 'B', 20);
        $pdf->Cell(115, 0, "Laporan Order - " . $tanggal, 0, 1, 'L');
        $pdf->SetAutoPageBreak(true, 0);

        // Add Header
        $pdf->Ln(10);
        $pdf->SetFont('', 'B', 12);
        $pdf->Cell(10, 8, "No", 1, 0, 'C');
        $pdf->Cell(55, 8, "NIK", 1, 0, 'C');
        $pdf->Cell(35, 8, "Nama", 1, 0, 'C');
        $pdf->Cell(35, 8, "Tlp", 1, 0, 'C');
        $pdf->Cell(50, 8, "Jabatan", 1, 0, 'C');
        $pdf->SetFont('', '', 12);
        foreach ($orders->result_array() as $k => $order) {
            $this->addRow($pdf, $k + 1, $order);
        }
        $tanggal = date('d-m-Y');
        $pdf->Output('Laporan Order - ' . $tanggal . '.pdf');
    }

    private function addRow($pdf, $no, $order)
    {
        $pdf->Cell(10, 8, $no, 1, 0, 'C');
        $pdf->Cell(55, 8, $order['nik'], 1, 0, '');
        $pdf->Cell(35, 8, $order['nama'], 1, 0, 'C');
        $pdf->Cell(35, 8, $order['no_tlpn'], 1, 0, 'C');
        $pdf->Cell(50, 8, $order['jabatan'], 1, 1, 'L');
        //     $pdf->Cell(35, 8, date('d-m-Y', strtotime($order['tanggal'])), 1, 0, 'C');
        //     $pdf->Cell(35, 8, $order['jumlah'], 1, 0, 'C');
        //     $pdf->Cell(50, 8, "Rp. " . number_format($order['total'], 2, ',', '.'), 1, 1, 'L');
    }

    public function pdf()
    {
        $data['karyawan'] = $this->Karyawan_model->getAllKaryawan();

        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        $pdf->setPrintFooter(false);
        $pdf->setPrintHeader(false);
        $pdf->SetAutoPageBreak(true, PDF_MARGIN_BOTTOM);
        $pdf->AddPage('');
        $pdf->Write(0, 'Simpan ke PDF - Jaranguda.com', '', 0, 'L', true, 0, false, false, 0);
        $pdf->SetFont('');

        foreach ($data as $k) {
            $tabel = '<table border="1">
              <tr>
                    <th> <b>Provinsi</b> </th>
                    <th> <b>Jumlah Penduduk</b> </th>
              </tr>
              <tr>
                    <td> echo "Hello World!"; </td>
              </tr>
              </table>
              ';
        }
        $pdf->writeHTML($tabel);
        $pdf->Output('file-pdf-codeigniter.pdf', 'I');
    }

    // public function cetak()
    // {
    //     $this->load->library('mypdf');
    //     $data['data'] = array(
    //         ['nik' => '22222', 'nama' => 'Abdurrahman Hanif', 'status' => 'Tetap'],
    //         ['nik' => '1111', 'nama' => 'Abdurrahman Hanif', 'status' => 'Tetap']
    //     );
    //     $this->mypdf->generate('backend/data_karyawan/cetak', $data, 'laporan-mahasiswa', 'A4', 'landscape');
    // }

    public function cetak()
    {
        $data['karyawan'] = $this->Karyawan_model->getAllKaryawan()->result();

        $this->load->library('mypdf');
        $this->mypdf->generate('backend/data_karyawan/cetak', $data, 'Laporan-Data-Karyawan', 'A4', 'portrait');
    }
}