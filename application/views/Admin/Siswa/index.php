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
            <li class="nav-item active">
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

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Siswa</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active">
                    <a href="<?= base_url('Admin/Dashboard') ?>">Dashboard</a>
                </div>
                <div class="breadcrumb-item">Siswa</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Aturan</h2>
            <p class="section-lead">
                Disini anda dapat Melihat, Mencari, Mengubah, dan Menghapus Data
                Siswa
            </p>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Daftar Siswa</h4>
                        <div class="card-header-form">
                            <button type="button" class="btn btn-success mr-2 ml-4" data-toggle="tooltip" data-placement="top">
                            </button>Siswa Aktif / Point Tersedia
                            <button type="button" class="btn btn-danger mr-2 ml-4" data-toggle="tooltip" data-placement="top">
                            </button>Siswa Keluar / Point Habis
                            <a href="<?= base_url('Admin/Siswa/tambah') ?>" class="btn btn-icon icon-left btn-warning mr-2 ml-4"><i class="fas fa-plus-circle"></i> Tambah Siswa</a>
                            <a href="<?= base_url('Admin/Siswa/cetak') ?>" target="_blank" class="btn btn-icon icon-left btn-success"><i class="fas fa-print"></i> Cetak</a>
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
                                        <th>Picture</th>
                                        <th>NIS</th>
                                        <th>Nama</th>
                                        <th>Jenis Kelamin</th>
                                        <th width="15%">Kelas</th>
                                        <th>Status</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    $badge = '';
                                    foreach ($allSiswa as $as) : ?>
                                        <tr>
                                            <td style="vertical-align: middle;">
                                                <?= $i++; ?>
                                            </td>
                                            <td>
                                                <img alt="image" src="https://ui-avatars.com/api/?background=47C363&bold=true&color=fff&length=1&size=128&name=<?= $as['nama'] ?>" style="width: 40px; height: 40px;" class="rounded-circle mr-1" />
                                            </td>
                                            <td style="vertical-align: middle;"><?= $as['nis']; ?></td>
                                            <td style="vertical-align: middle;"><?= $as['nama']; ?></td>
                                            <td style="vertical-align: middle;"><?= $as['jenis_kelamin']; ?></td>
                                            <td style="vertical-align: middle;"><?= $as['kelas']; ?></td>
                                            <?php if ($as['status'] == 'Aktif') {
                                                $badge = 'badge-success';
                                            } else {
                                                $badge = 'badge-danger';
                                            }
                                            ?>
                                            <td style="vertical-align: middle;"><span class="badge <?= $badge ?>"><?= $as['status']; ?></span></td>
                                            <td class="text-center">
                                                <div class="dropdown d-inline">
                                                    <button class="btn btn-danger dropdown-toggle" type="button" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="fas fa-cog"></i>
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item has-icon" href="<?= base_url('Admin/Siswa/detail/') . $as['siswa_id']; ?>"><i class="fas fa-info-circle"></i> Detail</a>
                                                        <a class="dropdown-item has-icon" href="<?= base_url('Admin/Siswa/ubah/') . $as['siswa_id']; ?>"><i class="fas fa-edit"></i> Ubah</a>
                                                        <a class="dropdown-item has-icon btnHapus" href="<?= base_url('Admin/Siswa/hapus/') . $as['siswa_id']; ?>"><i class="fas fa-trash-alt"></i> Hapus</a>
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