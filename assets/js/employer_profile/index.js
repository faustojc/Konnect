const load_summary = () => {
    const id = new URLSearchParams(window.location.search).get('id');

    fetch(baseUrl + 'employer_profile/get_summary?id=' + id)
        .then(response => response.text())
        .then(data => {
            document.querySelector('#load_summary').innerHTML = data;
        });

}

document.addEventListener('DOMContentLoaded', () => {
    const status = document.querySelectorAll('span.status');

    status.forEach(value => {
        if (value.textContent === 'OPEN') {
            value.classList.add('badge-success');
            value.classList.remove('badge-danger');
        } else {
            value.classList.add('badge-danger');
            value.classList.remove('badge-success');
        }
    });

    let address;
    let region;
    let province;
    let city;
    let barangay;

    const account_info = document.querySelector('#account-info');
    const observer = new MutationObserver(function (mutations) {
        // check if the account info class name contains .active.show
        if (account_info.classList.contains('active') && account_info.classList.contains('show')) {
            address = document.querySelector('#address');
            region = document.querySelector('#region');
            province = document.querySelector('#province');
            city = document.querySelector('#city');
            barangay = document.querySelector('#barangay');

            if (address && region && province && city && barangay) {
                locationDropdown(region, province, city, barangay);
            }
        }
    });

    observer.observe(account_info, {attributes: true});

    // TinyMCE
    textareaEditor('#summary', 350, function (editor) {
        editor.on('input', function (event) {
            let count = editor.getContent({format: 'text'}).length;
            const summary_warning = document.querySelector('.summary-warning');
            const update_summary = document.querySelector('#update_summary');

            document.getElementById('summary_character_count').innerText = count + '/2000';

            if (count > 2000) {
                summary_warning.removeAttribute('hidden');
                update_summary.setAttribute('disabled', 'disabled');
            } else {
                summary_warning.setAttribute('hidden', 'hidden');
                update_summary.removeAttribute('disabled');
            }
        });
    });

    const edit_summary = document.querySelector('.edit-summary');
    if (edit_summary) {
        edit_summary.addEventListener('click', function () {
            const content = document.querySelector('.summary-content').innerHTML;
            tinymce.get('summary').setContent(content);

            let count = tinymce.get('summary').getContent({format: 'text'}).length;
            document.getElementById('summary_character_count').innerText = count + '/2000';
        });
    }

    const update_summary = document.querySelector('#update_summary');
    if (update_summary) {
        update_summary.addEventListener('click', function () {
            const id = new URLSearchParams(window.location.search).get('id');
            const summary = tinymce.activeEditor.getContent();

            formAction(baseUrl + 'employer_profile/service/Employer_profile_service/update_summary', 'POST', {
                id: id,
                summary: summary
            }, function () {
                success('SUCCESS', 'Summary successfully updated');
                load_summary();
            });
        });
    }

    const update_profile = document.querySelector('#update_profile');

    if (update_profile) {
        update_profile.addEventListener('click', function () {
            const form = update_profile.closest('#form_content').querySelector('div.active.show > form');
            const formData = new FormData(form);
            const isValid = validateForm(form);

            if (formData.has('region') && formData.has('province') && formData.has('city') && formData.has('barangay')) {
                formData.set('address', address.value.trim());
                formData.set('region', region.options[region.selectedIndex].text.trim());
                formData.set('province', province.options[province.selectedIndex].text.trim());
                formData.set('city', city.options[city.selectedIndex].text.trim());
                formData.set('barangay', barangay.options[barangay.selectedIndex].text.trim());
            }

            if (isValid) {
                formAction(baseUrl + 'employer_profile/service/Employer_profile_service/update', 'POST', formData, () => {
                    success('SUCCESS', 'Profile successfully updated');
                });
            }
        });
    }

    const jobpost_tab = document.querySelector('#pills-jobpost-tab');
    if (jobpost_tab) {
        jobpost_tab.addEventListener('click', function () {
            const target = document.querySelector('.job-description');
            const observer = new ResizeObserver(() => seeMoreBtnFunction());

            observer.observe(target);
        });
    }
});

const search_employed_input = document.querySelector('#search_employed');
if (search_employed_input) {
    search_employed_input.addEventListener('input', () => {
        let filter = search_employed_input.value.toUpperCase();
        const table_rows = document.querySelector('#employed_table').querySelectorAll('tbody tr');

        table_rows.forEach(table_row => {
            const cells = table_row.querySelectorAll('td');
            let textValue = '';

            cells.forEach(cell => {
                textValue += cell.textContent || cell.innerHTML;
            });

            textValue = textValue.trim().toUpperCase();

            if (textValue.indexOf(filter) > -1) {
                table_row.style.display = "";
            } else {
                table_row.style.display = "none";
            }
        })
    });
}
