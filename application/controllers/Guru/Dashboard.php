<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
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
        $data['title'] = 'Dashboard &mdash; Polansis';
        $A_UserId = [
            'user_id' => $this->session->userdata('user_id')
        ];
        $data['user'] = $this->auth->getWhere('user', $A_UserId);
        $data['lastOnline'] = last_login();

        $pelanggar = $this->guru->getAll('pelanggar');
        $data['latestReportByAll'] = $this->guru->getAllByDesc();
        $data['latestReportById'] = $this->guru->getJoinPelanggarLimitByUser($this->session->userdata('user_id'));
        $data['rowPelanggar'] = $this->guru->getRowByUserId('pelanggar', $A_UserId);
        $data['countJenisPelanggaran'] = $this->guru->getNum('jenis_pelanggaran');
        $data['countPelanggar'] = $this->guru->getNum('pelanggar');
        $data['countSiswa'] = $this->guru->getNum('siswa');
        $data['countKelas'] = $this->guru->getNum('kelas');
        $data['noMostCase'] = $this->guru->mostCase('jenis_pelanggaran')->num_rows();
        $data['mostCase'] = $this->guru->mostCase('jenis_pelanggaran')->result_array();
        $data['poinRendah'] = $this->guru->siswaBadung()->num_rows();
        $data['siswaTerburuk'] = $this->guru->siswaBadung()->result_array();

        $i = 0;
        date_default_timezone_set('Asia/Jakarta');
        $now = date('j M');
        foreach ($pelanggar as $p) {
            if ($now ==  date('j M', $p['tgl_melanggar'])) {
                $i++;
            }
        }
        $data['countPelanggarHariIni'] = $i;

        $this->load->view('templates/topbar', $data);
        $this->load->view('Guru/index', $data);
        $this->load->view('templates/footer');
    }
}
