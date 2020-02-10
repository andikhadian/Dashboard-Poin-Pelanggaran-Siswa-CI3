<?php
date_default_timezone_set('Asia/Jakarta'); ?>
<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="<?= base_url('Guru/Dashboard'); ?>">POLANSIS</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="<?= base_url('Guru/Dashboard'); ?>">PS</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Guru</li>
            <li class="nav-item">
                <a href="<?= base_url('Guru/Dashboard'); ?>" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
            </li>
            <li class="menu-header">Master</li>
            <li class="nav-item active">
                <a href="<?= base_url('Guru/Pelanggar'); ?>" class="nav-link"><i class="fas fa-user-tie"></i> <span>Pelanggar</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('Guru/Jenispelanggaran'); ?>"><i class="fas fa-exclamation"></i>
                    <span>Jenis Pelanggaran</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('Guru/Siswa'); ?>"><i class="fas fa-users"></i> <span>Siswa</span></a>
            </li>
        </ul>

        <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
            <a href="<?= base_url('Auth/logout') ?>" class="btn btnLogout btn-warning btn-lg btn-block btn-icon-split">
                <i class="fas fa-sign-out-alt"></i> Logout
            </a>
        </div>
    </aside>
</div>




<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Tambah Pelanggar</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active">
                    <a href="<?= base_url('Guru/Dashboard') ?>">Dashboard</a>
                </div>
                <div class="breadcrumb-item active">
                    <a href="<?= base_url('Guru/Pelanggar') ?>">Pelanggar</a>
                </div>
                <div class="breadcrumb-item">Tambah Pelanggar</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Aturan</h2>
            <p class="section-lead">
                Disini anda dapat Melihat, Mencari, Mengubah, dan Menghapus
                Pelanggar
            </p>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row mt-4 mb-5">
                            <div class="col-12 col-lg-8 offset-lg-2">
                                <div class="wizard-steps">
                                    <div class="wizard-step wizard-step-success">
                                        <div class="wizard-step-icon">
                                            <i class="fas fa-check"></i>
                                        </div>
                                        <div class="wizard-step-label">
                                            Jenis Pelanggaran
                                        </div>
                                    </div>
                                    <div class="wizard-step wizard-step-success">
                                        <div class="wizard-step-icon">
                                            <i class="fas fa-check"></i>
                                        </div>
                                        <div class="wizard-step-label">
                                            Kelas
                                        </div>
                                    </div>
                                    <div class="wizard-step wizard-step-success">
                                        <div class="wizard-step-icon">
                                            <i class="fas fa-check"></i>
                                        </div>
                                        <div class="wizard-step-label">
                                            Siswa
                                        </div>
                                    </div>
                                    <div class="wizard-step wizard-step-warning">
                                        <div class="wizard-step-icon">
                                            <i class="fas fa-tasks"></i>
                                        </div>
                                        <div class="wizard-step-label">
                                            Kesimpulan
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <form class="wizard-content mt-2" method="POST" action="">
                            <div class="wizard-pane">
                                <div class="row mx-auto justify-content-center">
                                    <div class="col-md-8">
                                        <div class="card card-warning" id="sample-login">
                                            <form>
                                                <div class="card-header">
                                                    <h4>Data Pelanggar</h4>
                                                </div>
                                                <div class="card-body pb-0">
                                                    <p class="text-muted">Berikut adalah seluruh data pelanggar yang sudah anda pilih</p>
                                                    <div class="form-group">
                                                        <label>Tanggal Melanggar</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <div class="input-group-text">
                                                                    <i class="fas fa-calendar"></i>
                                                                </div>
                                                            </div>
                                                            <input type="text" class="form-control" name="tgl" placeholder="<?= date('d M Y, G:i:s A'); ?>" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Nama Siswa</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <div class="input-group-text">
                                                                    <i class="fas fa-user"></i>
                                                                </div>
                                                            </div>
                                                            <input type="text" class="form-control" name="nama" placeholder="<?= $isSiswa->nama; ?>" value="" <?= $isSiswa->nama; ?>" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Kelas</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <div class="input-group-text">
                                                                    <i class="fas fa-chalkboard"></i>
                                                                </div>
                                                            </div>
                                                            <input type="text" class="form-control" name="kelas" placeholder="<?= $isKelas->kelas; ?>" value="" <?= $isKelas->kelas; ?>" readonly>
                                                        </div>
                                                    </div>
                                                    <input type="hidden" name="jenisPelanggaranId" value="<?= $isPelanggaran->jenis_pelanggaran_id; ?>">
                                                    <div class="form-group">
                                                        <label>Jenis Pelanggaran</label>
                                                        <textarea class="form-control" name="jenisPelanggaran" style="height: 100px;" placeholder="<?= $isPelanggaran->jenis_pelanggaran ?>" readonly></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Points</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <div class="input-group-text">
                                                                    <i class="fas fa-exclamation-circle"></i>
                                                                </div>
                                                            </div>
                                                            <input type="text" class="form-control" name="points" value="" <?= $isPelanggaran->point; ?>" placeholder="<?= $isPelanggaran->point; ?> Points" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                        <div class="card-footer">
                                            <p class="text-muted text-center">Pastikan data yang anda masukan sudah sesuai sebelum menekan lapor sekarang.</p>

                                            <a href="<?= base_url('Guru/Pelanggar/lapor/') . $isPelanggaran->jenis_pelanggaran_id . '/' . $isSiswa->siswa_id; ?>" class="btn btn-lg btn-block btn-warning btnLapor" id="btnLapor">Lapor Sekarang</a>

                                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </form>
</div>
</div>
</div>
</div>
</section>
</div>