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
    <link href="assets/css/style.css" id="stylesheet" rel="stylesheet" type="text/css" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body>
    <div class="main-login">
        <div class="row">
            <div class="col-5">
                <div class="row justify-content-center align-items-center" style="height: 100vh;">
                    <div class="col-8">
                        <form id="form">
                            <div class="logo-text">
                                <img src="assets/image/Logo.png" alt="" height="25">
                                <h3>SIMS PPOB</h3>
                            </div>
                            <h2>Lengkapi data untuk membuat akun</h2>
                            <div class="input-form">
                                <div>
                                    <i class="bi bi-at"></i>
                                    <input type="email" name="email" id="email" placeholder="masukkan email anda" />
                                    <div class="error"></div>
                                </div>
                                <div>
                                    <i class="bi bi-person"></i>
                                    <input type="text" name="first_name" id="first_name" placeholder="nama depan" />
                                    <div class="error"></div>
                                </div>
                                <div>
                                    <i class="bi bi-person"></i>
                                    <input type="text" name="last_name" id="last_name" placeholder="nama belakang" />
                                    <div class="error"></div>
                                </div>
                                <div>
                                    <i class="bi bi-lock"></i>
                                    <input type="password" name="password" id="password" placeholder="buat password" />
                                    <div class="error"></div>
                                </div>
                                <div>
                                    <i class="bi bi-lock"></i>
                                    <input type="password" name="confirm_password" id="confirm_password" placeholder="konfirmasi password" />
                                    <div class="error"></div>
                                </div>
                            </div>
                            <button id="btn" type="submit" class="btn">Registrasi</button>
                            <p>sudah punya akun? login <a href="<?= base_url(); ?>login">di sini</a></p>
                        </form>
                    </div>
                <div class="col-10">
                    <div id="liveAlertPlaceholder"></div>
                </div>
                </div>
            </div>
            <div class="col-7" style="background-image: url('assets/image/Illustrasi Login.png'); height:100vh; width:50vw;">
            </div>
        </div>
    </div>

    <script>
        var base_url = "<?php echo base_url(); ?>";
    </script>
    <script src="assets/js/register.js"></script>
</body>

</html>