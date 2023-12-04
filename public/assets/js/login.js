const togglePassword = document.querySelector('#togglePassword');
const passwordField = document.querySelector('#password');
togglePassword.addEventListener('click', () => {
    // Toggle the type attribute using
    // getAttribure() method
    const type = passwordField
        .getAttribute('type') === 'password' ?
        'text' : 'password';
    passwordField.setAttribute('type', type);
    // Toggle the eye and bi-eye icon
    togglePassword.classList.toggle('bi-eye');
});

// Form Validation
let id = (id) => document.getElementById(id);
let classes = (classes) => document.getElementsByClassName(classes);
const emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;

let email = id("email"),
    password = id("password"),
    form = id("form"),
    errorMsg = classes("error"),
    errorStatus = classes("err-status");

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
    if (id.name == 'password' && id.value.length < 8) {
        errorMsg[serial].innerHTML = "harus 8 karakter";
        id.style.border = "1px solid red";
        id.previousElementSibling.style.color = "red";
        return 0;
    }
    errorMsg[serial].innerHTML = "";
    id.style.border = "1px solid gray";
    id.previousElementSibling.style.color = "gray";
}

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