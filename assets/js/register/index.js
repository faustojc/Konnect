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

                let address = document.querySelector('#address');
                if (!address) {
                    address = document.querySelector('#Address');
                }

                let region = document.querySelector('#region');
                if (!region) {
                    region = document.querySelector('#Region');
                }

                let province = document.querySelector('#province');
                if (!province) {
                    province = document.querySelector('#Province');
                }

                let city = document.querySelector('#city');
                if (!city) {
                    city = document.querySelector('#City');
                }

                let barangay = document.querySelector('#barangay');
                if (!barangay) {
                    barangay = document.querySelector('#Barangay');
                }

                locationDropdown(region, province, city, barangay);
                register(address, region, province, city, barangay);
            });
    }

    if (!user_type.value) {
        user_type.classList.add('is-invalid');
        user_type.parentElement.insertBefore(userTypeErrorMessage, user_type.nextElementSibling);
    }
});

const select_user_type = document.querySelector('select#user_type');
if (select_user_type) {
    select_user_type.addEventListener('change', function () {
        const user_type = document.querySelector('select#user_type');

        if ((user_type.value === 'EMPLOYEE' || user_type.value === 'EMPLOYER') && user_type.nextElementSibling !== null) {
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
const register = (address, region, province, city, barangay) => {
    document.querySelector('#register').addEventListener('click', function () {
        const validForm = validateForm('#needs-validation');

        if (validForm) {
            const form = document.querySelector('form');
            const formData = new FormData(form);

            formData.forEach((value, key) => {
                if (key === 'address') {
                    formData.set('address', address.value.trim());
                } else {
                    formData.set('Address', address.value.trim());
                }

                if (key === 'region') {
                    formData.set('region', region.options[region.selectedIndex].text.trim());
                } else {
                    formData.set('Region', region.options[region.selectedIndex].text.trim());
                }

                if (key === 'province') {
                    formData.set('province', province.options[province.selectedIndex].text.trim());
                } else {
                    formData.set('Province', province.options[province.selectedIndex].text.trim());
                }

                if (key === 'city') {
                    formData.set('city', city.options[city.selectedIndex].text.trim());
                } else {
                    formData.set('City', city.options[city.selectedIndex].text.trim());
                }

                if (key === 'barangay') {
                    formData.set('barangay', barangay.options[barangay.selectedIndex].text.trim());
                } else {
                    formData.set('Barangay', barangay.options[barangay.selectedIndex].text.trim());
                }
            });

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

function locationDropdown(region, province, city, barangay) {
    function fillProvinces() {
        province.innerHTML = '<option selected disabled>Choose State/Province</option>';
        city.innerHTML = '<option selected disabled>Choose city/municipality</option>';
        barangay.innerHTML = '<option selected disabled>Choose barangay</option>';

        fetch(baseUrl + 'assets/location/province.json')
            .then(response => response.json())
            .then(data => {
                const result = data.filter(value => value.region_code === region.value);
                result.sort((a, b) => a.province_name.localeCompare(b.province_name));

                result.forEach(entry => {
                    const option = document.createElement('option');

                    option.value = entry.province_code;
                    option.text = entry.province_name;
                    province.appendChild(option);
                });
            });
    }

    function fillCities() {
        city.innerHTML = '<option selected disabled>Choose city/municipality</option>';
        barangay.innerHTML = '<option selected disabled>Choose barangay</option>';

        fetch(baseUrl + 'assets/location/city.json')
            .then(response => response.json())
            .then(data => {
                const result = data.filter(value => value.province_code === province.value);
                result.sort((a, b) => a.city_name.localeCompare(b.city_name));

                result.forEach(entry => {
                    const option = document.createElement('option');
                    option.value = entry.city_code;
                    option.text = entry.city_name;
                    city.appendChild(option);
                });
            });
    }

    function fillBarangays() {
        barangay.innerHTML = '<option selected disabled>Choose barangay</option>';

        fetch(baseUrl + 'assets/location/barangay.json')
            .then(response => response.json())
            .then(data => {
                const result = data.filter(value => value.city_code === city.value);
                result.sort((a, b) => a.brgy_name.localeCompare(b.brgy_name));

                result.forEach(entry => {
                    const option = document.createElement('option');
                    option.value = entry.brgy_code;
                    option.text = entry.brgy_name;
                    barangay.appendChild(option);
                });
            });
    }

    region.addEventListener('change', fillProvinces);
    province.addEventListener('change', fillCities);
    city.addEventListener('change', fillBarangays);

    // Load region
    region.innerHTML = '<option selected disabled>Choose Region</option>';

    fetch(baseUrl + 'assets/location/region.json')
        .then(response => response.json())
        .then(data => {
            data.forEach(entry => {
                const option = document.createElement('option');

                option.value = entry.region_code;
                option.text = entry.region_name;
                region.appendChild(option);
            });
        });
}
