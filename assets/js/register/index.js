let emailIsValid = false;
let passwordIsValid = false;
let confirmPasswordIsValid = false;
let records = null;

const nextBtn = document.querySelector('button.next-btn');
const email = document.querySelector('input#email');
const password = document.querySelector('input#password');

const getRecords = () => {
    fetch(baseUrl + 'register/records')
        .then(response => response.json())
        .then(data => records = data);
}
getRecords();

const emailErrorMessage = document.createElement('p');
emailErrorMessage.classList.add('invalid-feedback', 'm-0', 'd-block');

const passwordErrorMessage = document.createElement('p');
passwordErrorMessage.classList.add('invalid-feedback', 'm-0', 'd-block');
passwordErrorMessage.textContent = 'Password must be 6 characters long.';

const userTypeErrorMessage = document.createElement('p');
userTypeErrorMessage.classList.add('invalid-feedback', 'm-0', 'd-block');
userTypeErrorMessage.textContent = 'Please select on what to register.';

const confirmPasswordErrorMessage = document.createElement('p');
confirmPasswordErrorMessage.classList.add('invalid-feedback', 'm-0', 'd-block');
confirmPasswordErrorMessage.textContent = 'Password does not match.';

const PasswordReqErrorMessage = document.createElement('p');
PasswordReqErrorMessage.classList.add('invalid-feedback', 'm-0', 'd-block');
PasswordReqErrorMessage.textContent = 'Password needs to have 1 special char.';

const PasswordNumReqErrorMessage = document.createElement('p');
PasswordNumReqErrorMessage.classList.add('invalid-feedback', 'm-0', 'd-block');
PasswordNumReqErrorMessage.textContent = 'Password needs to have at least 1 number.';

const PasswordUpReqErrorMessage = document.createElement('p');
PasswordUpReqErrorMessage.classList.add('invalid-feedback', 'm-0', 'd-block');
PasswordUpReqErrorMessage.textContent = 'Password needs to have at least 1 uppercase.';


email.addEventListener('input', function () {
    const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    emailIsValid = regex.test(email.value);

    if (!emailIsValid) {
        emailErrorMessage.textContent = 'Please enter a valid email address.';
        email.classList.add('is-invalid');

        const emailInput = document.querySelector('div.email-input');
        emailInput.parentElement.insertBefore(emailErrorMessage, emailInput.nextElementSibling);
        setNextBtn();
    } else {
        if (records !== null) {
            records.some(record => {
                if (record.email.toLowerCase() === email.value.toLowerCase()) {
                    emailErrorMessage.textContent = 'This email is already taken.';
                    emailIsValid = false;

                    return true;
                } else {
                    emailIsValid = true;
                }
            });

            if (emailIsValid) {
                email.classList.remove('is-invalid');
                emailErrorMessage.remove();
            } else {
                email.classList.add('is-invalid');

                const emailInput = document.querySelector('div.email-input');
                emailInput.parentElement.insertBefore(emailErrorMessage, emailInput.nextElementSibling);
            }

            setNextBtn();
        }
    }
});

password.addEventListener('input', function () {
    if (this.value.length >= 6) {
        password.classList.remove('is-invalid');
        passwordErrorMessage.remove();
    } else {
        password.classList.add('is-invalid');

        const passwordInput = document.querySelector('div.password-input');
        passwordInput.parentElement.insertBefore(passwordErrorMessage, passwordInput.nextElementSibling);
    }

    passwordIsValid = this.value.length >= 6;
    setNextBtn();
});


