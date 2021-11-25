public function index()
{
$this->form_validation->set_rules('user_email', 'User Email', 'trim|required|valid_email');
$this->form_validation->set_rules('user_password', 'User Password', 'trim|required');
if ($this->form_validation->run() == false) {

$this->load->view('templates/auth_header');
$this->load->view('auth/login');
$this->load->view('templates/auth_footer');
} else {

$email = $this->input->post('user_email');
$password = $this->input->post('user_password');

$user = $this->db->get_where('table_user', ['user_email' => $email])->row_array();

if ($user) {
if (password_verify($password, $user['user_password'])) {
if ($user['user_status'] == 'Aktif') {
$this->session->set_userdata('logged_in', TRUE);
$this->session->set_userdata('user', $email);
if ($user['user_akses'] == 'Staf') {
$name = $user['user_name'];
$this->session->set_userdata('access', 'Administrator');
$this->session->set_userdata('id', $id);
$this->session->set_userdata('name', $name);
redirect('C_dashboard');
} else if ($user['user_akses'] == 'Teknisi') { //Teknisi
$name = $user['user_name'];
$this->session->set_userdata('access', 'Teknisi');
$this->session->set_userdata('id', $id);
$this->session->set_userdata('name', $name);
redirect('C_dashboard');
} else if ($user['user_akses'] == 'Masyarakat') { //Mayarakat
$name = $user['user_name'];
$this->session->set_userdata('access', 'Masyarakat');
$this->session->set_userdata('id', $id);
$this->session->set_userdata('name', $name);
redirect('C_pengaduan');

} else {
$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Minta Verifikasi Admin !
</div>');
redirect('auth');
}
} else {
$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password salah!
</div>');
redirect('auth');
}
} else {
$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
    Akun anda belum di Registrasi!
</div>');
redirect('auth');
}
}