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

            if (input.value === '' && input.required) {
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
function formAction(url, request_type, data, callback = () => {}) {
    if (data instanceof FormData) {
        fetch(url, {
            method: request_type,
            body: data
        })
            .then(response => {
                const contentType = response.headers.get('Content-Type');

                if (contentType && contentType.includes('application/json')) {
                    return response.json();
                } else {
                    return response.text();
                }
            })
            .then(data => successFunc(data))
            .catch(data => errorFunc(data));
    } else if (typeof data === 'string') {
        fetch(url, {
            method: request_type,
            headers: {
                'Content-Type': 'text/plain'
            },
            body: data
        })
            .then(response => response.json())
            .then(data => successFunc(data))
            .catch(data => errorFunc(data));
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
            .then(data => successFunc(data))
            .catch(data => errorFunc(data));
    }

    const successFunc = (response) => {
        if (typeof response === 'string' || typeof response === 'object') {
            callback(response);
        } else {
            const data = JSON.parse(response);
            callback(data);
        }
    }

    const errorFunc = (response) => {
        try {
            if (typeof response === 'string') {
                error('ERROR', response, 3000);
            } else if (typeof response === 'object') {
                error('ERROR', response.message, 3000);
            } else {
                const data = JSON.parse(response);
                error('ERROR', data.message, 3000);
            }
        } catch (e) {
            error('ERROR', 'Something went wrong', 3000);
        }
    }
}

function info(title, message, delay) {
    createToast(title, message, delay, 'bg-info', 'fa fa-info');
}

function success(title, message, delay) {
    createToast(title, message, delay, 'bg-success', 'fa fa-check');
}

function error(title, message, delay) {
    createToast(title, message, delay, 'bg-danger', 'fa fa-times');
}

function createToast(title = '', message, delay = 5000, class_names, icon) {
    if (title === '') {
        $(document).Toasts('create', {
            body: message,
            position: 'bottomRight',
            class: 'm-2 p-2 ' + class_names,
            icon: icon,
            fixed: true,
            autohide: true,
            autoremove: true,
            delay: delay,
            fade: true
        });
    } else {
        $(document).Toasts('create', {
            title: title,
            body: message,
            position: 'bottomRight',
            class: 'm-2 p-2 ' + class_names,
            icon: icon,
            fixed: true,
            autohide: true,
            autoremove: true,
            delay: delay,
            fade: true
        });
    }
}

/**
 * @param {Element} region
 * @param {Element} province
 * @param {Element} city
 * @param {Element} barangay
 */
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
