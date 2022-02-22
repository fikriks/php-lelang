<section class="hero-area mt-5">
    <div class="px-4 py-5 my-5 text-center">
        <h1 class="display-5 fw-bold mt-5">Sistem Lelang Online (SiLang)</h1>
        <div class="col-lg-6 mx-auto">
            <p class="lead mb-4 mt-3">Ditujukan untuk memenuhi program Uji Kompetensi Keahlian Rekayasa Perangkat Lunak (RPL) dan sebagai metode pembelajaran untuk memperdalam pengembangan software menggunakan teknologi frontend dan backend serta berguna bagi masyarakat yang ingin membangun sebuah sistem lelang barang secara online.</p>
            <div class="d-grid gap-2 d-sm-flex justify-content-sm-center mt-3">
                <a href="#lelang" class="btn btn-primary btn-lg px-4 gap-3">Selengkapnya</a>
            </div>
        </div>
    </div>
</section>

<section class="trending-product section" style="margin-top: 150px;" id="lelang">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title mt-3">
                    <h2>Barang Yang Dilelang</h2>
                    <p>Barang yang masih dibuka untuk dilelang</p>
                </div>
            </div>
        </div>
        <div class="row">
            <?php
            if (count($data['dataBarang']) > 0) :
                foreach ($data['dataBarang'] as $db) : ?>
                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="single-product">
                            <div class="product-image">
                                <img src="<?= BASE_URL ?>/assets/images/barang/<?= $db['gambar'] ?>" alt="<?= $db['nama_barang'] ?>">
                                <div class="button">
                                    <a href="<?= BASE_URL ?>/detail/<?= $db['id_lelang'] ?>" class="btn"> Bid Sekarang</a>
                                </div>
                            </div>
                            <div class="product-info">
                                <h4 class="title">
                                    <a href="<?= BASE_URL ?>/detail/<?= $db['id_lelang'] ?>"><?= $db['nama_barang'] ?></a>
                                </h4>
                                <div class="price">
                                    <span>RP. <?= number_format($db['harga_awal']) ?></span>
                                </div>
                                <?php $hargaTertinggi = $this->model('M_history_lelang')->getHargaTertinggi($db['id_lelang']) ?>
                                <span>Bid Tertinggi: <?= empty($hargaTertinggi) ? 'Belum ada' : 'RP. ' . number_format($hargaTertinggi['penawaran_harga']) ?></span>
                            </div>
                        </div>

                    </div>
                <?php
                endforeach;
            else : ?>
                <p class="text-center">Tidak ada data</p>
            <?php endif; ?>
        </div>
    </div>
</section>