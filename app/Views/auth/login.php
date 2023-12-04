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
                            <h2>Masuk atau buat akun untuk memulai</h2>
                            <div class="input-form">
                                <div>
                                    <i class="bi bi-at err_status"></i>
                                    <input type="email" name="email" id="email" placeholder="masukkan email anda" />
                                    <div class="error"></div>
                                </div>
                                <div>
                                    <i class="bi bi-lock err_status"></i>
                                    <input type="password" name="password" id="password" placeholder="buat password" />
                                    <i class="bi bi-eye-slash showpass" id="togglePassword"></i>
                                    <div class="error"></div>
                                </div>
                            </div>
                            <button id="btn" type="submit" class="btn">Masuk</button>
                            <p>belum punya akun? registrasi <a href="<?= base_url(); ?>register">di sini</a></p>
                        </form>
                    </div>
                    <div class="col-10">
                        <div id="liveAlertPlaceholder"></div>
                    </div>
                </div>
            </div>
            <div class="col-7" style="background-image: url('<?= base_url() ?>assets/image/Illustrasi Login.png'); height:100vh; width:50vw;">
            </div>
        </div>
    </div>

    <script>
        var base_url = "<?php echo base_url(); ?>";
    </script>
    <script src="assets/js/login.js"></script>
    <script>
        // Form Submit
        form.addEventListener("submit", (e) => {
            e.preventDefault();
            let err = 0;
            engine(email, 0, "Email cannot be blank");
            engine(password, 1, "Password cannot be blank");
            for (let i = 0; i < document.querySelectorAll('.error').length; i++) {
                if (errorMsg[i].hasChildNodes()) {
                    err++;
                }
            }
            if (err == 0) {
                var formData = {
                    email: $("#email").val(),
                    password: $("#password").val(),
                };

                $.ajax({
                    type: "POST",
                    url: "<?= base_url(); ?>valid_login",
                    data: formData,
                    dataType: "json",
                    encode: true,
                    success: function(result) {
                        if (result.status == 0) {
                            window.location.href = base_url;
                        }else{
                            alert(result.message, 'danger');
                        }
                    },
                });
            }
        });
    </script>
</body>

</html>