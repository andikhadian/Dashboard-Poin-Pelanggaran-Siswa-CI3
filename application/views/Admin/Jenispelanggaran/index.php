<?php
date_default_timezone_set('Asia/Jakarta');
?>
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
            <li class="nav-item">
                <a href="<?= base_url('Admin/Dashboard'); ?>" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
            </li>
            <li class="menu-header">Master</li>
            <li class="nav-item">
                <a href="<?= base_url('Admin/user') ?>" class="nav-link"><i class="fas fa-user-tie"></i> <span>User</span></a>
            </li>
            <li class="nav-item active">
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
            <h1>Jenis Pelanggaran</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active">
                    <a href="<?= base_url('Admin/Dashboard') ?>">Dashboard</a>
                </div>
                <div class="breadcrumb-item">Jenis Pelanggaran</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Aturan</h2>
            <p class="section-lead">
                Disini anda dapat Melihat, Mencari, Mengubah, dan Menghapus Data
                Jenis Pelanggaran
            </p>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Daftar Jenis Pelanggaran</h4>
                        <div class="card-header-form">
                            <a href="<?= base_url('Admin/Jenispelanggaran/tambah') ?>" class="btn btn-icon icon-left btn-warning mr-2"><i class="fas fa-plus-circle"></i> Tambah Jenis
                                Pelanggaran</a>
                            <a href="<?= base_url('Admin/Jenispelanggaran/cetak') ?>" target="_blank" class="btn btn-icon icon-left btn-success"><i class="fas fa-print"></i> Cetak</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover table-md" id="mytable">
                                <thead>
                                    <tr>
                                        <th>
                                            No
                                        </th>
                                        <th width="70%">Jenis Pelanggaran</th>
                                        <th class="text-center">Points</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    foreach ($allJenisPelanggaran as $aj) : ?>
                                        <tr>
                                            <td style="vertical-align: middle;">
                                                <?= $i++; ?>
                                            </td>
                                            <td style="vertical-align: middle;" class="text-uppercase"><?= $aj['jenis_pelanggaran']; ?></td>
                                            <td style="vertical-align: middle;" class="text-center"><span class="badge badge-danger"><?= $aj['point']; ?></span></td>
                                            <td class="text-center">
                                                <div class="dropdown d-inline">
                                                    <button class="btn btn-danger dropdown-toggle" type="button" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="fas fa-cog"></i>
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item has-icon" href="<?= base_url('Admin/Jenispelanggaran/ubah/') . $aj['jenis_pelanggaran_id']; ?>"><i class="far fa-edit"></i> Ubah</a>
                                                        <a class="dropdown-item has-icon btnHapus" href="<?= base_url('Admin/Jenispelanggaran/hapus/') . $aj['jenis_pelanggaran_id']; ?>"><i class="far fa-trash-alt"></i> Hapus</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>