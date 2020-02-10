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
                                    <div class="wizard-step wizard-step-warning">
                                        <div class="wizard-step-icon">
                                            <i class="fas fa-chalkboard"></i>
                                        </div>
                                        <div class="wizard-step-label">
                                            Kelas
                                        </div>
                                    </div>
                                    <div class="wizard-step">
                                        <div class="wizard-step-icon">
                                            <i class="fas fa-user"></i>
                                        </div>
                                        <div class="wizard-step-label">
                                            Siswa
                                        </div>
                                    </div>
                                    <div class="wizard-step">
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

                        <form class="wizard-content mt-1">
                            <div class="wizard-pane">
                                <div class="row text-center mb-3">
                                    <div class="col-lg-12">
                                        <h3 class="judul" id="judul">Pilih Kelas</h3>
                                    </div>
                                </div>
                                <div class="row justify-content-center mb-5">
                                    <div class="col-lg-8">
                                        <form class="form-inline mr-auto">
                                            <div class="search-element">
                                                <input class="form-control" type="search" id="keywordKelas" placeholder="Cari Nama Kelas..." autofocus>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="text-center" id="resultKelas" data-kasus="<?= $kasus ?>">

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>