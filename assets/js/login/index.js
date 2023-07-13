const loadFormLogin = () => {
    document.querySelector('button#login').addEventListener('click', function () {
        const isValid = validateForm('#needs-validation');

        if (isValid) {
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
                    }
                    else if (data.status !== 'success') {
                        let errorContainer = document.createElement('div');
                        errorContainer.classList.add('alert', 'alert-danger');
                        errorContainer.setAttribute('role', 'alert');
                        errorContainer.innerHTML = data.message;

                        document.querySelector('form#needs-validation').prepend(errorContainer);
                    }
                });
        }
    });
}

document.querySelector('button.next-btn').addEventListener('click', function () {
    const formDisplay = document.querySelector('.form-display');
    const user_type = document.querySelector('select#user_type').value;

    fetch(baseUrl + 'login/getLoginForm')
        .then(response => response.text())
        .then(data => {
            formDisplay.innerHTML = data;

            let input = document.createElement('input');
            input.type = 'hidden';
            input.name = 'user_type';
            input.id = 'user_type';
            input.value = user_type;

            document.querySelector('form').appendChild(input);
            loadFormLogin();
        });
});

