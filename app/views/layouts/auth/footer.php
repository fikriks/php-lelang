    <script src="<?= BASE_URL ?>/assets/js/feather-icons/feather.min.js"></script>
    <script src="<?= BASE_URL ?>/assets/js/app.js"></script>

    <script src="<?= BASE_URL ?>/assets/js/main.js"></script>
    <script src="<?= BASE_URL ?>/assets/js/sweetalert2.all.min.js"></script>

      <?php if(!empty($_SESSION['alert'])){ ?>
        <script>
        Swal.fire({
            title: "<?= $_SESSION['alert']['title'] ?>",
            text: "<?= $_SESSION['alert']['text'] ?>",
            icon: "<?= $_SESSION['alert']['icon'] ?>"
            }).then((result) => {
                window.location.href="<?= $_SESSION['alert']['href'] ?>";
            });
        </script>

    <?php unset($_SESSION['alert']); } ?>
</body>

</html>