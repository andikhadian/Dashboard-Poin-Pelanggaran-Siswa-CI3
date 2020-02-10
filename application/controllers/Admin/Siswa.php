<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Siswa extends CI_Controller
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
        $data['title'] = 'Siswa &mdash; Polansis';
        $S_UserId = [
            'user_id' => $this->session->userdata('user_id')
        ];
        $data['user'] = $this->auth->getWhere('user', $S_UserId);
        $data['lastOnline'] = last_login();

        $data['allSiswa'] = $this->admin->getSiswaJoin();

        $this->load->view('templates/topbar', $data);
        $this->load->view('Admin/Siswa/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $data['title'] = 'Tambah Siswa &mdash; Polansis';
        $S_UserId = [
            'user_id' => $this->session->userdata('user_id')
        ];
        $data['user'] = $this->auth->getWhere('user', $S_UserId);
        $data['lastOnline'] = last_login();

        $data['allSiswa'] = $this->admin->getSiswaJoin();
        $data['kelas'] = $this->admin->getAll('kelas');

        $this->form_validation->set_rules('nis', 'NIS', 'required|is_unique[siswa.nis]', [
            'required' => 'NIS harus diisi',
            'is_unique' => 'NIS sudah terdaftar, Silahkan masukan nis yang lain'
        ]);
        $this->form_validation->set_rules('nama', 'Nama', 'required', [
            'required' => 'Nama harus diisi'
        ]);
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required', [
            'required' => 'Jenis Kelamin harus diisi'
        ]);
        $this->form_validation->set_rules('kelas', 'kelas', 'required', [
            'required' => 'Kelas harus diisi'
        ]);
        $this->form_validation->set_rules('hp', 'No Handphone', 'required', [
            'required' => 'No Handphone harus diisi'
        ]);
        $this->form_validation->set_rules('email', 'Email', 'required', [
            'required' => 'Email harus diisi'
        ]);
        $this->form_validation->set_rules('point', 'Point', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required', [
            'required' => 'Status harus diisi'
        ]);
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/topbar', $data);
            $this->load->view('Admin/Siswa/tambah', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'nis' => $this->input->post('nis'),
                'nama' => $this->input->post('nama'),
                'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                'kelas_id' => $this->input->post('kelas'),
                'no_hp' => $this->input->post('hp'),
                'email' => $this->input->post('email'),
                'sisa_point' => $this->input->post('point'),
                'status' => $this->input->post('status')
            ];
            $A_idKelas = [
                'kelas_id' => $this->input->post('kelas')
            ];
            $this->admin->insert('siswa', $data);
            $this->admin->countKelas('kelas', $A_idKelas);
            $this->session->set_flashdata('notif', 'Ditambah');
            redirect('Admin/Siswa');
        }
    }

    public function ubah($siswa_id)
    {
        $data['title'] = 'Ubah Siswa &mdash; Polansis';
        $A_Siswa = [
            'siswa_id' => $siswa_id
        ];
        $S_UserId = [
            'user_id' => $this->session->userdata('user_id')
        ];
        $data['user'] = $this->auth->getWhere('user', $S_UserId);
        $data['lastOnline'] = last_login();
        $data['kelas'] = $this->admin->getAll('kelas');
        $data['siswaId'] = $this->admin->getWhereById('siswa', $A_Siswa);

        if ($data['siswaId']['nis'] != $this->input->post('nis')) {
            $this->form_validation->set_rules('nis', 'NIS', 'required|is_unique[siswa.nis]', [
                'required' => 'NIS harus diisi',
                'is_unique' => 'NIS sudah terdaftar, Silahkan masukan nis yang lain'
            ]);
        }
        $this->form_validation->set_rules('nis', 'NIS', 'required', [
            'required' => 'NIS harus diisi'
        ]);
        $this->form_validation->set_rules('nama', 'Nama', 'required', [
            'required' => 'Nama harus diisi'
        ]);
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required', [
            'required' => 'Jenis Kelamin harus diisi'
        ]);
        $this->form_validation->set_rules('kelas', 'kelas', 'required', [
            'required' => 'Kelas harus diisi'
        ]);
        $this->form_validation->set_rules('hp', 'No Handphone', 'required', [
            'required' => 'No Handphone harus diisi'
        ]);
        $this->form_validation->set_rules('email', 'Email', 'required', [
            'required' => 'Email harus diisi'
        ]);
        $this->form_validation->set_rules('status', 'Status', 'required', [
            'required' => 'Status harus diisi'
        ]);
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/topbar', $data);
            $this->load->view('Admin/Siswa/ubah', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'nis' => $this->input->post('nis'),
                'nama' => $this->input->post('nama'),
                'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                'kelas_id' => $this->input->post('kelas'),
                'no_hp' => $this->input->post('hp'),
                'email' => $this->input->post('email'),
                'status' => $this->input->post('status')
            ];
            $this->admin->update('siswa', $A_Siswa, $data);
            $this->session->set_flashdata('notif', 'Diubah');
            redirect('Admin/Siswa');
        }
    }

    public function hapus($siswa_id)
    {
        $A_Siswa = [
            'siswa_id' => $siswa_id
        ];
        $this->admin->deleteSiswaAndKelas('siswa', $A_Siswa);
        $this->session->set_flashdata('notif', 'Dihapus');
        redirect('Admin/Siswa');
    }

    public function cetak()
    {
        $data['siswa'] = $this->admin->getSiswaJoin();
        $this->load->view('Admin/Siswa/cetak', $data);
    }
}
