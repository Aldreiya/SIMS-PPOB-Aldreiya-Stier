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
    <style>
        .nominalSelect input[type="radio"] {
            display: none;
        }

        .nominalSelect input[type="radio"]:hover+span {
            color: red !important;
        }

        .nominalSelect input[type="radio"]:checked+span {
            background-color: lightgray !important;
            color: red !important;
        }

        #inp_balance:focus {
            outline: none;
        }
    </style>
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
                            <a href="<?= base_url() ?>topup" class="nav-link active">Top Up</a>
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
            <div class="topup-label mt-4">
                <h5 class="font-weight-normal mb-1">Silahkan masukkan</h5>
                <h3>Nominal Top Up</h3>
            </div>
            <div class="topup-input mt-5">
                <div class="row">
                    <div class="col-7">
                        <i class="bi bi-cash"></i>
                        <p class="nominalSelect" id="nominalSelect">
                            <label class="mb-3"><input type="radio" name="harga" value="" id="custom"><input type="number" id="inp_balance" class="bg-white" style="width:42.8rem;" placeholder="masukkan nominal Top Up"></label>
                        </p>
                        <button type="submit" id="btnTopup" class="btn btn-secondary btn-block" disabled>Top Up</button>
                    </div>
                    <div class="col-4">
                        <div class="row">
                            <p class="nominalSelect col-4 px-2 mb-3">
                                <label class="m-0"><input type="radio" name="harga" value="10000" id="custom1"><span class="btn btn-secondary bg-white btn-block font-weight-bold text-secondary">Rp 10.000</span></label>
                            </p>
                            <p class="nominalSelect col-4 px-2 mb-3">
                                <label class="m-0"><input type="radio" name="harga" value="20000" id="custom2"><span class="btn btn-secondary bg-white btn-block font-weight-bold text-secondary">Rp 20.000</span></label>
                            </p>
                            <p class="nominalSelect col-4 px-2 mb-3">
                                <label class="m-0"><input type="radio" name="harga" value="50000" id="custom3"><span class="btn btn-secondary bg-white btn-block font-weight-bold text-secondary">Rp 50.000</span></label>
                            </p>
                            <p class="nominalSelect col-4 px-2 mb-3">
                                <label class="m-0"><input type="radio" name="harga" value="100000" id="custom4"><span class="btn btn-secondary bg-white btn-block font-weight-bold text-secondary">Rp 100.000</span></label>
                            </p>
                            <p class="nominalSelect col-4 px-2 mb-3">
                                <label class="m-0"><input type="radio" name="harga" value="250000" id="custom5"><span class="btn btn-secondary bg-white btn-block font-weight-bold text-secondary">Rp 250.000</span></label>
                            </p>
                            <p class="nominalSelect col-4 px-2 mb-3">
                                <label class="m-0"><input type="radio" name="harga" value="5a00000" id="custom6"><span class="btn btn-secondary bg-white btn-block font-weight-bold text-secondary">Rp 500.000</span></label>
                            </p>
                        </div>
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
    <script src="<?= base_url(); ?>assets/js/script.js"></script>
    <script>
        $(document).on('change', "input[name='harga']", function(e) {
            const custom = $("input[name='harga']:checked").val();
            const btn = document.getElementById("btnTopup");
            btn.removeAttribute('disabled');
            console.log(custom);
            console.log($("input[name='harga']:checked").attr("id"));
        });

        $(document).on('click', "#inp_balance", function(e) {
            const custom = $("input[name='harga']:checked").val();
            const btn = document.getElementById("btnTopup");
            document.getElementById("custom").checked = true;
            btn.removeAttribute('disabled');
            console.log(custom);
            console.log($("input[name='harga']:checked").attr("id"));
        });
        $(document).on('change', "#inp_balance", function(e) {
            const btn = document.getElementById("inp_balance");
            const custom = document.getElementById("custom");
            custom.value = btn.value;
        });
    </script>
    <script>
        const successIcon = `<svg xmlns="http://www.w3.org/2000/svg" width="90" height="90" fill="#54BB94" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"></path>
                        </svg>`;
        const failIcon = `<svg xmlns="http://www.w3.org/2000/svg" width="90" height="90" fill="#F85435" class="bi bi-x-circle-fill" viewBox="0 0 16 16">
                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293z"/>
                        </svg>`;
        $("#btnTopup").click(function() {
            const nominal = $("input[name='harga']:checked").val();
            const saldo = balances;
            const rupiah = new Intl.NumberFormat("id-ID").format(nominal);

            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: "noBg mb-3",
                    cancelButton: "noBg text-secondary"
                },
                buttonsStyling: false
            });
            swalWithBootstrapButtons.fire({
                html: `<p class="mb-1" style="font-size:18px;">Anda yakin untuk Top Up sebesar</p><h5 class="mb-2"><b>Rp ${rupiah} ?</b></h5>`,
                iconHtml: `<img src="<?= base_url(); ?>assets/image/Logo.png" alt="" height="90">`,
                width: 400,
                showCancelButton: true,
                confirmButtonText: "Ya, lanjutkan Top Up",
                cancelButtonText: 'Batalkan'
            }).then((result) => {
                if (result.isConfirmed) {
                    var formData = {
                        "top_up_amount": nominal
                    };
                    $.ajax({
                        method: 'POST',
                        url: 'https://take-home-test-api.nutech-integrasi.app/topup',
                        data: formData,
                        dataType: "json",
                        encode: true,
                        beforeSend: function(xhr) {
                            xhr.setRequestHeader("Authorization", "Bearer " + token);
                        },
                        success: function(response) {
                            let icon = successIcon;
                            let status = "berhasil!";
                            swalWithBootstrapButtons.fire({
                                html: `<p class="mb-1" style="font-size:18px;">Top Up sebesar</p><h5 class="mb-2"><b>Rp ${rupiah}</b></h5><p class="mb-1">${status}</p>`,
                                iconHtml: icon,
                                width: 400,
                                confirmButtonText: "Kembali ke Beranda"
                            }).then(() => {
                                if (result.isConfirmed) {
                                    window.location.href = base_url;
                                } else {
                                    window.location.reload();
                                }
                            }, 1000);
                        },
                        error: function(err) {
                            let icon = failIcon;
                            let status = "gagal";
                            swalWithBootstrapButtons.fire({
                                html: `<p class="mb-1" style="font-size:18px;">Top Up sebesar</p><h5 class="mb-2"><b>Rp ${rupiah}</b></h5><p class="mb-1">${status}</p>`,
                                iconHtml: icon,
                                width: 400,
                                confirmButtonText: "Kembali ke Beranda"
                            }).then(() => {
                                if (result.isConfirmed) {
                                    window.location.href = base_url;
                                } else {
                                    window.location.reload();
                                }
                            }, 1000);
                        }
                    });
                    // }
                } else if (result.isDenied) {
                    Swal.fire("Changes are not saved", "", "info");
                }
            });
        });
    </script>
</body>

</html>