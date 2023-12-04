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
            const email = document.getElementById("email");
            const first_name = document.getElementById("first_name");
            const last_name = document.getElementById("last_name");
            const fullname = document.getElementById("fullname");
            const profileImage = document.getElementById("profile_image");
            profileImage.setAttribute('src', profiles.profile_image);
            email.value = profiles.email;
            first_name.value = profiles.first_name;
            last_name.value = profiles.last_name;
            fullname.innerHTML = profiles.first_name + ' ' + profiles.last_name;
        }
    });
}

$("#btn-edit").click(function () {
    event.preventDefault();
    const btnGroup = document.getElementById('button-group');
    const firstName = document.getElementById('first_name');
    const lastName = document.getElementById('last_name');
    const end = email.value.length;

    const btnSubmit = document.createElement("button");
    btnSubmit.setAttribute("id", "btn-submit");
    btnSubmit.setAttribute("type", "submit");
    btnSubmit.setAttribute("class", "btn");
    btnSubmit.innerText = 'Submit';

    while (btnGroup.firstChild) {
        btnGroup.removeChild(btnGroup.lastChild);
    }

    firstName.removeAttribute('disabled');
    lastName.removeAttribute('disabled');
    firstName.setSelectionRange(end, end);
    firstName.focus();
    btnGroup.append(btnSubmit);
});

$('#edit-img').on('click', function () {
    $('#fileinput').trigger('click');
});

$("#fileinput").change(function (e) {
    let fileInput = document.getElementById('fileinput');
    let filePath = fileInput.value;
    // Allowing file type
    let allowedExtensions = /(\.jpeg|\.png)$/i;

    if (!allowedExtensions.exec(filePath)) {
        alert('Invalid file type');
        fileInput.value = '';
        return false;
    } else {
        $('#formImg').trigger('submit');
    }
});

$("#formImg").on('submit', (function (e) {
    e.preventDefault();
    let formData = new FormData();
    formData.append("file", fileinput.files[0]);
    $.ajax({
        url: "https://take-home-test-api.nutech-integrasi.app/profile/image",
        type: "PUT",
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        beforeSend: function (xhr) {
            xhr.setRequestHeader("Authorization", "Bearer " + token);
        },
        success: function (result) {
            // console.log(result);
            window.location.reload();
        },
        error: function (e) {
            // console.log(e);
        }
    });
}));

// Form Validation
let id = (id) => document.getElementById(id);
let classes = (classes) => document.getElementsByClassName(classes);

let firstname = id("first_name"),
    lastname = id("last_name"),
    form = id("form"),
    errorMsg = classes("error");

let engine = (id, serial, message) => {
    if (id.value.trim() === "") {
        errorMsg[serial].innerHTML = message;
        id.style.border = "1px solid red";
        id.previousElementSibling.style.color = "red";
        return 0;
    }
    errorMsg[serial].innerHTML = "";
    id.style.border = "1px solid gray";
    id.previousElementSibling.style.color = "gray";
}

$("#form").on('submit', (function (e) {
    e.preventDefault();
    let err = 0;
    engine(firstname, 0, "First Name cannot be blank");
    engine(lastname, 1, "Last Name cannot be blank");
    for (let i = 0; i < document.querySelectorAll('.error').length; i++) {
        if (errorMsg[i].hasChildNodes()) {
            err++;
        }
    }
    if (err == 0) {
        var formData = {
            first_name: $("#first_name").val(),
            last_name: $("#last_name").val(),
        };

        $.ajax({
            type: "PUT",
            url: "https://take-home-test-api.nutech-integrasi.app/profile/update",
            data: formData,
            dataType: "json",
            encode: true,
            beforeSend: function (xhr) {
                xhr.setRequestHeader("Authorization", "Bearer " + token);
            },
            success: function (result) {

                let icon = successIcon;
                swalWithBootstrapButtons.fire({
                    html: `<h5 class="mb-2"><b>Berhasil!</h5>`,
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
            error: function (errorMessage) {
                console.error(errorMessage);
            },
        });
    }
}));


const successIcon = `<svg xmlns="http://www.w3.org/2000/svg" width="90" height="90" fill="#54BB94" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
<path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"></path>
</svg>`;
const failIcon = `<svg xmlns="http://www.w3.org/2000/svg" width="90" height="90" fill="#F85435" class="bi bi-x-circle-fill" viewBox="0 0 16 16">
<path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293z"/>
</svg>`;
const swalWithBootstrapButtons = Swal.mixin({
    customClass: {
        confirmButton: "noBg mb-3",
        cancelButton: "noBg text-secondary"
    },
    buttonsStyling: false
});