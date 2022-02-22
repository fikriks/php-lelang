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
            <form method="POST" action="<?= BASE_URL ?>/lelang/update/<?= $data['dataLelang']['id_lelang'] ?>">
            <div class="form-group row mb-4">
                    <label for="barang" class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Barang <span
                            class="text-danger fw-bold">*</span></label>
                    <div class="col-sm-12 col-md-7">
                        <select id="barang" name="barang" class="form-control" required>
                            <?php
                                $i = 0;

                                foreach($data['dataBarang'] as $db){
                                ?>
                                <option value="" disabled>-- Pilih --</option>
                                <option value="<?= $db['id_barang'] ?>" <?= $db['id_barang'] == $data['dataLelang']['id_barang'] ? 'selected' : '' ?>><?= $db['nama_barang'] ?></option>
                            <?php $i++; } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row mb-4">
                    <label for="tanggal" class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tanggal Lelang <span
                            class="text-danger fw-bold">*</span></label>
                    <div class="col-sm-12 col-md-7">
                        <input type="date" id="tanggal" name="tanggal" class="form-control" value="<?= $data['dataLelang']['tgl'] ?>"
                            required>
                    </div>
                </div>
                <div class="form-group row mb-4">
                    <label for="status-lelang" class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Status Lelang <span
                            class="text-danger fw-bold">*</span></label>
                    <div class="col-sm-12 col-md-7">
                        <select id="status-lelang" name="status_lelang" class="form-control" required>
                            <?php
                                $i = 0;
                                $status = ['-- Pilih --', 'dibuka', 'ditutup'];

                                foreach($status as $stat){
                                ?>
                                <option <?= $i == 0 ? 'disabled' : '' ?> value="<?= $i == 0 ? '' : $stat ?>" <?= $data['dataLelang']['status'] == $stat ? 'selected' : '' ?>><?= ucwords($stat) ?></option>
                            <?php $i++; } ?>
                        </select>
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