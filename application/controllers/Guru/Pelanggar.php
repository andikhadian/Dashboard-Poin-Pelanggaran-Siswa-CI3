<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pelanggar extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->library('form_validation');
        $this->load->model('Auth_Model', 'auth');
        $this->load->model('Guru_Model', 'guru');
        $this->load->library('Pdf');
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

        $data['rowPelanggar'] = $this->guru->getRowByUserId('pelanggar', $S_UserId);
        $data['allPelanggar'] = $this->guru->getJoinPelanggarByUser($user_id);
        $this->load->view('templates/topbar', $data);
        $this->load->view('Guru/Pelanggar/index', $data);
        $this->load->view('templates/footer');
    }

    public function fetchPelanggaran()
    {
        $output = '';
        $query = '';
        if ($this->input->post('query')) {
            $query = $this->input->post('query');
        }
        $data = $this->guru->fetch_dataPelanggaran($query);
        $output .= '<div class="row">';

        if ($data->num_rows() > 0) {
            foreach ($data->result() as $d) {
                $output .= '<div class="col-lg-4 mb-3 mx-auto text-center d-flex align-items-stretch">
            <div class="card card-warning pelanggaran mb-4" id="pelanggaran">
                <h1 class="card-title pricing-card-title text-danger mt-4">' . $d->point . '<small class="text-muted"> Points</small></h1>
                <div class="card-body align-items-center d-flex justify-content-center">
                    <h6 class="text-warning text-uppercase">' . $d->jenis_pelanggaran . '</h6>
                </div>
                <div class="card-footer">
                    <a href="' . base_url('Guru/Pelanggar/tambah/') . $d->jenis_pelanggaran_id . '" class="btn btn-lg btn-block btn-pelanggaran btn-warning">Pilih Kasus</a>
                </div>
            </div>
        </div>
        ';
            }
        } else {
            $output .= '<div class="col-lg-12">
            <div class="empty-state" data-height="400">
            <div class="empty-state-icon">
              <i class="fas fa-question"></i>
            </div>
            <h2>Data tidak ditemukan</h2>
          </div>
            </div>
            ';
        }
        $output .= '</div>';
        echo $output;
    }

    public function fetchKelas()
    {
        $output = '';
        $query = '';
        $kasus = $this->input->post('id_kasus');
        if ($this->input->post('query')) {
            $query = $this->input->post('query');
        }
        $data = $this->guru->fetch_dataKelas($query);
        $output .= '<div class="row">';

        if ($data->num_rows() > 0) {
            foreach ($data->result() as $d) {
                $output .= '<div class="col-12 mx-auto col-md-6 col-lg-3">
                <div class="card card-warning">
                    <div class="card-body text-center mt-3">
                        <h3 class="">' . $d->kelas . '</h3>
                        <p class="text-muted mt-3"> ' . $d->jumlah_siswa . ' Siswa</p>
                    </div>
                    <div class="card-footer">
                        <a href="' . base_url('Guru/Pelanggar/tambah/') . $kasus . '/' . $d->kelas_id . '" class="btn btn-lg btn-block btn-pelanggaran btn-warning">Pilih Kelas</a>
                    </div>
                </div>
            </div>
        ';
            }
        } else {
            $output .= '<div class="col-lg-12">
            <div class="empty-state" data-height="400">
            <div class="empty-state-icon">
              <i class="fas fa-question"></i>
            </div>
            <h2>Data tidak ditemukan</h2>
          </div>
            </div>
            ';
        }
        $output .= '</div>';
        echo $output;
    }

    public function fetchSiswa()
    {
        $output = '';
        $query = '';
        $kasus = $this->input->post('id_kasus');
        $kelas = $this->input->post('id_kelas');
        if ($this->input->post('query')) {
            $query = $this->input->post('query');
        }
        $data = $this->guru->fetch_dataSiswa($query, $kelas);
        $output .= '<div class="row">';



        if ($data->num_rows() > 0) {
            foreach ($data->result() as $d) {
                //cond card Siswa
                $btn = '';
                $color = '';
                $tooltip = '';
                $return = '';

                if ($d->status == 'Aktif') {
                    $color = 'btn-warning';
                } else {
                    $btn = 'style="cursor: not-allowed"';
                    $color = 'btn-secondary';
                    $tooltip = 'data-toggle="tooltip" data-placement="top" title="Point siswa ini sudah habis atau sudah tidak aktif"';
                    $return = 'onclick="return false;"';
                }

                $output .= '<div class="col-md-6 mx-auto col-lg-3 d-flex align-items-stretch text-center">
                <div class="card card-warning w-100">
                    <div class="card-body mt-3 ">
                        <img class="rounded-circle" width="100" src="https://ui-avatars.com/api/?background=FC534B&length=1&bold=true&color=fff&size=128&name=' . $d->nama . '" alt="avatar" />
                        <p class="mt-3 mb-1 text-muted">' . $d->nis . '</p>
                        <h5 class="">' . $d->nama . '</h5>
                        <p class="mt-1 mb-1 text-muted">' . $d->jenis_kelamin . '</p>
                    </div>
                    <div class="card-footer">
                    <a ' . $btn . ' href="' . base_url('Guru/Pelanggar/tambah/') . $kasus . '/' . $kelas . '/' . $d->siswa_id . '" ' . $tooltip . ' class="btn mt-1 btn-lg btn-block btn-pelanggaran ' . $color . '" ' . $return . '>Pilih Siswa</a>
                    </div>
                </div>
            </div>
        ';
            }
        } else {
            $output .= '<div class="col-lg-12">
            <div class="empty-state" data-height="400">
            <div class="empty-state-icon">
              <i class="fas fa-question"></i>
            </div>
            <h2>Data tidak ditemukan</h2>
          </div>
            </div>
            ';
        }
        $output .= '</div>';
        echo $output;
    }

    public function tambah($kasus = 0, $kelas = 0, $siswa = 0)
    {
        $data['title'] = 'Tambah Pelanggar &mdash; Polansis';

        $S_UserId = [
            'user_id' => $this->session->userdata('user_id')
        ];
        $idJenisPelanggaran = [
            'jenis_pelanggaran_id' => $this->uri->segment(4)
        ];
        $idKelas = [
            'kelas_id' => $this->uri->segment(5)
        ];
        $where = [
            'kelas_id' => $this->uri->segment(5)
        ];
        $idSiswa = [
            'siswa_id' => $this->uri->segment(6)
        ];

        $data['user'] = $this->auth->getWhere('user', $S_UserId);
        $data['lastOnline'] = last_login();
        $data['allPelanggaran'] = $this->guru->getOrder('jenis_pelanggaran', 'point', 'ASC')->result_array();
        $data['allKelas'] = $this->guru->getAll('kelas');
        $data['allSiswaByKelas'] = $this->guru->getWhereOrder('siswa', $where, 'nama', 'ASC')->result_array();
        $data['kasus'] = $kasus;
        $data['kelas'] = $kelas;
        $data['siswa'] = $siswa;
        $data['isPelanggaran'] = $this->guru->getWhere('jenis_pelanggaran', $idJenisPelanggaran)->row();
        $data['isKelas'] = $this->guru->getWhere('kelas', $idKelas)->row();
        $data['isSiswa'] = $this->guru->getWhere('siswa', $idSiswa)->row();

        if ($kasus != 0 and $kelas == 0 and $siswa == 0) {
            $this->load->view('templates/topbar', $data);
            $this->load->view('Guru/Pelanggar/tambah2', $data);
            $this->load->view('templates/footer');
        } elseif ($kasus != 0 and $kelas != 0 and $siswa == 0) {
            $this->load->view('templates/topbar', $data);
            $this->load->view('Guru/Pelanggar/tambah3', $data);
            $this->load->view('templates/footer');
        } elseif ($kasus != 0 and $kelas != 0 and $siswa != 0) {
            $this->load->view('templates/topbar', $data);
            $this->load->view('Guru/Pelanggar/kesimpulan', $data);
            $this->load->view('templates/footer');
        } else {
            $this->load->view('templates/topbar', $data);
            $this->load->view('Guru/Pelanggar/tambah', $data);
            $this->load->view('templates/footer');
        }
    }

    public function lapor($idJenisPelanggaran, $idSiswa)
    {
        $tgl = time();
        $user_id = $this->session->userdata('user_id');
        $siswa_id = $idSiswa;
        $jenis_pelanggaran_id = $idJenisPelanggaran;

        $data = [
            'tgl_melanggar' => $tgl,
            'user_id' => $user_id,
            'siswa_id' => $siswa_id,
            'jenis_pelanggaran_id' => $jenis_pelanggaran_id
        ];
        $A_JenisPelanggaran = [
            'jenis_pelanggaran_id' => $idJenisPelanggaran
        ];
        $A_Siswa = [
            'siswa_id' => $idSiswa
        ];

        $poinPelanggaran = $this->db->get_where('jenis_pelanggaran', $A_JenisPelanggaran)->row()->point;
        $poinSiswa = $this->db->get_where('siswa', $A_Siswa)->row()->sisa_point;

        if ($poinSiswa < $poinPelanggaran) {
            $this->guru->countPointZero('siswa', $A_Siswa, 0);
        } elseif ($poinSiswa - $poinPelanggaran == 0) {
            $this->guru->countPointZero('siswa', $A_Siswa, 0);
        } else {
            $this->guru->countPoint('siswa', 'jenis_pelanggaran', $A_JenisPelanggaran, $A_Siswa);
        }
        $this->guru->insert('pelanggar', $data);
        // $this->_email($idSiswa, $jenis_pelanggaran_id, $tgl, 'lapor');
        $this->guru->countCase('jenis_pelanggaran', $A_JenisPelanggaran);
        $this->session->set_flashdata('notif', 'Diunggah');
        redirect('Guru/Pelanggar');
    }

    public function _email($siswa_id, $idJenisPelanggaran, $time, $type)
    {
        $token = '';
        $user_id = $this->session->userdata('user_id');
        $data['pelanggar'] = $this->guru->getJoinPelanggarByUserSiswa($user_id, $siswa_id, $idJenisPelanggaran, $time)->row();
        $message = $this->load->view('templates/email', $data, TRUE);
        $A_Siswa = [
            'siswa_id' => $siswa_id
        ];
        $mailto = $this->guru->getWhere('siswa', $A_Siswa)->row()->email;
        $config = array(
            'protocol' => 'smtp',
            'smtp_host' => 'smtp.mailtrap.io',
            'smtp_port' => 2525,
            'smtp_user' => 'd03cad6de5f232',
            'smtp_pass' => '44654fea138f26',
            'crlf' => "\r\n",
            'newline' => "\r\n",
            'mailtype' => 'html',
            'charset' => 'utf-8',
        );

        $this->load->library('email', $config);
        $this->email->initialize($config);
        $this->email->from('polansispp@gmail.com', 'Polansis SMK Prestasi Prima');
        $this->email->to($mailto);

        if ($type == 'verify') {
            $this->email->subject('Hi, Thanks For the Subscription');
            $this->email->message('Please Activate your account before 24 Hours from now, Click this link to verify your account : <a href="' . base_url() . 'auth/verify?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Activate My Account</a>');
        } elseif ($type == 'forgot') {
            $this->email->subject('Reset Password');
            $this->email->message('Please Reset your password before 24 Hours from now, Click this link to reset your password : <a href="' . base_url() . 'auth/resetpassword?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Reset My Password.</a>');
        } elseif ($type == 'lapor') {
            $this->email->subject('Anda Telah Terindikasi Melanggar Peraturan Sekolah');
            $this->email->message($message);
        }

        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }

    public function cetak()
    {
        $data['pelanggar'] = $this->guru->getAllByDesc();
        $this->load->view('Guru/Pelanggar/cetak', $data);
    }
}
