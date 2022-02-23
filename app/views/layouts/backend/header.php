<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $data['title'] . ' - ' . APP_NAME ?></title>
    <meta name="description" content="Aplikasi Sistem Lelang Online untuk memenuhi program Uji Kompetensi Keahlian (UKK) Rekayasa Perangkat Lunak (RPL)" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link rel="apple-touch-icon" sizes="180x180" href="<?= BASE_URL ?>/assets/images/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= BASE_URL ?>/assets/images/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= BASE_URL ?>/assets/images/favicon-16x16.png">
    <link rel="manifest" href="<?= BASE_URL ?>/assets/images/site.webmanifest">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

    <link rel="stylesheet" href="<?= BASE_URL ?>/assets/css/bootstrap.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>/assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>/assets/css/app.css">

    <link rel="stylesheet" href="<?= BASE_URL ?>/assets/css/sweetalert2.min.css">

    <?php if (!empty($data['dataTable'])) { ?>
        <link rel="stylesheet" href="<?= BASE_URL ?>/assets/vendors/simple-datatables/styles.min.css">
    <?php } ?>
</head>

<body>
    <div id="app">
        <?php include('sidebar.php') ?>

        <div id="main">
            <?php include('nav.php') ?>