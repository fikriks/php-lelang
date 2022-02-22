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
                <?= $data['title'] .' ('. count($data['dataPetugas']).')' ?>
                <a href="<?= BASE_URL ?>/petugas/create" class="btn btn-primary">Tambah <i data-feather="plus"></i></a>
            </h4>
        </div>
        <div class="card-body">
        <div class="table-responsive">
            <table class='table table-striped' id="table1">
                <thead>
                    <tr>
                        <th>Nama Petugas</th>
                        <th>Username</th>
                        <th>Hak Akses</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach($data['dataPetugas'] as $dp) : ?>
                      <tr>
                        <td><?= $dp['nama_petugas'] ?></td>
                        <td><?= $dp['username'] ?></td>
                        <td><?= ucfirst($dp['level']) ?></td>
                        <td> 
                            <a href="<?= BASE_URL ?>/petugas/edit/<?= $dp['id_petugas'] ?>" class="btn btn-warning"><i data-feather="edit"></i></a>
                            <?php if($_SESSION['user']['id_petugas'] != $dp['id_petugas']){ ?>
                                <button class="btn btn-danger delete-confirm" data-action="<?= BASE_URL ?>/petugas/delete" data-id="<?= $dp['id_petugas'] ?>"><i data-feather="trash"></i></button>
                            <?php } ?>
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