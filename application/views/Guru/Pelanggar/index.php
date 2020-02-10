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
            <h1>Pelanggar</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active">
                    <a href="<?= base_url('Guru/Dashboard') ?>">Dashboard</a>
                </div>
                <div class="breadcrumb-item">Pelanggar</div>
            </div>
        </div>

        <?php if ($rowPelanggar == 0) : ?>
            <div class="row pelanggar-state">
                <div class="col-md-12">
                    <div class="empty-state" data-height="600">
                        <img class="img-fluid" src="<?= base_url(''); ?>/assets/img/drawkit/drawkit-nature-man-colour.svg" alt="image">
                        <h2 class="mt-0">Sepertinya kamu belum pernah lapor</h2>
                        <p class="lead">
                            Yuk mulai lapor pelanggar sekarang agar tercatat di sistem
                        </p>
                        <a href="<?= base_url('Guru/Pelanggar/tambah') ?>" class="btn btn-warning">Lapor Sekarang</a>
                    </div>
                </div>
            </div>
        <?php else : ?>
            <div class="section-body">
                <h2 class="section-title">Aturan</h2>
                <p class="section-lead">
                    Disini anda dapat Melihat, dan Mencari
                    Pelanggar Oleh Anda
                </p>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Daftar Pelanggar</h4>
                            <div class="card-header-form">
                                <a href="<?= base_url('Guru/Pelanggar/tambah') ?>" class="btn btn-icon icon-left btn-warning mr-2"><i class="fas fa-plus-circle"></i> Tambah Pelanggar</a>
                                <a href="<?= base_url('Guru/Pelanggar/cetak') ?>" target="_blank" class="btn btn-icon icon-left btn-success"><i class="fas fa-print"></i> Cetak</a>
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
                                            <th>Profil</th>
                                            <th width="20%">Nama</th>
                                            <th width="12%">Kelas</th>
                                            <th width="30%">Melanggar</th>
                                            <th>Point</th>
                                            <th width="15%">Tanggal Melanggar</th>
                                        </tr>
                                    </thead>
                                    <?php
                                    $i = 1;
                                    foreach ($allPelanggar as $ap) : ?>
                                        <tr class="pb-5">
                                            <td style="vertical-align: middle;">
                                                <?= $i++; ?>
                                            </td>
                                            <td>
                                                <img class="rounded-circle" width="50" src="https://ui-avatars.com/api/?background=FC534B&length=1&bold=true&color=fff&size=128&name=<?= $ap['nama']; ?>" alt="avatar" />
                                            </td>
                                            <td style="vertical-align: middle;"><?= $ap['nama']; ?></td>
                                            <td style="vertical-align: middle;"><?= $ap['kelas']; ?></td>
                                            <td style="vertical-align: middle;" class="text-uppercase"><?= $ap['jenis_pelanggaran']; ?></td>
                                            <td style="vertical-align: middle;">
                                                <span class="badge badge-danger"><?= $ap['point']; ?></span></td>
                                            <td style="vertical-align: middle;"><?= date('d M Y', $ap['tgl_melanggar']); ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            </div>
    </section>
</div>