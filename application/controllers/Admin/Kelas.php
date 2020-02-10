<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kelas extends CI_Controller
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
        $data['title'] = 'Kelas &mdash; Polansis';
        $A_UserId = [
            'user_id' => $this->session->userdata('user_id')
        ];
        $data['user'] = $this->auth->getWhere('user', $A_UserId);
        $data['lastOnline'] = last_login();

        $data['allKelas'] = $this->admin->getAll('kelas');

        $this->load->view('templates/topbar', $data);
        $this->load->view('Admin/Kelas/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $data['title'] = 'Tambah Kelas &mdash; Polansis';
        $A_UserId = [
            'user_id' => $this->session->userdata('user_id')
        ];
        $data['user'] = $this->auth->getWhere('user', $A_UserId);
        $data['lastOnline'] = last_login();

        $this->form_validation->set_rules('kelas', 'Kelas', 'required|is_unique[kelas.kelas]', [
            'required' => 'Kelas harus diisi',
            'is_unique' => 'Kelas sudah terdaftar, Silahkan masukan kelas yang lain'
        ]);
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/topbar', $data);
            $this->load->view('Admin/Kelas/tambah', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'kelas' => $this->input->post('kelas')
            ];
            $this->admin->insert('kelas', $data);
            $this->session->set_flashdata('notif', 'Ditambah');
            redirect('Admin/Kelas');
        }
    }

    public function ubah($kelas_id)
    {
        $data['title'] = 'Ubah Kelas &mdash; Polansis';
        $A_UserId = [
            'user_id' => $this->session->userdata('user_id')
        ];
        $A_KelasId = [
            'kelas_id' => $kelas_id
        ];
        $data['user'] = $this->auth->getWhere('user', $A_UserId);
        $data['lastOnline'] = last_login();
        $data['kelasById'] = $this->admin->getWhereById('kelas', $A_KelasId);

        if ($data['kelasById']['kelas'] != $this->input->post('kelas')) {
            $this->form_validation->set_rules('kelas', 'Kelas', 'required|is_unique[kelas.kelas]', [
                'required' => 'Kelas harus diisi',
                'is_unique' => 'Kelas sudah terdaftar, Silahkan masukan kelas yang lain'
            ]);
        }
        $this->form_validation->set_rules('kelas', 'Kelas', 'required', [
            'required' => 'Kelas harus diisi',
            'is_unique' => 'Kelas sudah terdaftar, Silahkan masukan kelas yang lain'
        ]);
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/topbar', $data);
            $this->load->view('Admin/Kelas/ubah', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'kelas' => $this->input->post('kelas')
            ];
            $this->admin->update('kelas', $A_KelasId, $data);
            $this->session->set_flashdata('notif', 'Diubah');
            redirect('Admin/Kelas');
        }
    }

    public function hapus($kelas_id)
    {

        $A_KelasId = [
            'kelas_id' => $kelas_id
        ];
        $this->admin->delete('kelas', $A_KelasId);
        $this->session->set_flashdata('notif', 'Dihapus');
        redirect('Admin/Kelas');
    }

    public function cetak()
    {
        $data['kelas'] = $this->admin->getAll('kelas');
        $this->load->view('Admin/Kelas/cetak', $data);
    }
}
