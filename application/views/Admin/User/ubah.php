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
            <h1>Ubah User</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active">
                    <a href="<?= base_url('Admin/Dashboard') ?>">Dashboard</a>
                </div>
                <div class="breadcrumb-item active">
                    <a href="<?= base_url('Admin/User') ?>">User</a>
                </div>
                <div class="breadcrumb-item">Ubah User</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Aturan</h2>
            <p class="section-lead">
                Pastikan anda teliti dalam mengubah data, agar tidak terjadi kesalahan dikemudian hari
            </p>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Form Tambah</h4>
                        </div>
                        <div class="card-body">
                            <form action="" method="POST">
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3" for="nama">Nama Lengkap</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" class="form-control w-100" id="nama" name="nama" value="<?= $userById['nama_user'] ?>">
                                        <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3" for="point">Jenis Kelamin</label>
                                    <div class="col-sm-12 col-md-7">
                                        <div class="form-check form-check-inline mt-1">
                                            <input class="form-check-input" type="radio" id="laki" value="Laki-Laki" name="jenis_kelamin" <?= ($userById['jenis_kelamin'] == 'Laki-Laki') ? "checked" : ""; ?>>
                                            <label class="form-check-label" for="laki">Laki-Laki</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" id="perempuan" value="Perempuan" name="jenis_kelamin" <?= ($userById['jenis_kelamin'] == 'Perempuan') ? "checked" : ""; ?>>
                                            <label class="form-check-label" for="perempuan">Perempuan</label>
                                        </div>
                                        <?= form_error('jenis_kelamin', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3" for="email">Email</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="email" class="form-control w-100" id="email" name="email" value="<?= $userById['email'] ?>">
                                        <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3" for="role">Role</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select class="form-control" name="role">
                                            <?php foreach ($role as $r) : ?>
                                                <option <?php if ($r['role_id'] == $userById['role_id']) {
                                                            echo 'selected="selected"';
                                                        } ?> value="<?= $r['role_id']; ?>"><?= $r['role']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <?= form_error('role', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3" for="point">Status</label>
                                    <div class="col-sm-12 col-md-7">
                                        <div class="form-check form-check-inline mt-1">
                                            <input class="form-check-input" type="radio" id="aktif" value="1" name="status" <?= ($userById['is_active'] == 1) ? "checked" : ""; ?>>
                                            <label class="form-check-label" for="aktif">Aktif</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" id="tidak" value="0" name="status" <?= ($userById['is_active'] == 0) ? "checked" : ""; ?>>
                                            <label class="form-check-label" for="tidak">Tidak Aktif</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" id="beku" value="2" name="status" <?= ($userById['is_active'] == 2) ? "checked" : ""; ?>>
                                            <label class="form-check-label" for="beku">Bekukan</label>
                                        </div>
                                        <?= form_error('status', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                    <div class="col-sm-12 col-md-7">
                                        <button class="btn btn-warning" type="submit">Tambah</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>