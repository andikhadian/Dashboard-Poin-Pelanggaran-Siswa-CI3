<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->library('form_validation');
        $this->load->model('Admin_Model', 'admin');
        $this->load->model('Auth_Model', 'auth');
    }

    public function index()
    {
        $data['title'] = 'Dashboard &mdash; Polansis';
        $S_UserId = [
            'user_id' => $this->session->userdata('user_id')
        ];
        $data['user'] = $this->auth->getWhere('user', $S_UserId);
        $data['lastOnline'] = last_login();

        $data['countUser'] = $this->admin->getNum('user');
        $data['countPelanggaran'] = $this->admin->getNum('jenis_pelanggaran');
        $data['countKelas'] = $this->admin->getNum('kelas');
        $data['countSiswa'] = $this->admin->getNum('siswa');
        $data['latestUser'] = $this->admin->getDesc('user');

        $this->load->view('templates/topbar', $data);
        $this->load->view('Admin/index', $data);
        $this->load->view('templates/footer');
    }
}
