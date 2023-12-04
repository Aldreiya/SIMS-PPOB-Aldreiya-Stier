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
                            <a href="javascript:void(0)" class="nav-link active">Akun</a>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-md-center">
        <div class="col-10">
            <div class="info mt-4">
                <div class="row justify-content-center">
                    <div class="col-8 text-center">
                        <form action="" method="PUT" id="formImg">
                            <div class="edit-image">
                                <img src="<?= base_url(); ?>assets/image/Profile Photo.png" id="profile_image" alt="" class="main-profile-img mb-3" height="150">
                                <i class="bi bi-pencil-fill" id="edit-img"></i>
                                <input id="fileinput" type="file" name="fileinput" accept="image/png, image/jpeg" style="display:none" />
                            </div>
                        </form>
                        <h2 id="fullname"></h2>
                    </div>
                    <div class="col-8">
                        <form id="form" action="" method="PUT">
                            <div class="mb-1">
                                <label for="email">Email</label>
                                <i class="bi bi-at"></i>
                                <input class="bg-white" type="email" name="email" id="email" value="" disabled />
                                <div class="error"></div>
                            </div>
                            <div class="mb-1">
                                <label for="first_name">Nama Depan</label>
                                <i class="bi bi-person"></i>
                                <input class="bg-white" type="text" name="first_name" id="first_name" value="" disabled />
                                <div class="error"></div>
                            </div>
                            <div class="mb-1">
                                <label for="last_name">Nama Belakang</label>
                                <i class="bi bi-person"></i>
                                <input class="bg-white" type="text" name="last_name" id="last_name" value="" disabled />
                                <div class="error"></div>
                            </div>
                            <div id="button-group">
                                <button id="btn-edit" class="btn">Edit Profil</button>
                                <button id="btn-logout" class="mt-4 bg-white border border-danger text-danger btn" onclick="event.preventDefault();window.location.href='<?= base_url() ?>logout';">Logout</button>
                            </div>
                        </form>
                    </div>
                </div>
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
    <script src="<?= base_url(); ?>assets/js/akun.js"></script>
</body>

</html>