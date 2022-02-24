<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $data['title'] . ' - ' . APP_NAME ?></title>

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
    <div class="row">
        <div class="col-md-12 text-center">
            <h3>Lelang Online</h3>
            <h5>Jln. Mulu Jadian Engga No.46, Ds.Ciledug Tengah, Kec.Ciledug, Kab.Cirebon</h5>
        </div>
    </div>
    <table class='table table-striped'>
        <thead>
            <tr>
                <th>Nama Barang</th>
                <th>Tanggal Lelang</th>
                <th>Harga Awal</th>
                <th>Harga Akhir</th>
                <th>Pemenang Lelang</th>
                <th>No.Telepon</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($data['dataLaporan'] as $dl) : ?>
                <tr>
                    <td><?= $dl['nama_barang'] ?></td>
                    <td><?= date('d F Y', strtotime($dl['tgl_lelang'])) ?></td>
                    <td><?= $dl['harga_awal'] ?></td>
                    <td><?= $dl['harga_akhir'] ?></td>
                    <td><?= $dl['nama_lengkap'] ?></td>
                    <td><?= $dl['telp'] ?></td>
                </tr>
            <?php
            endforeach;
            ?>
        </tbody>
    </table>
</body>

<script>
    window.print();
</script>

</html>