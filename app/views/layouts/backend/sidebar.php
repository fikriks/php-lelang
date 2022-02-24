<div id="sidebar" class='active'>
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <img src="<?= BASE_URL ?>/assets/images/logo.svg" alt="Logo">
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class='sidebar-title'>Main Menu</li>
                <li class="sidebar-item <?= $data['title'] == 'Dashboard' ? 'active' : '' ?>">
                    <a href="<?= BASE_URL ?>/dashboard" class='sidebar-link'>
                        <i data-feather="home" width="20"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <?php if (in_array(isset($_SESSION['user']['level']), ['administrator', 'petugas'])) : ?>
                    <li class='sidebar-title'>Master Data</li>
                    <li class="sidebar-item <?= $data['title'] == 'Data Barang' ? 'active' : '' ?>">
                        <a href="<?= BASE_URL ?>/barang" class='sidebar-link'>
                            <i data-feather="archive" width="20"></i>
                            <span>Data Barang</span>
                        </a>
                    </li>
                    <?php if ($_SESSION['user']['level'] == 'administrator') : ?>
                        <li class="sidebar-item <?= $data['title'] == 'Data Petugas' ? 'active' : '' ?>">
                            <a href="<?= BASE_URL ?>/petugas" class='sidebar-link'>
                                <i data-feather="user" width="20"></i>
                                <span>Data Petugas</span>
                            </a>
                        </li>
                    <?php endif; ?>
                    <?php if ($_SESSION['user']['level'] == 'petugas') : ?>
                        <li class="sidebar-item <?= $data['title'] == 'Data Pengguna' ? 'active' : '' ?>">
                            <a href="<?= BASE_URL ?>/pengguna" class='sidebar-link'>
                                <i data-feather="users" width="20"></i>
                                <span>Data Pengguna</span>
                            </a>
                        </li>
                        <li class="sidebar-item <?= $data['title'] == 'Lelang Barang' ? 'active' : '' ?>">
                            <a href="<?= BASE_URL ?>/lelang" class='sidebar-link'>
                                <i data-feather="shopping-bag" width="20"></i>
                                <span>Lelang Barang</span>
                            </a>
                        </li>
                    <?php endif; ?>

                    <li class='sidebar-title'>Laporan</li>
                    <li class="sidebar-item <?= $data['title'] == 'Laporan' ? 'active' : '' ?>">
                        <a href="<?= BASE_URL ?>/laporan" class='sidebar-link'>
                            <i data-feather="book" width="20"></i>
                            <span>Laporan</span>
                        </a>
                    </li>
                <?php endif; ?>

                <?php if (!isset($_SESSION['user']['level'])) : ?>
                    <li class='sidebar-title'>Transaksi</li>
                    <li class="sidebar-item <?= $data['title'] == 'Riwayat Penawaran' ? 'active' : '' ?>">
                        <a href="<?= BASE_URL ?>/riwayat" class='sidebar-link'>
                            <i data-feather="shopping-cart" width="20"></i>
                            <span>Riwayat Penawaran</span>
                        </a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>