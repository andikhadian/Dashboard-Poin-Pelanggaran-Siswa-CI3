<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->library('form_validation');
        $this->load->model('Admin_Model', 'admin');
        $this->load->model('Auth_Model', 'auth');
        $this->load->library('Pdf');
    }

    public function index()
    {
        $data['title'] = 'User &mdash; Polansis';
        $S_UserId = [
            'user_id' => $this->session->userdata('user_id')
        ];
        $data['user'] = $this->auth->getWhere('user', $S_UserId);
        $data['lastOnline'] = last_login();

        $data['allUser'] = $this->admin->getUserJoin();

        $this->load->view('templates/topbar', $data);
        $this->load->view('Admin/User/index', $data);
        $this->load->view('templates/footer');
    }
    public function tambah()
    {
        $data['title'] = 'Tambah User &mdash; Polansis';
        $S_UserId = [
            'user_id' => $this->session->userdata('user_id')
        ];
        $data['user'] = $this->auth->getWhere('user', $S_UserId);
        $data['lastOnline'] = last_login();

        $data['role'] = $this->admin->getAll('role');
        $this->form_validation->set_rules('nama', 'Nama', 'required', [
            'required' => 'Nama harus diisi'
        ]);
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required', [
            'required' => 'Jenis Kelamin harus diisi'
        ]);
        $this->form_validation->set_rules('email', 'Email', 'required|is_unique[user.email]', [
            'required' => 'Email harus diisi',
            'is_unique' => 'Email sudah terdaftar, silahkan masukan email yang lain'
        ]);
        $this->form_validation->set_rules('role', 'Role', 'required', [
            'required' => 'Role harus diisi'
        ]);
        $this->form_validation->set_rules('status', 'Status', 'required', [
            'required' => 'Status harus diisi'
        ]);
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/topbar', $data);
            $this->load->view('Admin/User/tambah', $data);
            $this->load->view('templates/footer');
        } else {
            $defaultpassword = 'smkprestasiprima';
            $data = [
                'nama_user' => $this->input->post('nama'),
                'email' => $this->input->post('email'),
                'password' => password_hash($defaultpassword, PASSWORD_DEFAULT),
                'image' => 'default.png',
                'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                'role_id' => $this->input->post('role'),
                'is_active' => $this->input->post('status'),
                'date_created' => time()
            ];
            $this->admin->insert('user', $data);
            $this->session->set_flashdata('notif', 'Ditambah');
            redirect('Admin/User');
        }
    }

    public function ubah($user_id)
    {
        $data['title'] = 'Ubah User &mdash; Polansis';

        $S_UserId = [
            'user_id' => $this->session->userdata('user_id')
        ];
        $A_UserId = [
            'user_id' => $user_id
        ];

        $data['user'] = $this->auth->getWhere('user', $S_UserId);
        $data['lastOnline'] = last_login();
        $data['role'] = $this->admin->getAll('role');
        $data['userById'] = $this->admin->getWhereById('user', $A_UserId);

        $this->form_validation->set_rules('nama', 'Nama', 'required', [
            'required' => 'Nama harus diisi'
        ]);
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required', [
            'required' => 'Jenis Kelamin harus diisi'
        ]);
        if ($data['userById']['email'] != $this->input->post('email')) {
            $this->form_validation->set_rules('email', 'Email', 'required|is_unique[user.email]', [
                'required' => 'Email harus diisi',
                'is_unique' => 'Email sudah terdaftar, silahkan masukan email yang lain'
            ]);
        }
        $this->form_validation->set_rules('role', 'Role', 'required', [
            'required' => 'Role harus diisi'
        ]);
        $this->form_validation->set_rules('status', 'Status', 'required', [
            'required' => 'Status harus diisi'
        ]);
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/topbar', $data);
            $this->load->view('Admin/User/ubah', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'nama_user' => $this->input->post('nama'),
                'email' => $this->input->post('email'),
                'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                'role_id' => $this->input->post('role'),
                'is_active' => $this->input->post('status'),
            ];
            $this->admin->update('user', $A_UserId, $data);
            $this->session->set_flashdata('notif', 'Diubah');
            redirect('Admin/User');
        }
    }

    public function hapus($user_id)
    {
        $A_UserId = [
            'user_id' => $user_id
        ];
        $this->admin->delete('user', $user_id);
        $this->session->set_flashdata('notif', 'Dihapus');
        redirect('Admin/User');
    }

    public function cetak()
    {
        $data['user'] = $this->admin->getuserJoin();
        $this->load->view('Admin/User/cetak', $data);
    }
}
