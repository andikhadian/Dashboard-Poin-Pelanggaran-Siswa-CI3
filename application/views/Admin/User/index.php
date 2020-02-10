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
            <li class="nav-item active">
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
            <h1>User</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active">
                    <a href="<?= base_url('Admin/Dashboard') ?>">Dashboard</a>
                </div>
                <div class="breadcrumb-item">User</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Aturan</h2>
            <p class="section-lead">
                Disini anda dapat Melihat, Mencari, Mengubah, dan Menghapus Data
                User
            </p>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Daftar User</h4>
                        <div class="card-header-form">
                            <button type="button" class="btn btn-danger mr-2 ml-4" data-toggle="tooltip" data-placement="top">
                            </button> Melakukan Kesalahan
                            <button type="button" class="btn btn-warning mr-2 ml-4" data-toggle="tooltip" data-placement="top">
                            </button> Belum Verifikasi
                            <button type="button" class="btn btn-success mr-2 ml-4" data-toggle="tooltip" data-placement="top">
                            </button> Sudah Verifikasi
                            <a href="<?= base_url('Admin/User/tambah') ?>" class="btn btn-icon icon-left btn-warning mr-2 ml-4"><i class="fas fa-plus-circle"></i> Tambah User</a>
                            <a href=" <?= base_url('Admin/User/cetak') ?>" target="_blank" class="btn btn-icon icon-left btn-success"><i class="fas fa-print"></i> Cetak</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover" id="mytable">
                                <thead>
                                    <tr>
                                        <th>
                                            No
                                        </th>
                                        <th>Profil</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Sebagai</th>
                                        <th>Tanggal Daftar</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <?php

                                $i = 1;
                                foreach ($allUser as $au) : ?>
                                    <tr>
                                        <td style="vertical-align: middle;">
                                            <?= $i++; ?>
                                        </td>
                                        <td>
                                            <img alt="image" src="https://ui-avatars.com/api/?background=3abaf4&bold=true&color=fff&length=1&size=128&name=<?= $au['nama_user'] ?>" style="width: 40px; height: 40px;" class="rounded-circle mr-1" />
                                        </td>
                                        <td style="vertical-align: middle;"><?= $au['nama_user']; ?></td>
                                        <td style="vertical-align: middle;"><?= $au['email']; ?></td>
                                        <td style="vertical-align: middle;"><?= $au['role']; ?></td>
                                        <td style="vertical-align: middle;"><?= date('d M Y', $au['date_created']); ?></td>
                                        <?php
                                        $badge = '';
                                        $txt = '';
                                        if ($au['is_active'] == 0) {
                                            $badge = 'badge-warning';
                                            $txt = 'Tidak Aktif';
                                        } elseif ($au['is_active'] == 1) {
                                            $badge = 'badge-success';
                                            $txt = 'Aktif';
                                        } elseif ($au['is_active'] == 2) {
                                            $badge = 'badge-danger';
                                            $txt = 'Dibekukan';
                                        }
                                        ?>
                                        <td style="vertical-align: middle;"><span class="badge <?= $badge; ?>"><?= $txt; ?></span></td>
                                        <td>
                                            <div class="dropdown d-inline">
                                                <button class="btn btn-danger dropdown-toggle" type="button" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-cog"></i>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item has-icon" href="<?= base_url('Admin/User/detail/') . $au['user_id']; ?>"><i class="fas fa-info-circle"></i> Detail</a>
                                                    <a class="dropdown-item has-icon" href="<?= base_url('Admin/User/ubah/') . $au['user_id']; ?>"><i class="fas fa-edit"></i> Ubah</a>
                                                    <a class="dropdown-item has-icon btnHapus" href="<?= base_url('Admin/User/hapus/') . $au['user_id']; ?>"><i class="fas fa-trash-alt"></i> Hapus</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>