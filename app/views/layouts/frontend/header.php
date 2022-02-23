<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title><?= $data['title'] . ' - ' . APP_NAME ?></title>
    <meta name="description" content="Aplikasi Sistem Lelang Online untuk memenuhi program Uji Kompetensi Keahlian (UKK) Rekayasa Perangkat Lunak (RPL)" />

    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="apple-touch-icon" sizes="180x180" href="<?= BASE_URL ?>/assets/images/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= BASE_URL ?>/assets/images/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= BASE_URL ?>/assets/images/favicon-16x16.png">
    <link rel="manifest" href="<?= BASE_URL ?>/assets/images/site.webmanifest">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

    <link rel="stylesheet" href="<?= BASE_URL ?>/assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?= BASE_URL ?>/assets/css/LineIcons.3.0.css" />
    <link rel="stylesheet" href="<?= BASE_URL ?>/assets/css/sweetalert2.min.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>/assets/css/main.css" />
</head>

<body>
    <?php include('preload.php') ?>

    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand" href="<?= BASE_URL ?>"><img src="<?= BASE_URL ?>/assets/images/logo.svg" alt="" width="150"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0"></ul>
                <?php if (empty($_SESSION['user'])) : ?>
                    <a href="<?= BASE_URL ?>/login" class="btn btn-outline-primary">Login</a>
                    <a href="<?= BASE_URL ?>/register" class="btn btn-outline-success ms-2">Register</a>
                <?php else : ?>
                    <a href="<?= BASE_URL ?>/dashboard" class="btn btn-outline-primary">Dashboard</a>
                <?php endif; ?>

            </div>
        </div>
    </nav>