password.addEventListener('input', function () {
    const passwordValue = this.value;
    const hasSpecialCharacter = /[!@#$%^&*()_+\-=[\]{};':"\\|,.<>/?]/.test(passwordValue);

    if (hasSpecialCharacter) {
        password.classList.remove('is-invalid');
        PasswordReqErrorMessage.remove();
    } else {
        password.classList.add('is-invalid');
        const passwordInput = document.querySelector('div.password-input');
        passwordInput.parentElement.insertBefore(PasswordReqErrorMessage, passwordInput.nextElementSibling);
    }

    passwordIsValid = hasSpecialCharacter;
    setNextBtn();
});

password.addEventListener('input', function () {
    const passwordValue = this.value;
    const hasNumber = /\d/.test(passwordValue);

    if (hasNumber) {
        password.classList.remove('is-invalid');
        PasswordNumReqErrorMessage.remove();
    } else {
        password.classList.add('is-invalid');
        const passwordInput = document.querySelector('div.password-input');
        passwordInput.parentElement.insertBefore(PasswordNumReqErrorMessage, passwordInput.nextElementSibling);
    }

    passwordIsValid = hasNumber;
    setNextBtn();
});

password.addEventListener('input', function () {
    const passwordValue = this.value;
    const hasUppercase = /[A-Z]/.test(passwordValue);


    if (hasUppercase) {
        password.classList.remove('is-invalid');
        PasswordUpReqErrorMessage.remove();
    } else {
        password.classList.add('is-invalid');
        const passwordInput = document.querySelector('div.password-input');
        passwordInput.parentElement.insertBefore(PasswordUpReqErrorMessage, passwordInput.nextElementSibling);
    }

    passwordIsValid = hasUppercase;
    setNextBtn();
});

nextBtn.addEventListener('click', function () {
    const user_type = document.querySelector('select#user_type');
    const validForm = validateForm('#needs-validation');

    if (validForm && (user_type.value === 'EMPLOYER' || user_type.value === 'EMPLOYEE') && emailIsValid && passwordIsValid) {
        let url = baseUrl + 'register/';

        if (user_type.value === 'EMPLOYEE') {
            url += 'employeeForm';
        } else {
            url += 'employerForm';
        }

        fetch(url)
            .then(response => response.text())
            .then(data => {
                const form = document.querySelector('form');
                form.innerHTML = data;

                let usertypeInput = document.createElement('input');
                usertypeInput.type = 'hidden';
                usertypeInput.name = 'user_type';
                usertypeInput.id = 'user_type';
                usertypeInput.value = user_type.value;

                usertypeInput.setAttribute('readonly', 'readonly');
                email.setAttribute('hidden', 'hidden');
                email.setAttribute('readonly', 'readonly');
                password.setAttribute('hidden', 'hidden');
                password.setAttribute('readonly', 'readonly');

                form.appendChild(usertypeInput);
                form.appendChild(email);
                form.appendChild(password);
                register();
            });
    } else {
        user_type.classList.add('is-invalid');
        user_type.parentElement.insertBefore(userTypeErrorMessage, user_type.nextElementSibling);
    }
});

const select_user_type = document.querySelector('select#user_type');
if (select_user_type) {
    select_user_type.addEventListener('change', function () {
        const user_type = document.querySelector('select#user_type');

        if (user_type.value === 'EMPLOYEE' || user_type.value === 'EMPLOYER') {
            user_type.classList.remove('is-invalid');
            user_type.nextElementSibling.remove();
        }
    });
}

const setNextBtn = () => {
    if (!emailIsValid || !passwordIsValid || !confirmPasswordIsValid) {
        nextBtn.setAttribute('disabled', 'disabled');
    } else {
        nextBtn.removeAttribute('disabled');
    }
}

// For Register Form
const register = () => {
    document.querySelector('#register').addEventListener('click', function () {
        const validForm = validateForm('#needs-validation');

        if (validForm) {
            const form = document.querySelector('form');
            const formData = new FormData(form);

            fetch(baseUrl + 'register', {
                method: 'POST',
                body: formData
            }).then(response => response.json())
                .then(data => {
                    window.location.href = data.redirect;
                })
        }
    });
}

const passwordConfirmInput = document.getElementById("password_confirm");

function validatePassword() {
    if (this.value === password.value) {
        passwordConfirmInput.classList.remove('is-invalid');
        confirmPasswordErrorMessage.remove();
    } else {
        passwordConfirmInput.classList.add('is-invalid');

        const confirmPassInput = document.querySelector('div.confirm-password-input');
        confirmPassInput.parentElement.insertBefore(confirmPasswordErrorMessage, confirmPassInput.nextElementSibling);
    }

    confirmPasswordIsValid = this.value === passwordConfirmInput.value;
    setNextBtn();
}

// Automatically validate on input change
passwordConfirmInput.addEventListener("input", validatePassword);

document.addEventListener("DOMContentLoaded", function() {
      var my_handlers = {
            // fill province
            fill_provinces: function () {
                //selected region
                var region_code = $(this).val();

                // set selected text to input
                var region_text = $(this).find("option:selected").text();
                let region_input = $('#region-text');
                region_input.val(region_text);
                //clear province & city & barangay input
                $('#province-text').val('');
                $('#city-text').val('');
                $('#barangay-text').val('');

                //province
                let dropdown = $('#province');
                dropdown.empty();
                dropdown.append('<option selected="true" disabled>Choose State/Province</option>');
                dropdown.prop('selectedIndex', 0);

                //city
                let city = $('#city');
                city.empty();
                city.append('<option selected="true" disabled></option>');
                city.prop('selectedIndex', 0);

                //barangay
                let barangay = $('#barangay');
                barangay.empty();
                barangay.append('<option selected="true" disabled></option>');
                barangay.prop('selectedIndex', 0);

                // filter & fill
                var url = baseUrl+'assets/location/province.json';
                $.getJSON(url, function (data) {
                    var result = data.filter(function (value) {
                        return value.region_code == region_code;
                    });

                    result.sort(function (a, b) {
                        return a.province_name.localeCompare(b.province_name);
                    });

                    $.each(result, function (key, entry) {
                        dropdown.append($('<option></option>').attr('value', entry.province_code).text(entry.province_name));
                    })

                });
            },
            // fill city
            fill_cities: function () {
                //selected province
                var province_code = $(this).val();

                // set selected text to input
                var province_text = $(this).find("option:selected").text();
                let province_input = $('#province-text');
                province_input.val(province_text);
                //clear city & barangay input
                $('#city-text').val('');
                $('#barangay-text').val('');

                //city
                let dropdown = $('#city');
                dropdown.empty();
                dropdown.append('<option selected="true" disabled>Choose city/municipality</option>');
                dropdown.prop('selectedIndex', 0);

                //barangay
                let barangay = $('#barangay');
                barangay.empty();
                barangay.append('<option selected="true" disabled></option>');
                barangay.prop('selectedIndex', 0);

                // filter & fill
                var url = baseUrl+'assets/location/city.json';
                $.getJSON(url, function (data) {
                    var result = data.filter(function (value) {
                        return value.province_code == province_code;
                    });

                    result.sort(function (a, b) {
                        return a.city_name.localeCompare(b.city_name);
                    });

                    $.each(result, function (key, entry) {
                        dropdown.append($('<option></option>').attr('value', entry.city_code).text(entry.city_name));
                    })

                });
            },
            // fill barangay
            fill_barangays: function () {
                // selected barangay
                var city_code = $(this).val();

                // set selected text to input
                var city_text = $(this).find("option:selected").text();
                let city_input = $('#city-text');
                city_input.val(city_text);
                //clear barangay input
                $('#barangay-text').val('');

                // barangay
                let dropdown = $('#barangay');
                dropdown.empty();
                dropdown.append('<option selected="true" disabled>Choose barangay</option>');
                dropdown.prop('selectedIndex', 0);

                // filter & Fill
                var url = baseUrl+'assets/location/barangay.json';
                $.getJSON(url, function (data) {
                    var result = data.filter(function (value) {
                        return value.city_code == city_code;
                    });

                    result.sort(function (a, b) {
                        return a.brgy_name.localeCompare(b.brgy_name);
                    });

                    $.each(result, function (key, entry) {
                        dropdown.append($('<option></option>').attr('value', entry.brgy_code).text(entry.brgy_name));
                    })

                });
            },

            onchange_barangay: function () {
                // set selected text to input
                var barangay_text = $(this).find("option:selected").text();
                let barangay_input = $('#barangay-text');
                barangay_input.val(barangay_text);
            },

        };


        $(function () {
            // events
            $('#region').on('change', my_handlers.fill_provinces);
            $('#province').on('change', my_handlers.fill_cities);
            $('#city').on('change', my_handlers.fill_barangays);
            $('#barangay').on('change', my_handlers.onchange_barangay);

            // load region
            let dropdown = $('#region');
            dropdown.empty();
            dropdown.append('<option selected="true" disabled>Choose Region</option>');
            dropdown.prop('selectedIndex', 0);
            const url = baseUrl+'assets/location/region.json';
            // Populate dropdown with list of regions
            $.getJSON(url, function (data) {
                $.each(data, function (key, entry) {
                    dropdown.append($('<option></option>').attr('value', entry.region_code).text(entry.region_name));
                })
            });

        });
        // events
        $('#region').on('change', my_handlers.fill_provinces);
        $('#province').on('change', my_handlers.fill_cities);
        $('#city').on('change', my_handlers.fill_barangays);
        $('#barangay').on('change', my_handlers.onchange_barangay);

        // load region
        let dropdown = $('#region');
        dropdown.empty();
        dropdown.append('<option selected="true" disabled>Choose Region</option>');
        dropdown.prop('selectedIndex', 0);
        const url = baseUrl+'assets/location/region.json';
        // Populate dropdown with list of regions
        $.getJSON(url, function (data) {
            $.each(data, function (key, entry) {
                dropdown.append($('<option></option>').attr('value', entry.region_code).text(entry.region_name));
            })
        });
});