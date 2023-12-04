<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIMS PPOB-[Aldreiya Stier]</title>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="libs/bootstrap-4.0.0-dist/css/bootstrap.min.css">
    <script src="libs/bootstrap-4.0.0-dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="libs/bootstrap-icons-1.11.2/font/bootstrap-icons.min.css">
    <link href="assets/css/home.css" id="stylesheet" rel="stylesheet" type="text/css" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <div class="main-content">
        <div class="border-bottom">
            <div class="row justify-content-md-center">
                <div class="col-10">
                    <div class="topnav">
                        <div class="logo" onClick="window.location.href = '<?= base_url() ?>'">
                            <img src="<?= base_url(); ?>assets/image/Logo.png" alt="" height="24">
                            <h5 class="m-0 font-weight-bold">SIMS PPOB</h2>
                        </div>
                        <nav class="nav align-items-center">
                            <a href="<?= base_url() ?>topup" class="nav-link">Top Up</a>
                            <a href="<?= base_url() ?>transaction" class="nav-link">Transaction</a>
                            <a href="<?= base_url() ?>akun" class="nav-link">Akun</a>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-md-center">
        <div class="col-10">
            <div class="info mt-4">
                <div class="row justify-content-between">
                    <div class="col-5">
                        <img id="profile_image" src="<?= base_url(); ?>assets/image/Profile Photo.png" alt="" class="mb-3 err-img rounded-circle" width="80px" height="80px">
                        <h5 class="font-weight-normal mb-1">Selamat datang,</h5>
                        <h2 id="fullname" class="font-weight-bold"></h2>
                    </div>
                    <div class="col-7 p-0">
                        <div class="saldo p-3 ml-4">
                            <h5>Saldo anda</h5>
                            <div style="display: flex; column-gap: 12px;">
                                <h2 class="font-weight-bold">Rp </h2>
                                <input type="password" value="0000000" id="saldo" class="saldo-balance" disabled>
                            </div>
                            <p>Lihat Saldo&nbsp;<i class="bi bi-eye-slash" id="toggleSaldo"></i></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="services mt-5" id="services-menu">
            </div>
            <div class="banner mt-4" id="banner-menu">
                <h5>Temukan promo menarik</h5>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script>
        <?php
        if (isset($_SESSION['token'])) {
            $item = $_SESSION['token'];
        } ?>
        var token = "<?php echo $item ?>";
        var base_url = "<?php echo base_url(); ?>";
    </script>
    <script src="<?= base_url(); ?>assets/js/home.js"></script>
    <script src="<?= base_url(); ?>assets/js/script.js"></script>
    <script>
        $(document).on('click', '.icon-services', function(e) {
            let img = e.currentTarget.childNodes[0].getAttribute('src');
            let servis = e.currentTarget.getAttribute('name');
            let code = servis.split("/")[0];
            let tariff = servis.split("/")[1];
            let name = servis.split("/")[2];

            var formData = {
                img: img,
                code: code,
                tariff: tariff,
                name: name,
            };

            $.ajax({
                type: "POST",
                url: "<?= base_url(); ?>service/"+code,
                data: formData,
                success: function(result) {
                    window.location.href = base_url + "services";
                },
            });
        });
    </script>
</body>

</html>