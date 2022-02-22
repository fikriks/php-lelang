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
            <h4 class="card-title"><?= $data['title'] .' '. $data['dataBarang']['nama_barang'] ?></h4>
        </div>
        <div class="card-body">
            <form method="POST" action="<?= BASE_URL ?>/barang/update/<?= $data['dataBarang']['id_barang'] ?>" enctype="multipart/form-data">
                <div class="form-group row mb-4">
                    <label for="gambar-barang" class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Foto Barang </label>
                    <div class="col-sm-12 col-md-7">
                        <input type="file" id="gambar-barang" name="gambar_barang" class="form-control"
                            placeholder="Gambar Barang" autocomplete="off"
                            accept="image/*" onchange="validateImage()">
                            <div class="text-muted">Kosongkan jika tidak ingin diubah</div>
                    </div>
                </div>    
                <div class="form-group row mb-4">
                    <label for="tgl" class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tanggal <span
                            class="text-danger fw-bold">*</span></label>
                    <div class="col-sm-12 col-md-7">
                        <input type="date" id="tgl" name="tgl" class="form-control" value="<?= $data['dataBarang']['tgl'] ?>" required>
                    </div>
                </div>    
                <div class="form-group row mb-4">
                    <label for="nama-barang" class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Barang <span
                            class="text-danger fw-bold">*</span></label>
                    <div class="col-sm-12 col-md-7">
                        <input type="text" id="nama-barang" name="nama_barang" class="form-control"
                            placeholder="Nama Barang" value="<?= $data['dataBarang']['nama_barang'] ?>" autocomplete="off"
                            required>
                    </div>
                </div>
                <div class="form-group row mb-4">
                    <label for="harga-awal" class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Harga Awal <span
                            class="text-danger fw-bold">*</span></label>
                    <div class="col-sm-12 col-md-7">
                        <input type="number" id="harga-awal" name="harga_awal" class="form-control"
                            placeholder="Harga Awal" value="<?= $data['dataBarang']['harga_awal'] ?>" autocomplete="off"
                            required>
                    </div>
                </div>
                <div class="form-group row mb-4">
                    <label for="deskripsi-barang" class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Deskripsi Barang <span
                            class="text-danger fw-bold">*</span></label>
                    <div class="col-sm-12 col-md-7">
                        <textarea rows="10" name="deskripsi_barang" class="form-control"
                            placeholder="Deskripsi Barang" autocomplete="off" required><?= $data['dataBarang']['deskripsi_barang'] ?></textarea>
                    </div>
                </div>
                <div class="form-grup row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                    <div class="col-sm-12 col-md-7">
                        <button type="submit" name="submit" class="btn btn-primary">Edit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
</div>