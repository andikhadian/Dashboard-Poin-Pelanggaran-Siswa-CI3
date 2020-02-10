<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jenispelanggaran extends CI_Controller
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
        $data['title'] = 'Jenis Pelanggaran &mdash; Polansis';
        $S_UserId = [
            'user_id' => $this->session->userdata('user_id')
        ];
        $data['user'] = $this->auth->getWhere('user', $S_UserId);
        $data['lastOnline'] = last_login();

        $data['allJenisPelanggaran'] = $this->admin->getAll('jenis_pelanggaran');

        $this->load->view('templates/topbar', $data);
        $this->load->view('Admin/Jenispelanggaran/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $data['title'] = 'Tambah Jenis Pelanggaran &mdash; Polansis';
        $S_UserId = [
            'user_id' => $this->session->userdata('user_id')
        ];
        $data['user'] = $this->auth->getWhere('user', $S_UserId);
        $data['lastOnline'] = last_login();


        $this->form_validation->set_rules('jenispelanggaran', 'Jenis Pelanggaran', 'required', [
            'required' => 'Jenis Pelanggaran harus diisi'
        ]);
        $this->form_validation->set_rules('points', 'Point', 'required', [
            'required' => 'Point harus diisi'
        ]);
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/topbar', $data);
            $this->load->view('Admin/Jenispelanggaran/tambah', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'jenis_pelanggaran' => $this->input->post('jenispelanggaran'),
                'point' => $this->input->post('points')
            ];
            $this->admin->insert('jenis_pelanggaran', $data);
            $this->session->set_flashdata('notif', 'Ditambah');
            redirect('Admin/Jenispelanggaran');
        }
    }

    public function ubah($idJenisPelanggaran)
    {
        $data['title'] = 'Ubah Jenis Pelanggaran &mdash; Polansis';
        $S_UserId = [
            'user_id' => $this->session->userdata('user_id')
        ];
        $A_IdJenisPelanggaran = [
            'jenis_pelanggaran_id' => $idJenisPelanggaran
        ];

        $data['user'] = $this->auth->getWhere('user', $S_UserId);
        $data['lastOnline'] = last_login();
        $data['jenisPelanggaranById'] = $this->admin->getWhereById('jenis_pelanggaran', $A_IdJenisPelanggaran);

        $this->form_validation->set_rules('jenispelanggaran', 'Jenis Pelanggaran', 'required', [
            'required' => 'Jenis Pelanggaran harus diisi'
        ]);
        $this->form_validation->set_rules('points', 'Point', 'required', [
            'required' => 'Jenis Pelanggaran harus diisi'
        ]);
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/topbar', $data);
            $this->load->view('Admin/Jenispelanggaran/ubah', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'jenis_pelanggaran' => $this->input->post('jenispelanggaran'),
                'point' => $this->input->post('points')
            ];
            $this->admin->update('jenis_pelanggaran', $A_IdJenisPelanggaran, $data);
            $this->session->set_flashdata('notif', 'Diubah');
            redirect('Admin/Jenispelanggaran');
        }
    }

    public function hapus($idJenisPelanggaran)
    {

        $A_IdJenisPelanggaran = [
            'jenis_pelanggaran_id' => $idJenisPelanggaran
        ];
        $this->admin->delete('jenis_pelanggaran', $A_IdJenisPelanggaran);
        $this->session->set_flashdata('notif', 'Dihapus');
        redirect('Admin/Jenispelanggaran');
    }

    public function cetak()
    {
        $data['jenisPelanggaran'] = $this->admin->getAll('jenis_pelanggaran');
        $this->load->view('Admin/Jenispelanggaran/cetak', $data);
    }
}
