<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="<?= base_url('Admin/Dashboard'); ?>">Polansis</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="<?= base_url('Admin/Dashboard'); ?>">Ps</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Admin</li>
            <li class="nav-item active">
                <a href="<?= base_url('Admin/Dashboard'); ?>" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
            </li>
            <li class="menu-header">Master</li>
            <li class="nav-item">
                <a href="<?= base_url('Admin/User') ?>" class="nav-link"><i class="fas fa-user-tie"></i> <span>User</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('Admin/Jenispelanggaran') ?>"><i class="fas fa-exclamation"></i>
                    <span>Jenis Pelanggaran</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('Admin/Kelas') ?>"><i class="fas fa-chalkboard-teacher"></i>
                    <span>Kelas</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('Admin/Siswa') ?>"><i class="fas fa-users"></i> <span>Siswa</span></a>
            </li>
        </ul>

        <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
            <a href="<?= base_url('Auth/logout') ?>" class="btn btn-warning btn-lg btn-block btn-icon-split">
                <i class="fas fa-sign-out-alt"></i> Logout
            </a>
        </div>
    </aside>
</div>
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Dashboard</h1>
        </div>
        <?= $this->session->flashdata('message'); ?>
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-info">
                        <i class="fas fa-user-tie"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>User</h4>
                        </div>
                        <div class="card-body">
                            <?= $countUser; ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-danger">
                        <i class="fas fa-exclamation"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Pelanggaran</h4>
                        </div>
                        <div class="card-body">
                            <?= $countPelanggaran; ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-warning">
                        <i class="fas fa-chalkboard-teacher"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Kelas</h4>
                        </div>
                        <div class="card-body">
                            <?= $countKelas; ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-success">
                        <i class="fas fa-users"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Siswa</h4>
                        </div>
                        <div class="card-body">
                            <?= $countSiswa; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 col-md-12 col-12 col-sm-12 mb-4">
                <div class="hero align-items-center bg-warning text-white">
                    <div class="hero-inner text-center">
                        <h2>Apa Saja Yang Bisa Dilakukan Administrator</h2>
                        <p class="lead mt-4">
                            Akun anda sudah diatur untuk bisa mengakses halaman
                            Administrator, Untuk itu anda harus mengetahui fitur apa
                            saja yang bisa dilakukan di halaman ini.
                        </p>
                        <div class="row mt-4">
                            <div class="col-md-6 offset-md-1">
                                <ul class="text-left">
                                    <li class="font-weight-bold">
                                        Mengelola User
                                    </li>
                                    <li class="font-weight-bold">
                                        Mengelola Jenis Pelanggaran
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-4">
                                <ul class="text-left">
                                    <li class="font-weight-bold">
                                        Mengelola Kelas
                                    </li>
                                    <li class="font-weight-bold">
                                        Mengelola Siswa
                                    </li>
                                </ul>
                            </div>
                            <p class="lead mt-4">
                                Jadi itulah yang dapat dilakukan sistem ini. Jika anda
                                mengalami kendala dengan sistem ini, tolong laporkan
                                keluhan Anda ke email ini:
                                <span class="font-weight-bold">andikha.dian1@gmail.com</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-12 col-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4>User Terbaru</h4>
                        <div class="card-header-action">
                            <a href="<?= base_url('Admin/User') ?>" class="btn btn-warning">View All</a>
                        </div>
                    </div>
                    <div class="card-body">

                        <ul class="list-unstyled list-unstyled-border">
                            <?php foreach ($latestUser as $lu) : ?>
                                <li class="media">
                                    <img class="mr-3 rounded-circle" width="50" src="https://ui-avatars.com/api/?background=3abaf4&bold=true&color=fff&length=1&size=128&name=<?= $lu['nama_user'] ?> alt=" avatar" />
                                    <div class="media-body">
                                        <div class="float-right text-primary">
                                            <?php
                                            date_default_timezone_set('Asia/Jakarta');
                                            $now = date('j M');
                                            $yesterday = date('j M', strtotime("-1 days"));
                                            $userDate = date('j M', $lu['date_created']);
                                            if ($userDate == $now) {
                                                $userDate = 'Hari ini';
                                            } else if ($userDate == $yesterday) {
                                                $userDate = 'Kemarin';
                                            } else {
                                                $userDate = date('j M', $lu['date_created']);
                                            }
                                            ?>
                                            <?= $userDate; ?>
                                        </div>
                                        <div class="media-title"><?= $lu['nama_user'] ?></div>
                                        <span class="text-small text-muted">Sebagai <?= $lu['role'] ?>
                                        </span>
                                    </div>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
</div>
</div>