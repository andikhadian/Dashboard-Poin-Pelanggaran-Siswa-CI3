<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Admin_Model', 'admin');
        $this->load->model('Auth_Model', 'auth');
    }

    public function index()
    {
        $data['title'] = "Login &mdash; Polansis";
        if ($this->session->userdata('email')) {
            if ($this->session->userdata('role_id') == 1) {
                redirect('Admin/Dashboard');
            } elseif ($this->session->userdata('role_id') == 2) {
                redirect('Guru/Dashboard');
            }
        }
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email', [
            'required' => 'Anda Harus Mengisi Email',
            'valid_email' => 'Email Anda Harus Diisi Sesuai Format Email. cth:example@example.com'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'trim|required', [
            'required' => 'Anda Harus Mengisi Password'
        ]);
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('Auth/login', $data);
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $email = [
            'email' => $this->input->post('email')
        ];
        $password = $this->input->post('password');

        $user = $this->auth->getWhere('user', $email);
        if ($user) {
            if ($user['is_active'] == 1) {
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'user_id' => $user['user_id'],
                        'email' => $user['email'],
                        'role_id' => $user['role_id']
                    ];
                    $this->session->set_userdata($data);
                    if ($password == 'smkprestasiprima') {
                        $this->session->set_flashdata('message', '
                        <div class="hero bg-primary text-white mb-4">
                          <div class="hero-inner">
                            <h2>Selamat Bergabung, ' . $user['nama_user'] . '</h2>
                            <p class="lead">Sebelum kamu menggunakan sistem ini, Silahkan ubah password bawaan anda untuk keamanan akun.</p>
                            <div class="mt-4">
                              <a href="' . base_url('auth/passwordbaru/') . $user['email'] . '" class="btn btn-outline-white btn-lg btn-icon icon-left"><i class="fas fa-key"></i> Ubah Password</a>
                            </div>
                          </div>
                        </div>
                        ');
                        if ($user['role_id'] == 1) {
                            redirect('Admin/Dashboard');
                        } elseif ($user['role_id'] == 2) {
                            redirect('Guru/Dashboard');
                        }
                    } else {
                        if ($user['role_id'] == 1) {
                            $this->session->set_flashdata('message', ' <div class="alert alert-success alert-dismissible fade show" role="alert">
                            Selamat Datang<strong> ' . $user['nama_user'] . '</strong> ! Saat ini Anda masuk sebagai  <strong>Admin</strong>. Tutup pesan ini jika sudah paham
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button></div>');
                            redirect('Admin/Dashboard');
                        } elseif ($user['role_id'] == 2) {
                            $this->session->set_flashdata('message', ' <div class="alert alert-success alert-dismissible fade show" role="alert">
                            Selamat Datang<strong> ' . $user['nama_user'] . '</strong> ! Saat ini Anda masuk sebagai <strong>Guru</strong>. Tutup pesan ini jika sudah paham
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button></div>');
                            redirect('Guru/Dashboard');
                        }
                    }
                } else {
                    $this->session->set_flashdata('message', ' 
                <div class="alert alert-danger">
                  Password Anda salah, Silahkan di cek kembali
                </div>');
                    redirect('Auth');
                }
            } elseif ($user['is_active'] == 0) {
                $this->session->set_flashdata('message', ' 
            <div class="alert alert-danger">
              Email Anda belum aktif, Silahkan verifikasi
            </div>');
                redirect('Auth');
            } elseif ($user['is_active'] == 2) {
                $this->session->set_flashdata('message', ' 
                <div class="alert alert-danger">
                  Akun Anda sudah dibekukan, Silahkan hubungi admin untuk melakukan banding
                </div>');
                redirect('Auth');
            }
        } else {
            $this->session->set_flashdata('message', ' 
            <div class="alert alert-danger">
              Email Anda belum terdaftar, Silahkan buat akun
            </div>');
            redirect('Auth');
        }
    }

    public function registrasi()
    {
        $data['title'] = "Registrasi &mdash; Polansis";
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim', [
            'required' => 'Anda Harus Mengisi Nama Lengkap'
        ]);
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
            'required' => 'Anda Harus Mengisi Email',
            'valid_email' => 'Email Anda Harus Diisi Sesuai Format Email. cth:example@example.com',
            'is_unique' => 'Email ini Sudah Terdaftar, Silahkan Masukan Email Lain'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[5]|matches[password2]', [
            'required' => 'Anda Harus Mengisi Password',
            'matches' => 'Password Anda Tidak Sama, Tolong Periksa Lagi',
            'min_length' => 'Password Anda Terlalu Pendek'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]', [
            'required' => 'Anda Harus Mengisi Password'
        ]);
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('auth/registrasi', $data);
        } else {
            $data = [
                'nama_user' => htmlspecialchars($this->input->post('nama')),
                'email' => htmlspecialchars($this->input->post('email')),
                'image' => 'default.png',
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'jenis_kelamin' => 'Ganda',
                'role_id' => 2,
                'is_active' => 1,
                'date_created' => time(),
                'last_login' => 0

            ];
            $this->admin->insert('user', $data);
            $this->session->set_flashdata('message', ' 
            <div class="alert alert-success">
              Selamat! Akun Anda berhasil dibuat. Silahkan Login
            </div>');
            redirect('Auth');
        }
    }
    public function passwordbaru($user_id)
    {
        $data['title'] = "Password Baru &mdash; Polansis";
        $data['email'] = $user_id;
        $this->load->view('Auth/Passwordbaru', $data);
    }

    public function lupa_password()
    {

        $data['title'] = "Lupa Password &mdash; Polansis";
        $this->load->view('auth/lupa-password', $data);
    }

    public function logout()
    {
        date_default_timezone_set("ASIA/JAKARTA");
        $data = [
            'last_login' => time()
        ];
        $user_id = [
            'user_id' => $this->session->userdata('user_id')
        ];
        $this->auth->logout('user', $data, $user_id);
        $this->session->unset_userdata('user_id');
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');
        $this->session->set_flashdata('message', ' 
        <div class="alert alert-success">
          Anda berhasil logout!
        </div>');
        redirect('Auth');
    }
}
