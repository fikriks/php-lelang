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
                    <?= $data['title'] . ' (' . count($data['dataHistoryLelang']) . ')' ?>
                </h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class='table table-striped' id="table1">
                        <thead>
                            <tr>
                                <th>ID Lelang</th>
                                <th>Nama Barang</th>
                                <th>Penawar</th>
                                <th>Penawaran Harga</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($data['dataHistoryLelang'] as $lelang) : ?>
                                <tr>
                                    <td><?= $lelang['id_lelang'] ?></td>
                                    <td><?= $lelang['nama_barang'] ?></td>
                                    <td><?= $lelang['nama_lengkap'] ?></td>
                                    <td><?= $lelang['penawaran_harga'] ?></td>
                                </tr>
                            <?php
                            endforeach;
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>