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
                            <a href="javascript:void(0)" class="nav-link active">Transaction</a>
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
            <div class="transaksi-label mt-4">
                <h5 class="font-weight-bold mb-1">Semua Transaksi</h5>
            </div>
            <div class="list-transaksi mt-4" id="transaction-menu">
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
        $(document).ready(function() {
            $.ajax({
                method: 'GET',
                url: 'https://take-home-test-api.nutech-integrasi.app/transaction/history',
                data: {
                    offset: 0,
                    limit: 5
                },
                beforeSend: function(xhr) {
                    xhr.setRequestHeader("Authorization", "Bearer " + token);
                },
                success: function(response) {
                    const records = response.data.records;
                    const transactionMenu = document.getElementById('transaction-menu');
                    for (let i = 0; i < records.length; i++) {
                        const rupiah = new Intl.NumberFormat("id-ID").format(records[i].total_amount);
                        let type = records[i].transaction_type == 'TOPUP' ? 'success' : 'danger';
                        let sign = records[i].transaction_type == 'TOPUP' ? '+' : '-';
                        const desc = records[i].description;
                        var date = new Date(records[i].created_on);
                        var tahun = date.getFullYear();
                        var bulan = date.getMonth();
                        var tanggal = date.getDate();
                        var hari = date.getDay();
                        var jam = date.getHours();
                        var menit = date.getMinutes();
                        var detik = date.getSeconds();
                        let arrBulan = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
                        let namaBulan = arrBulan[bulan];
                        let tanggals = tanggal + ' ' + namaBulan + ' ' + tahun + ' ' + jam + ':' + menit + ' WIB';

                        const card = document.createElement("div");
                        card.setAttribute('class', 'card mb-3');
                        card.innerHTML = `
                        <div class="card-body py-2">
                            <div class="row justify-content-between">
                                <div class="col">
                                    <h4 class="text-${type} my-0">${sign} Rp.${rupiah}</h4>
                                    <p class="text-muted my-0"><small>${tanggals}</small></p>
                                </div>
                                <div class="col text-right">
                                    <p><small><b>${desc}</b></small></p>
                                </div>
                            </div>
                        </div>`;
                        transactionMenu.append(card);
                    }
                    const show = document.createElement("div");
                    show.setAttribute('class', 'text-center');
                    show.innerHTML = '<a id="show_more" class="text-danger" style="cursor:pointer;">Show More</a>';
                    transactionMenu.append(show);
                    // console.log(records);
                }
            });
        });
        $(document).on('click', '#show_more', function(e) {
            const transactionMenu = document.getElementById('transaction-menu');
            while (transactionMenu.firstChild) {
                transactionMenu.removeChild(transactionMenu.lastChild);
            }
            const nav = document.createElement("div");
            nav.innerHTML = `
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link" id="nav-april-tab" data-toggle="tab" href="#nav-april" role="tab" aria-controls="nav-april" aria-selected="false">April</a>
                        <a class="nav-item nav-link" id="nav-mei-tab" data-toggle="tab" href="#nav-mei" role="tab" aria-controls="nav-mei" aria-selected="false">Mei</a>
                        <a class="nav-item nav-link" id="nav-juni-tab" data-toggle="tab" href="#nav-juni" role="tab" aria-controls="nav-juni" aria-selected="true">Juni</a>
                        <a class="nav-item nav-link" id="nav-juli-tab" data-toggle="tab" href="#nav-juli" role="tab" aria-controls="nav-juli" aria-selected="false">Juli</a>
                        <a class="nav-item nav-link active" id="nav-agustus-tab" data-toggle="tab" href="#nav-agustus" role="tab" aria-controls="nav-agustus" aria-selected="false">Agustus</a>
                        <a class="nav-item nav-link" id="nav-september-tab" data-toggle="tab" href="#nav-september" role="tab" aria-controls="nav-september" aria-selected="true">September</a>
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade" id="nav-april" role="tabpanel" aria-labelledby="nav-april-tab"></div>
                    <div class="tab-pane fade" id="nav-mei" role="tabpanel" aria-labelledby="nav-mei-tab"></div>
                    <div class="tab-pane fade" id="nav-juni" role="tabpanel" aria-labelledby="nav-juni-tab"></div>
                    <div class="tab-pane fade" id="nav-juli" role="tabpanel" aria-labelledby="nav-juli-tab"></div>
                    <div class="tab-pane fade active show" id="nav-agustus" role="tabpanel" aria-labelledby="nav-agustus-tab"></div>
                    <div class="tab-pane fade" id="nav-september" role="tabpanel" aria-labelledby="nav-september-tab"></div>
                </div>
            `;
            transactionMenu.append(nav);
        });
    </script>
</body>

</html>