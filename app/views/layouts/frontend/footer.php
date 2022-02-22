<footer class="text-center py-3">
    <div class="container">
        <span class="p-3">&copy; <?= date('Y') ?> Sistem Lelang Online (SiLang) <br> Made with <i class="lni lni-heart"></i> by <a href="https://fikriks.com" target="_blank"><?= AUTHOR ?></a></span>
    </div>
</footer>

<a href="#" class="scroll-top">
    <i class="lni lni-chevron-up"></i>
</a>

<script src="<?= BASE_URL ?>/assets/js/bootstrap.min.js"></script>
<script src="<?= BASE_URL ?>/assets/js/sweetalert2.all.min.js"></script>
<script src="<?= BASE_URL ?>/assets/js/scripts.js"></script>

<?php if (!empty($data)) { ?>
    <script>
        const row = document.getElementById('penawaran');
        row.addEventListener("click", (event) => {
            let id = row.getAttribute('data-id');
            const form = new FormData();
            Swal.fire({
                title: 'Masukkan harga penawaran',
                input: 'number',
                showCancelButton: true,
                confirmButtonText: 'Submit',
                showLoaderOnConfirm: true,
                preConfirm: (harga) => {

                    <?php if (empty($data['dataLelang']['harga_akhir'])) { ?>
                        if (harga <= <?= $data['dataLelang']['harga_awal'] ?>) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Gagal',
                                text: 'Penawaran yang diajukan tidak lebih kecil dari harga awal'
                            })

                            throw new Error;
                        }
                    <?php } else { ?>
                        if (harga <= <?= $data['dataLelang']['harga_akhir'] ?>) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Gagal',
                                text: 'Penawaran yang diajukan tidak lebih kecil dari harga akhir'
                            })

                            throw new Error;
                        }
                    <?php } ?>

                    form.set('id', id);
                    form.set('harga', harga);

                    return fetch(`<?= BASE_URL ?>/penawaran/store`, {
                            method: "POST",
                            body: form
                        })
                        .then(response => {
                            if (!response.ok) {
                                throw new Error(response.statusText)
                            }
                            return response.json();
                        })
                        .catch(error => {
                            Swal.showValidationMessage(
                                `Request failed: ${error}`
                            )
                        })
                },
                allowOutsideClick: () => !Swal.isLoading()
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil',
                        text: 'Berhasil mengajukan penawaran'
                    }).then(res => {
                        window.location.reload();
                    })
                }
            })
        });
    </script>
<?php } ?>
</body>

</html>