<div class="main-content container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3><?= $data['title'] ?></h3>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">
                    <?= $data['title'] . ' (' . count($data['history']) . ')' ?>
                    <a href="<?= BASE_URL ?>/#lelang" class="btn btn-primary">Katalog Lelang</a>
                </h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class='table table-hover' id="table1">
                        <thead>
                            <tr>
                                <th>Tanggal Lelang</th>
                                <th>Nama Barang</th>
                                <th>Harga Awal</th>
                                <th>Penawaran Harga</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($data['history'] as $riwayat) : ?>
                                <tr id="row-<?= $no ?>" data-id="<?= $riwayat['id_riwayat'] ?>">
                                    <td><?= date('Y F d', strtotime($riwayat['tgl_lelang'])) ?></td>
                                    <td><?= $riwayat['nama_barang'] ?></td>
                                    <td><?= $riwayat['harga_awal'] ?></td>
                                    <td><?= $riwayat['harga_akhir'] ?></td>
                                </tr>
                            <?php
                                $no++;
                            endforeach;
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>