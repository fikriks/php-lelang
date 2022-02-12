<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $data['title'] .' - '. APP_NAME ?></title>

    <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/bootstrap.css">

    <link rel="stylesheet" href="<?= BASE_URL ?>assets/vendors/chartjs/Chart.min.css">

    <link rel="stylesheet" href="<?= BASE_URL ?>assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/app.css">
    <link rel="shortcut icon" href="<?= BASE_URL ?>assets/images/favicon.svg" type="image/x-icon">
</head>

<body>
    <div id="app">
    <?php include('sidebar.php') ?>

        <div id="main">
            <?php include('nav.php') ?>