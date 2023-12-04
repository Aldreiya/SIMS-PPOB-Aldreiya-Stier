// Form Validation
let id = (id) => document.getElementById(id);
let classes = (classes) => document.getElementsByClassName(classes);
const emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;

let email = id("email"),
    firstname = id("first_name"),
    lastname = id("last_name"),
    password = id("password"),
    confirm_password = id("confirm_password"),
    form = id("form"),
    errorMsg = classes("error");

let engine = (id, serial, message) => {
    if (id.value.trim() === "") {
        errorMsg[serial].innerHTML = message;
        id.style.border = "1px solid red";
        id.previousElementSibling.style.color = "red";
        return 0;
    }
    if (id.name == 'email' && !emailRegex.test(id.value)) {
        errorMsg[serial].innerHTML = "format email tidak valid";
        id.style.border = "1px solid red";
        id.previousElementSibling.style.color = "red";
        return 0;
    }
    if ((id.name == 'password' || id.name == 'confirm_password') && id.value.length < 8) {
        errorMsg[serial].innerHTML = "harus 8 karakter";
        id.style.border = "1px solid red";
        id.previousElementSibling.style.color = "red";
        return 0;
    }
    if (id.name == 'confirm_password' && id.value != password.value) {
        errorMsg[serial].innerHTML = "password tidak sama";
        id.style.border = "1px solid red";
        id.previousElementSibling.style.color = "red";
        return 0;
    }
    errorMsg[serial].innerHTML = "";
    id.style.border = "1px solid gray";
    id.previousElementSibling.style.color = "gray";
}

// Form Submit
form.addEventListener("submit", (e) => {
    e.preventDefault();
    let err = 0;
    engine(email, 0, "Email cannot be blank");
    engine(firstname, 1, "First Name cannot be blank");
    engine(lastname, 2, "Last Name cannot be blank");
    engine(password, 3, "Password cannot be blank");
    engine(confirm_password, 4, "Password cannot be blank");
    for (let i = 0; i < document.querySelectorAll('.error').length; i++) {
        if (errorMsg[i].hasChildNodes()) {
            err++;
        }
    }
    if (err == 0) {
        var formData = {
            email: $("#email").val(),
            first_name: $("#first_name").val(),
            last_name: $("#last_name").val(),
            password: $("#password").val(),
        };

        $.ajax({
            type: "POST",
            url: "https://take-home-test-api.nutech-integrasi.app/registration",
            data: formData,
            dataType: "json",
            encode: true,
            success: function (result) {
                swal.fire({
                    html: '<strong>'+result.message+'</strong>',
                    icon: "success",
                    type: "success",
                    showConfirmButton: true,
                }).then(() => { window.location.href = base_url + "login"; }, 1000);
            },
            error: function (errorMessage) {
                alert(errorMessage.responseJSON.message, 'danger');
            },
        });
    }
});

// Alert Form
const alertPlaceholder = document.getElementById('liveAlertPlaceholder')
const alert = (message, type) => {
    const wrapper = document.createElement('div')
    wrapper.innerHTML = [
        `<div class="alert alert-${type} alert-dismissible fade show" role="alert">`,
        `   ${message}`,
        '<button type="button" class="close" data-dismiss="alert" aria-label="Close" style="outline: none;"><span aria-hidden="true">&times;</span></button>',
        '</div>'
    ].join('')
    alertPlaceholder.append(wrapper)
}

$('.close').click(function () {
    $(".alert").hide();
})
