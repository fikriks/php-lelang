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
            <h4 class="card-title"><?= $data['title']?></h4>
        </div>
        <div class="card-body">
            <form method="POST" action="<?= BASE_URL ?>/barang/store">
                <div class="form-group row mb-4">
                    <label for="tgl" class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tanggal <span
                            class="text-danger fw-bold">*</span></label>
                    <div class="col-sm-12 col-md-7">
                        <input type="date" id="tgl" name="tgl" class="form-control" required>
                    </div>
                </div>    
                <div class="form-group row mb-4">
                    <label for="nama-barang" class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Barang <span
                            class="text-danger fw-bold">*</span></label>
                    <div class="col-sm-12 col-md-7">
                        <input type="text" id="nama-barang" name="nama_barang" class="form-control"
                            placeholder="Nama Barang" autocomplete="off"
                            required>
                    </div>
                </div>
                <div class="form-group row mb-4">
                    <label for="harga-awal" class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Harga Awal <span
                            class="text-danger fw-bold">*</span></label>
                    <div class="col-sm-12 col-md-7">
                        <input type="number" name="harga_awal" class="form-control"
                            placeholder="Harga Awal" autocomplete="off"
                            required>
                    </div>
                </div>
                <div class="form-group row mb-4">
                    <label for="deskripsi-barang" class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Deskripsi Barang <span
                            class="text-danger fw-bold">*</span></label>
                    <div class="col-sm-12 col-md-7">
                        <textarea rows="10" name="deskripsi_barang" class="form-control"
                            placeholder="Deskripsi Barang" autocomplete="off" required></textarea>
                    </div>
                </div>
                <div class="form-grup row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                    <div class="col-sm-12 col-md-7">
                        <button type="submit" name="submit" class="btn btn-primary">Tambah</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
</div>