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

<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Ubah Siswa</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active">
                    <a href="<?= base_url('Admin/Dashboard') ?>">Dashboard</a>
                </div>
                <div class="breadcrumb-item active">
                    <a href="<?= base_url('Admin/Siswa') ?>">Siswa</a>
                </div>
                <div class="breadcrumb-item">Ubah Siswa</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Aturan</h2>
            <p class="section-lead">
                Pastikan anda mengisi data dengan lengkap, agar tidak terjadi kesalahan dikemudian hari
            </p>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Form Ubah</h4>
                        </div>
                        <div class="card-body">
                            <form action="" method="POST">
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3" for="nis">NIS</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" class="form-control w-100" id="nis" name="nis" value="<?= $siswaId['nis']; ?>">
                                        <?= form_error('nis', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3" for="nama">Nama</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" class="form-control w-100" id="nama" name="nama" value="<?= $siswaId['nama']; ?>">
                                        <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3" for="point">Jenis Kelamin</label>
                                    <div class="col-sm-12 col-md-7">
                                        <div class="form-check form-check-inline mt-1">
                                            <input class="form-check-input" type="radio" id="inlineradio1" value="Laki-Laki" name="jenis_kelamin" <?= ($siswaId['jenis_kelamin'] == 'Laki-Laki') ? "checked" : ""; ?>>
                                            <label class="form-check-label" for="inlineradio1">Laki-Laki</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" id="inlineradio2" value="Perempuan" name="jenis_kelamin" <?= ($siswaId['jenis_kelamin'] == 'Perempuan') ? "checked" : ""; ?>>
                                            <label class="form-check-label" for="inlineradio2">Perempuan</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3" for="kelas">Kelas</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select class="form-control" name="kelas">
                                            <option value="">-- Pilih Kelas --</option>
                                            <?php foreach ($kelas as $k) : ?>
                                                <option <?php if ($k['kelas_id'] == $siswaId['kelas_id']) {
                                                            echo 'selected="selected"';
                                                        } ?> value="<?= $k['kelas_id']; ?>"><?= $k['kelas']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3" for="hp">No Handphone</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="number" class="form-control w-100" id="hp" name="hp" value="<?= $siswaId['no_hp']; ?>">
                                        <?= form_error('hp', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3" for="email">Email</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="email" class="form-control w-100" id="email" name="email" value="<?= $siswaId['email']; ?>">
                                        <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3" for="point">Sisa Point</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="number" class="form-control w-100" id="point" name="point" value="<?= $siswaId['sisa_point']; ?>" readonly>
                                        <?= form_error('point', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3" for="point">Status</label>
                                    <div class="col-sm-12 col-md-7">
                                        <div class="form-check form-check-inline mt-1">
                                            <input class="form-check-input" type="radio" id="inlineradio1" value="Aktif" name="status" <?= ($siswaId['status'] == 'Aktif') ? "checked" : ""; ?>>
                                            <label class="form-check-label" for="inlineradio1">Aktif</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" id="inlineradio2" value="Tidak Aktif" name="status" <?= ($siswaId['status'] == 'Tidak Aktif') ? "checked" : ""; ?>>
                                            <label class="form-check-label" for="inlineradio2">Tidak Aktif</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                    <div class="col-sm-12 col-md-7">
                                        <button class="btn btn-warning" type="submit">Ubah</button>
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