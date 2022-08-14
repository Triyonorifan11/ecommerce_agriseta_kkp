<?php
if (!isset($_SESSION['login'])) {
    header('Location: ' . BASEURL . '/login');
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title><?= $data['judul']; ?></title>

    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link href="<?= ASSETS; ?>/css/admin-style.css?v.1" rel="stylesheet" />

    <link rel="icon" href="<?= ASSETS; ?>/img/icon.png" type="icon">
    <link rel="stylesheet" href="<?= ASSETS; ?>/css/style.css">

    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>

    <!-- sweet alert 2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- include summernote css/js -->
    <!-- <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script> -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-success shadow">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="index.html">Admin</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm  order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>

        <!-- Navbar-->
        <ul class="navbar-nav ms-auto me-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <!-- <li><a class="dropdown-item" href="#!">Settings</a></li>
                    <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                    <li>
                        <hr class="dropdown-divider" />
                    </li> -->
                    <li><a class="dropdown-item" href="<?= BASEURL; ?>/login/logout">Logout</a></li>
                </ul>
            </li>
        </ul>

    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Core</div>
                        <a class="nav-link <?= $data['navbar'] == "dashboard" ? "active" : ""; ?>" href="<?= BASEURL; ?>/admin">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        <div class="sb-sidenav-menu-heading">Data Admin & Customer</div>
                        <a class="nav-link <?= $data['navbar'] == "pengguna" ? "active" : ""; ?>" href="<?= BASEURL; ?>/admin/dataPengguna">
                            <div class="sb-nav-link-icon"><i class="fas fa-solid fa-user-check"></i></div>
                            Data Pengguna
                        </a>
                        <a class="nav-link <?= $data['navbar'] == "customer" ? "active" : ""; ?>" href="<?= BASEURL; ?>/admin/dataCustomer">
                            <div class="sb-nav-link-icon"><i class="fas fa-solid fa-user-check"></i></div>
                            Data Customer
                        </a>

                        <!-- <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-solid fa-address-card"></i></div>
                            Layouts
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="layout-static.html">Static Navigation</a>
                                <a class="nav-link" href="layout-sidenav-light.html">Light Sidenav</a>
                            </nav>
                        </div> -->

                        <div class="sb-sidenav-menu-heading">Interface Website</div>
                        <a class="nav-link <?= $data['navbar'] == "postingan" ? "active" : ""; ?>" href="<?= BASEURL; ?>/admin/postingan">
                            <div class="sb-nav-link-icon"><i class="fas fa-solid fa-cube"></i></div>
                            Postingan
                        </a>
                        <a class="nav-link <?= $data['navbar'] == "produk" ? "active" : ""; ?>" href="<?= BASEURL; ?>/admin/produk">
                            <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                            Produk
                        </a>
                        <a class="nav-link <?= $data['navbar'] == "galery" ? "active" : ""; ?>" href="<?= BASEURL; ?>/admin/galery">
                            <div class="sb-nav-link-icon"><i class="fas fa-image"></i></div>
                            Galery
                        </a>
                    </div>
                </div>

            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">