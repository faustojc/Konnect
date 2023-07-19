async function postData(url, data = {}) {
    const response = await fetch(url, {
        method: 'POST',
        headers: {'Content-Type': 'application/json'},
        body: JSON.stringify(data)
    });

    return response.json();
}

/**
 * @param {any} target Target element to validate
 * @returns {boolean} Returns true if the form is valid, false otherwise
 */
function validateForm(target) {
    const form = (target instanceof HTMLFormElement) ? target : document.querySelector(target);
    let isValid = false;

    form.addEventListener('submit', function (event) {
        const inputs = form.querySelectorAll('input');
        let errors = 0;

        for (const input of inputs) {
            errors = (input.value === '' && input.required) ? errors + 1 : errors;

            if (input.value === '') {
                input.classList.add('is-invalid');
                input.classList.remove('is-valid');
            } else {
                input.classList.add('is-valid');
                input.classList.remove('is-invalid');
            }
        }

        isValid = errors === 0;

        event.preventDefault();
        event.stopPropagation();
    });

    form.dispatchEvent(new Event('submit'));

    return isValid;
}

/**
 * Makes the textarea element a TinyMCE editor
 * @param {string} selector Selects the textarea element based on element or id or class.
 * @param {number} height Set the height of the editor, this is optional.
 * @param {function} setupFunction An optional function for setting up the editor.s
 */
function textareaEditor(selector, height = 350, setupFunction = () => {
}) {
    tinymce.init({
        selector: selector,
        height: height,
        browser_spellcheck: true,
        setup: function (editor) {
            setupFunction(editor);
        },
        plugins: 'advlist anchor autolink charmap code codesample emoticons link lists searchreplace table visualblocks wordcount',
    });
}

/**
 * @param {string} url URL to send request
 * @param {string} request_type Type of form method (GET, POST, PUT, etc.)
 * @param {object} data Data to be sent
 * @param {function} callback An optional callback function that executes only if the request is successful
 */
function formAction(url, request_type, data, callback) {
    if (data instanceof FormData) {
        fetch(url, {
            method: request_type,
            body: data
        })
            .then(response => response.json())
            .then(response => successFunc(response))
            .catch(response => errorFunc(response));
    } else if (typeof data === 'string') {
        fetch(url, {
            method: request_type,
            headers: {
                'Content-Type': 'text/plain'
            },
            body: data
        })
            .then(response => response.json())
            .then(response => successFunc(response))
            .catch(response => errorFunc(response));
    } else {
        const params = new URLSearchParams(data);

        fetch(url, {
            method: request_type,
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: params
        })
            .then(response => response.json())
            .then(response => successFunc(response))
            .catch(response => errorFunc(response));
    }

    const successFunc = (response) => {
        try {
            const data = JSON.parse(response);
            callback(data);
        } catch (e) {
            console.log(response);
            callback();
        }
    }

    const errorFunc = (response) => {
        try {
            const data = JSON.parse(response);
            error('ERROR', data.message, 3000);
        } catch (e) {
            error('ERROR', 'Something went wrong', 3000);
        } finally {
            console.log(response);
        }
    }
}


function success(title, message, delay) {
    createToast(title, message, delay, 'bg-success', 'fa fa-check');
}

function error(title, message, delay) {
    createToast(title, message, delay, 'bg-danger', 'fa fa-times');
}

function createToast(title, message, delay = 4000, class_names, icon) {
    $(document).Toasts('create', {
        title: title,
        body: message,
        position: 'bottomRight',
        class: 'my-2 p-2 ' + class_names,
        icon: icon,
        fixed: true,
        autohide: true,
        autoremove: true,
        delay: delay,
        fade: true
    });
}
