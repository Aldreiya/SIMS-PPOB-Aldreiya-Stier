$(document).ready(function () {
    loaddataInfo();
});
let balances = 0;
function loaddataInfo() {
    $.ajax({
        method: 'GET',
        url: 'https://take-home-test-api.nutech-integrasi.app/profile',
        beforeSend: function (xhr) {
            xhr.setRequestHeader("Authorization", "Bearer " + token);
        },
        success: function (response) {
            const profiles = response.data;
            const fullname = document.getElementById("fullname");
            const profileImage = document.getElementById("profile_image");
            profileImage.setAttribute('src', profiles.profile_image);
            fullname.innerHTML = profiles.first_name + ' ' + profiles.last_name;
        }
    });
    $.ajax({
        method: 'GET',
        url: 'https://take-home-test-api.nutech-integrasi.app/balance',
        beforeSend: function (xhr) {
            xhr.setRequestHeader("Authorization", "Bearer " + token);
        },
        success: function (response) {
            balances = response.data.balance;
        }
    });
}

$(document).ready(function () {
    $(".err-img").on("error", function () {
        $(this).attr('src', base_url+'assets/image/Profile Photo.png');
    });
});
const toggleSaldo = document.querySelector('#toggleSaldo');
const saldoField = document.querySelector('#saldo');
toggleSaldo.addEventListener('click', () => {
    const type = saldoField.getAttribute('type') === 'password' ? 'text' : 'password';
    saldoField.setAttribute('type', type);
    if (saldoField.getAttribute('value') == "0000000" && saldoField.getAttribute('type') == "text") {
        const rupiah = new Intl.NumberFormat("id-ID").format(balances);
        saldoField.value = rupiah;
    }
    if(saldoField.value.length < 7 && saldoField.getAttribute('type') == "password"){
        saldoField.value = "0000000";
    }
    toggleSaldo.classList.toggle('bi-eye');
});