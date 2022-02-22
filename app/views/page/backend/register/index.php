    <div id="auth">
        <div class="container">
            <div class="row">
                <div class="col-md-7 col-sm-12 mx-auto">
                    <div class="card pt-4">
                        <div class="card-body">
                            <div class="text-center mb-5">
                                <img src="<?= BASE_URL ?>/assets/images/logo.svg" height="48" class='mb-4'>
                                <h3>Daftar</h3>
                                <p>Silahkan isi form dibawah untuk mendaftar.</p>
                            </div>
                            <?php if (isset($data['error'])) { ?>
                                <div class="alert alert-danger">
                                    <?= $data['message'] ?>
                                </div>
                            <?php } ?>
                            <form action="<?= BASE_URL ?>/register" method="POST">
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="nama-lengkap">Nama Lengkap</label>
                                            <input type="text" id="nama-lengkap" class="form-control" name="nama_lengkap" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="username">Username</label>
                                            <input type="text" id="username" class="form-control" name="username" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            <input type="password" id="password" class="form-control" name="password" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="no-telpon">No. Telepon</label>
                                            <input type="number" id="no-telpon" class="form-control" name="no_telepon" required>
                                        </div>
                                    </div>
                                </diV>

                                <a href="<?= BASE_URL ?>/login">Sudah punya akun? Login</a>
                                <div class="clearfix row">
                                    <button class="btn btn-primary d-block mt-3" name="submit">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>