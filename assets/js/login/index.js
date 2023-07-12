document.querySelector('button.next-btn').addEventListener('click', function () {
    const formDisplay = document.querySelector('.form-display');

    // Change the .form-display contents by fetching a view from the server and display it under .form-display
    fetch(base_url + 'login/getLoginForm')
        .then(response => {
            formDisplay.innerHTML = response;
        });
});