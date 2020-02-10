<?php
date_default_timezone_set('Asia/Jakarta'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport" />
    <title><?= $title; ?></title>
    <link rel="shortcut icon" href="<?= base_url() ?>assets/img/logo_pp.png">

    <!-- General CSS Files -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous" />

    <!-- Template CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/style.css" />
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/custom.css" />
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/components.css" />
</head>

<body>

    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('notif') ?>"></div>
    <div id="app">
        <div class="main-wrapper">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar">
                <form class="form-inline mr-auto">
                    <ul class="navbar-nav mr-3">
                        <li>
                            <a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a>
                        </li>
                    </ul>
                </form>
                <?php
                $pp = "https://ui-avatars.com/api/?background=3ABAF4&bold=true&color=fff&length=1&size=128&name=" . $user['nama_user'];
                ?>
                <ul class="navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                            <figure class="avatar mr-2 avatar-sm">
                                <img alt="image" src="<?= $pp; ?>" class="rounded-circle mr-1" />
                                <i class="avatar-presence online"></i>
                            </figure>
                            <div class="d-sm-none d-lg-inline-block">
                                Hi, <?= $user['nama_user']; ?>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <div class="dropdown-title"><?= $lastOnline; ?></div>
                            <div class="dropdown-divider"></div>
                            <a href="<?= base_url('Auth/logout') ?>" class="btnLogout dropdown-item has-icon text-danger">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </a>
                        </div>
                    </li>
                </ul>
            </nav>