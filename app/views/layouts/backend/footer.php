            <footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                        <p><?= date('Y') ?> &copy; <?= APP_NAME ?></p>
                    </div>
                    <div class="float-end">
                        <p>Made with <span class='text-danger'><i data-feather="heart"></i></span> by <a
                                href="https://fikriks.com"><?= AUTHOR ?></a></p>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="<?= BASE_URL ?>/assets/js/feather-icons/feather.min.js"></script>
    <script src="<?= BASE_URL ?>/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="<?= BASE_URL ?>/assets/js/app.js"></script>
    <script src="<?= BASE_URL ?>/assets/js/sweetalert2.all.min.js"></script>

    <?php if(!empty($data['dataTable'])){ ?>
         <script src="<?= BASE_URL ?>assets/vendors/simple-datatables/simple-datatables.js"></script>
         <script src="<?= BASE_URL ?>assets/js/vendors.js"></script>
    <?php } ?>

    <?php if(!empty($_SESSION['alert'])){ ?>
        <script>
        Swal.fire({
            title: "<?= $_SESSION['alert']['title'] ?>",
            text: "<?= $_SESSION['alert']['text'] ?>",
            icon: "<?= $_SESSION['alert']['icon'] ?>"
            })
            <?php if(!empty($data['alert']['href'])) { ?>
            .then((result) => {
                window.location.href="<?= $_SESSION['alert']['href'] ?>";
            });
            <?php } ?>
        </script>

    <?php unset($_SESSION['alert']); } ?>

    <script>
    document.addEventListener('click', function (event) {
    if (!event.target.matches('.delete-confirm')) return;
    event.preventDefault();
    Swal.fire({
            title: 'Apakah anda yakin?',
            text: "Jika data dihapus maka data yang bersangkutan akan ikut terhapus juga.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                let action = event.target.attributes['data-action'].value;
                let id = event.target.attributes['data-id'].value;

                document.body.innerHTML = `<form class='form-inline remove-form' id='remove-form' method='post' action='${action}'>
                    <input name="id" type="hidden" value="${id}">
                </form>`;
                document.querySelector(".remove-form").submit();
            }
        });

    }, false);
    </script>
    <script src="<?= BASE_URL ?>/assets/js/main.js"></script>
</body>

</html>