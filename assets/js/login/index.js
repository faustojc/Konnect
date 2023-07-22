const userTypeErrorMessage = document.createElement('p');
userTypeErrorMessage.classList.add('invalid-feedback', 'm-0', 'd-block');
userTypeErrorMessage.textContent = 'Please select on what to login.';

const loadFormLogin = () => {
    const loginBtn = document.querySelector('button#login');
    loginBtn.addEventListener('click', function () {
        const isValid = validateForm('#needs-validation');

        if (isValid) {
            const spinner = document.createElement('span');
            spinner.classList.add('spinner-border', 'spinner-border-sm', 'mx-2');
            spinner.setAttribute('role', 'status');
            spinner.setAttribute('aria-hidden', 'true');

            loginBtn.append(spinner);

            const formData = new FormData();

            formData.append('email', document.querySelector('input#email').value);
            formData.append('password', document.querySelector('input#password').value);
            formData.append('user_type', document.querySelector('input#user_type').value);

            fetch(baseUrl + 'login/authenticate', {
                method: 'POST',
                body: formData
            })
                .then(response => response.json())
                .then(data => {
                    if (data.redirect) {
                        window.location.href = data.redirect;
                    } else if (data.status !== 'success') {
                        loginBtn.querySelector('span.spinner-border').remove();

                        let errorContainer = document.createElement('div');

                        errorContainer.classList.add('alert', 'alert-danger');
                        errorContainer.setAttribute('role', 'alert');
                        errorContainer.innerHTML = data.message;

                        const form = document.querySelector('form#needs-validation');

                        if (form.querySelector('div.alert.alert-danger') != null) {
                            form.querySelector('div.alert.alert-danger').remove();
                        }

                        form.insertAdjacentElement('afterbegin', errorContainer);
                    }
                });
        }
    });
}


const backBtn = () => {
    document.querySelector('button#back').addEventListener('click', function () {
        fetch(baseUrl + 'login/getChooseForm',)
            .then(response => response.text())
            .then(data => {
                document.querySelector('.form-display').innerHTML = data;
                selectUserType();
                nextBtn();
            });
    });
}

const selectUserType = () => {
    document.querySelector('select#user_type').addEventListener('change', function () {
        const user_type = document.querySelector('select#user_type');
        const invalidFeedback = document.querySelector('p.invalid-feedback');

        if ((user_type.value === 'EMPLOYEE' || user_type.value === 'EMPLOYER') && invalidFeedback) {
            user_type.classList.remove('is-invalid');
            user_type.nextElementSibling.remove();
        }
    });
}

const nextBtn = () => {
    document.querySelector('button.next-btn').addEventListener('click', function () {
        const formDisplay = document.querySelector('.form-display');
        const user_type = document.querySelector('select#user_type');

        if (user_type.value === 'EMPLOYEE' || user_type.value === 'EMPLOYER') {
            fetch(baseUrl + 'login/getLoginForm')
                .then(response => response.text())
                .then(data => {
                    formDisplay.innerHTML = data;

                    let input = document.createElement('input');
                    input.type = 'hidden';
                    input.name = 'user_type';
                    input.id = 'user_type';
                    input.value = user_type.value;

                    document.querySelector('form').appendChild(input);
                    loadFormLogin();
                    backBtn();
                });
        } else {
            user_type.classList.add('is-invalid');
            user_type.parentElement.insertBefore(userTypeErrorMessage, user_type.nextElementSibling);
        }
    });
}

selectUserType();
nextBtn();
