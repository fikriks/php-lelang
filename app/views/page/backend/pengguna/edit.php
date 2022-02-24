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
                <h4 class="card-title"><?= $data['title'] . ' ' . $data['dataPengguna']['nama_lengkap'] ?></h4>
            </div>
            <div class="card-body">
                <form method="POST" action="<?= BASE_URL ?>/pengguna/update/<?= $data['dataPengguna']['id_user'] ?>">
                    <div class="form-group row mb-4">
                        <label for="nama-pengguna" class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Pengguna <span class="text-danger fw-bold">*</span></label>
                        <div class="col-sm-12 col-md-7">
                            <input type="text" id="nama-pengguna" name="nama_pengguna" class="form-control" value="<?= $data['dataPengguna']['nama_lengkap'] ?>" placeholder="Nama Pengguna" autocomplete="off" required>
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label for="username" class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Username <span class="text-danger fw-bold">*</span></label>
                        <div class="col-sm-12 col-md-7">
                            <input type="text" id="username" name="username" class="form-control" placeholder="Username" value="<?= $data['dataPengguna']['username'] ?>" autocomplete="off" required>
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label for="password" class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Password </label>
                        <div class="col-sm-12 col-md-7">
                            <input type="password" id="password" name="password" class="form-control" placeholder="Password" autocomplete="off">
                            <div class="text-muted">Kosongkan jika tidak ingin diubah</div>
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label for="telp" class="col-form-label text-md-right col-12 col-md-3 col-lg-3">No.Telepon <span class="text-danger fw-bold">*</span></label>
                        <div class="col-sm-12 col-md-7">
                            <input type="number" id="telp" name="telp" class="form-control" placeholder="Username" value="<?= $data['dataPengguna']['telp'] ?>" autocomplete="off" required>
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