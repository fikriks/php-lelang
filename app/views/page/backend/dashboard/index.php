<div class="main-content container-fluid">
    <div class="page-title">
        <h3>Dashboard</h3>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">
                    <?= $data['title'] ?>
                </h4>
            </div>
            <div class="card-body">
                <?php if (isset($_SESSION['user']['level'])) { ?>
                    <h3>Halo, Selamat Datang!</h3>
                    <hr>
                    <div class="row mb-2">
                        <div class="col-12 col-md-4">
                            <div class="card bg-primary">
                                <div class="card-body p-3">
                                    <h1 class="text-white"><?= count($data['dataBarang']) ?></h1>
                                    <h3 class="text-white">Data Barang</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="card bg-secondary">
                                <div class="card-body p-3">
                                    <h1 class="text-white"><?= count($data['dataLelang']) ?></h1>
                                    <h3 class="text-white">Lelang Barang</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="card bg-success">
                                <div class="card-body p-3">
                                    <h1 class="text-white"><?= count($data['dataPetugas']) ?></h1>
                                    <h3 class="text-white">Data Petugas</h3>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        <?php } else { ?>
            <h3>Halo, Selamat Datang!</h1>
                <hr>
                <a href="<?= BASE_URL ?>/#lelang" class="btn btn-primary">Katalog Lelang</a>
            <?php } ?>
        </div>
</div>
</section>
</div>