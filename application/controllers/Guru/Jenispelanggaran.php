<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jenispelanggaran extends CI_Controller
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
        $data['title'] = 'Pelanggar &mdash; Polansis';
        $user_id = $this->session->userdata('user_id');
        $S_UserId = [
            'user_id' => $this->session->userdata('user_id')
        ];
        $data['user'] = $this->auth->getWhere('user', $S_UserId);
        $data['lastOnline'] = last_login();
        $data['allJenisPelanggaran'] = $this->guru->getAll('jenis_pelanggaran');
        $this->load->view('templates/topbar', $data);
        $this->load->view('Guru/Jenispelanggaran/index', $data);
        $this->load->view('templates/footer');
    }
}
