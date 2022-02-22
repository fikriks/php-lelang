<section class="item-details section">
    <div class="container">
        <div class="top-area">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-12 col-12">
                    <div class="product-images">
                        <div id="gallery">
                            <div class="main-img">
                                <img src="<?= BASE_URL ?>/assets/images/barang/<?= $data['dataLelang']['gambar'] ?>" class="img-fluid" id="current" alt="#">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-12">
                    <div class="product-info">
                        <h2 class="title"><?= $data['dataLelang']['nama_barang'] ?></h2>
                        <h4 class="price">Harga Awal: RP. <?= number_format($data['dataLelang']['harga_awal']) ?></h4>
                        <p class="info-text"><?= $data['dataLelang']['deskripsi_barang'] ?></p>
                        <div class="bottom-content">
                            <div class="row align-items-end">
                                <div class="col-lg-12 col-md-12 col-12">
                                    <div class="button cart-button">
                                        <?php if (!empty($_SESSION['user']['id_level'])) : ?>
                                            <button class="btn" style="width: 100%;" disabled>Login sebagai user untuk mengajukan penawaran</button>
                                        <?php elseif (empty($_SESSION['user']['telp'])) : ?>
                                            <button class="btn" style="width: 100%;" onclick="window.location.href='<?= BASE_URL ?>/login'">Login untuk mengajukan Penawaran</button>
                                        <?php else : ?>
                                            <button class="btn" style="width: 100%;" id="penawaran" data-id="<?= $data['dataLelang']['id_lelang'] ?>">Ajukan Penawaran</button>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="product-details-info">
            <div class="row">
                <div class="col-lg-12 col-12">
                    <div class="single-block">
                        <div class="reviews">
                            <h4 class="title">Top 10 Bid</h4>

                            <?php
                            if (count($data['historyLelang']) > 0) :
                                foreach ($data['historyLelang'] as $hl) : ?>
                                    <div class="single-review">
                                        <img src="https://ui-avatars.com/api/?name=<?= $hl['nama_lengkap'] ?>" alt="<?= $hl['nama_lengkap'] ?>">
                                        <div class="review-info">
                                            <h4><?= $hl['nama_lengkap'] ?></h4>
                                            <p>RP. <?= number_format($hl['penawaran_harga']) ?></p>
                                        </div>
                                    </div>
                                <?php endforeach;
                            else : ?>
                                <p>Tidak ada data</p>
                            <?php endif; ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>