<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Siswa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->library('form_validation');
        $this->load->model('Auth_Model', 'auth');
        $this->load->model('Guru_Model', 'guru');
    }

    public function index()
    {
        $data['title'] = 'Siswa &mdash; Polansis';
        $user_id = $this->session->userdata('user_id');
        $S_UserId = [
            'user_id' => $this->session->userdata('user_id')
        ];
        $data['user'] = $this->auth->getWhere('user', $S_UserId);
        $data['lastOnline'] = last_login();
        $data['allSiswa'] = $this->guru->getSiswaJoin()->result_array();
        $this->load->view('templates/topbar', $data);
        $this->load->view('Guru/Siswa/index', $data);
        $this->load->view('templates/footer');
    }

    public function infopelanggaran($siswa_id)
    {
        $data['title'] = 'Info Pelanggaran Siswa &mdash; Polansis';
        $user_id = $this->session->userdata('user_id');
        $S_UserId = [
            'user_id' => $this->session->userdata('user_id')
        ];

        $data['user'] = $this->auth->getWhere('user', $S_UserId);
        $data['lastOnline'] = last_login();
        $data['siswaById'] = $this->guru->getSiswaByIdJoin($siswa_id)->row_array();
        $data['pelanggarBySiswa'] = $this->guru->getJoinPelanggarBySiswa($siswa_id)->result_array();
        $data['rowPelanggarBySiswa'] = $this->guru->getJoinPelanggarBySiswa($siswa_id)->num_rows();
        $this->load->view('templates/topbar', $data);
        $this->load->view('Guru/Siswa/infopelanggaran', $data);
        $this->load->view('templates/footer');
    }
}
