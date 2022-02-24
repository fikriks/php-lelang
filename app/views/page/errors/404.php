<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 Not Found - <?= APP_NAME ?></title>
    <meta name="description" content="Aplikasi Sistem Lelang Online untuk memenuhi program Uji Kompetensi Keahlian (UKK) Rekayasa Perangkat Lunak (RPL)" />

    <link rel="apple-touch-icon" sizes="180x180" href="<?= BASE_URL ?>/assets/images/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= BASE_URL ?>/assets/images/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= BASE_URL ?>/assets/images/favicon-16x16.png">
    <link rel="manifest" href="<?= BASE_URL ?>/assets/images/site.webmanifest">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

    <link rel="stylesheet" href="<?= BASE_URL ?>/assets/css/bootstrap.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>/assets/css/app.css">
</head>

<body>
    <div id="error">

        <div class="container text-center pt-32">
            <h1 class='error-title'>404</h1>
            <p>we couldn't find the page you are looking for</p>
            <a href="<?= BASE_URL ?>" class='btn btn-primary'>Go Home</a>
        </div>

        <div class="footer pt-32">
            <p class="text-center">Copyright &copy; <?= date('Y') ?> Sistem Lelang Online</p>
        </div>
    </div>
</body>

</html>