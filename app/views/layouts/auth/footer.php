    <script src="<?= BASE_URL ?>assets/js/feather-icons/feather.min.js"></script>
    <script src="<?= BASE_URL ?>assets/js/app.js"></script>

    <script src="<?= BASE_URL ?>assets/js/main.js"></script>
    <script src="<?= BASE_URL ?>assets/js/sweetalert2.all.min.js"></script>
    <?php if(!empty($data['swal_script'])){
        echo $data['swal_script'];
    } ?>
</body>

</html>