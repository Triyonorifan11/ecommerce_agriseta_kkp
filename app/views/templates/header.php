<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $data['judul']; ?></title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <link rel="stylesheet" href="<?= ASSETS; ?>/css/style.css?v.3">
    <link rel="icon" href="<?= ASSETS; ?>/img/icon.png" type="icon">
</head>

<body>

    <section class="">
        <nav class="navbar navbar-expand-lg navbar-light bg-light bg-gradient shadow-sm p-2 mb-5 bg-body fixed-top">
            <div class="container-fluid container">
                <a class="navbar-brand" href="<?= BASEURL; ?>/home">
                    <img src="<?= ASSETS; ?>/img/logo.png" alt="logo" width="100px">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link <?= $data['navbar'] == 'Home' ? "active" : ""; ?>" aria-current="page" href="<?= BASEURL; ?>/home">Beranda</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= $data['navbar'] == 'Profil' ? "active" : ""; ?>" href="<?= BASEURL; ?>/profil">Profil</a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link <?= $data['navbar'] == 'Produk' ? "active" : ""; ?> dropdown-toggle" href="#" id="produk" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Produk
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="produk">
                                <li><a class="dropdown-item" href="<?= BASEURL; ?>/produk">Produk Unggulan</a></li>
                                <li><a class="dropdown-item" href="#">Produk Andalan</a></li>

                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= BASEURL; ?>/" target="_blank">PKL/Magang</a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Wisata edukasi
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <li><a class="dropdown-item" href="#">Video</a></li>
                                <li><a class="dropdown-item" href="#">Paket Wisata</a></li>
                                <li><a class="dropdown-item" href="#">Postingan</a></li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="<?= BASEURL; ?>/login" target="_blank">Login</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </section>