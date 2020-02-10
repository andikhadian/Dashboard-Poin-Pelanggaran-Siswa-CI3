<?php
date_default_timezone_set('Asia/Jakarta');
?>
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
            <li class="nav-item">
                <a href="<?= base_url('Guru/Pelanggar'); ?>" class="nav-link"><i class="fas fa-user-tie"></i> <span>Pelanggar</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('Guru/Jenispelanggaran'); ?>"><i class="fas fa-exclamation"></i>
                    <span>Jenis Pelanggaran</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="<?= base_url('Guru/Jiswa'); ?>"><i class="fas fa-users"></i> <span>Siswa</span></a>
            </li>
        </ul>

        <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
            <a href="<?= base_url('Auth/logout') ?>" class="btn btnLogout btn-warning btn-lg btn-block btn-icon-split">
                <i class="fas fa-sign-out-alt"></i> Logout
            </a>
        </div>
    </aside>
</div>

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Info Pelanggaran Siswa</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active">
                    <a href="<?= base_url('Guru/Dashboard') ?>">Dashboard</a>
                </div>
                <div class="breadcrumb-item active">
                    <a href="<?= base_url('Guru/siswa') ?>">Siswa</a>
                </div>
                <div class="breadcrumb-item">Info Pelanggaran Siswa</div>
            </div>
        </div>



        <div class="row">
            <div class="col-12 col-sm-12 col-lg-5 mt-2 pt-1">
                <div class="card profile-widget">
                    <div class="profile-widget-header">
                        <img alt="image" src="https://ui-avatars.com/api/?background=FC544C&bold=true&color=fff&length=1&size=128&name=<?= $siswaById['nama']; ?>" class="rounded-circle profile-widget-picture">
                        <div class="profile-widget-items">
                            <div class="profile-widget-item">
                                <div class="profile-widget-item-label">Sisa Point</div>
                                <div class="profile-widget-item-value text-warning"><?= $siswaById['sisa_point']; ?></div>
                            </div>
                            <div class="profile-widget-item">
                                <div class="profile-widget-item-label">Jenis Kelamin</div>
                                <div class="profile-widget-item-value text-warning"><?= $siswaById['jenis_kelamin']; ?></div>
                            </div>
                            <div class="profile-widget-item">
                                <div class="profile-widget-item-label">Kelas</div>
                                <div class="profile-widget-item-value text-warning"><?= $siswaById['kelas']; ?></div>
                            </div>
                        </div>
                    </div>
                    <div class="profile-widget-description pb-4">
                        <h4 class="text-warning h5 font-weight-bold"><?= $siswaById['nama']; ?></h4>
                        <div class="profile-widget-name"><?= $siswaById['email']; ?>
                        </div>
                    </div>

                </div>

            </div>
            <div class="col-12 col-sm-12 col-lg-7 mt-5">
                <div class="card">
                    <div class="card-header">
                        <h4>Daftar Pelanggaran Terakhir</h4>
                    </div>

                    <div class="card-body">
                        <?php if ($rowPelanggarBySiswa != 0) : ?>
                            <div class="table-responsive">
                                <table class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th width="5%">
                                                No
                                            </th>
                                            <th width="22%">Tanggal</th>
                                            <th width="50%">Jenis Pelanggaran</th>
                                            <th>Point</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i = 1;
                                        foreach ($pelanggarBySiswa as $row) : ?>
                                            <tr>
                                                <td style="vertical-align: middle;">
                                                    <?= $i++ ?>
                                                </td>
                                                <td style="vertical-align: middle;"><?= date('d M Y', $row['tgl_melanggar']) ?></td>
                                                <td style="vertical-align: middle;"><?= $row['jenis_pelanggaran'] ?></td>
                                                <td style="vertical-align: middle;"><span class="badge badge-danger"><?= $row['point'] ?></span></td>

                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        <?php else : ?>
                            <div class="empty-state" data-height="300">
                                <div class="empty-state-icon bg-secondary">
                                    <i class="fas fa-clipboard"></i>
                                </div>
                                <h2>Belum ada Pelanggaran</h2>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>