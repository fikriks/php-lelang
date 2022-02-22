<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $data['title'] . ' - ' . APP_NAME ?></title>

    <link rel="stylesheet" href="<?= BASE_URL ?>/assets/css/bootstrap.css">

    <link rel="stylesheet" href="<?= BASE_URL ?>/assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>/assets/css/app.css">
    <link rel="shortcut icon" href="<?= BASE_URL ?>/assets/images/favicon.ico" type="image/x-icon">

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