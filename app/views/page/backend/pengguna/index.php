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
                <?= $data['title'] .' ('. count($data['dataPengguna']).')' ?>
            </h4>
        </div>
        <div class="card-body">
        <div class="table-responsive">
            <table class='table table-striped' id="table1">
                <thead>
                    <tr>
                        <th>Nama Pengguna</th>
                        <th>Username</th>
                        <th>No. Telpon</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach($data['dataPengguna'] as $dp) : ?>
                      <tr>
                        <td><?= $dp['nama_lengkap'] ?></td>
                        <td><?= $dp['username'] ?></td>
                        <td><?= $dp['telp'] ?></td>
                        <td> 
                            <a href="<?= BASE_URL ?>/pengguna/edit/<?= $dp['id_user'] ?>" class="btn btn-warning"><i data-feather="edit"></i></a>
                            <button class="btn btn-danger delete-confirm" data-action="<?= BASE_URL ?>/pengguna/delete" data-id="<?= $dp['id_user'] ?>"><i data-feather="trash"></i></button>
                            </form>
                        </td>
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