let emailIsValid = false;
let passwordIsValid = false;
let records = null;

const nextBtn = document.querySelector('button.next-btn');
const email = document.querySelector('input#email');
const password = document.querySelector('input#password');

const getRecords = () => {
    fetch(baseUrl + 'register/records')
        .then(response => response.json())
        .then(data => {
            records = data;
        });
}
getRecords();

const emailErrorMessage = document.createElement('p');
emailErrorMessage.classList.add('invalid-feedback', 'm-0', 'd-block');

const passwordErrorMessage = document.createElement('p');
passwordErrorMessage.classList.add('invalid-feedback', 'm-0', 'd-block');
passwordErrorMessage.textContent = 'Password must be 6 characters long.';

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

nextBtn.addEventListener('click', function () {
    const user_type = document.querySelector('select#user_type').value;
    const validForm = validateForm('#needs-validation');

    if (validForm && user_type !== '' && emailIsValid && passwordIsValid) {
        let url = baseUrl + 'register/';

        if (user_type === 'EMPLOYEE') {
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
                usertypeInput.value = user_type;

                email.setAttribute('hidden', 'hidden');
                email.setAttribute('readonly', 'readonly');
                password.setAttribute('hidden', 'hidden');
                password.setAttribute('readonly', 'readonly');

                form.appendChild(usertypeInput);
                form.appendChild(email);
                form.appendChild(password);
                register();
            });
    }
});

const setNextBtn = () => {
    if (!emailIsValid || !passwordIsValid) {
        nextBtn.setAttribute('disabled', 'disabled');
    } else {
        nextBtn.removeAttribute('disabled');
    }
}

// For Register Form
const register = () => {
    document.querySelector('#register').addEventListener('click', function () {
        const validForm = validateForm('#needs-validation');
        const user_type = document.querySelector('input#user_type').value;

        if (validForm) {
            const form = document.querySelector('form');
            const formData = new FormData(form);

            fetch(baseUrl + 'register', {
                method: 'POST',
                body: formData
            })
                .then(response => response.json())
                .then(data => {
                    if (data) {
                        // Create the modal element
                        let modal = document.createElement('div');
                        modal.classList.add('modal', 'fade');
                        modal.setAttribute('tabindex', '-1');
                        modal.setAttribute('role', 'dialog');
                        modal.innerHTML = `
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Success</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p>${data.message}</p>
                                    </div>
                                </div>
                            </div>
                        `;

                        // Append the modal to the body
                        document.body.appendChild(modal);

                        // Show the modal
                        $(modal).modal('show');

                        modal.querySelector('.close').addEventListener('click', () => {
                            window.location.href = data.redirect;
                        });

                        // Set a timeout to redirect after 3 seconds
                        setTimeout(() => {
                            window.location.href = data.redirect;
                        }, 2000);
                    }
                });
        }
    });
}