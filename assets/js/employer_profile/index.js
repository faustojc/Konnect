const load_summary = () => {
    const id = new URLSearchParams(window.location.search).get('id');

    fetch(baseUrl + 'employer_profile/get_summary?id=' + id)
        .then(response => response.text())
        .then(data => {
            document.querySelector('#load_summary').innerHTML = data;

            tinymce.remove('#summary');
            textareaEditor('#summary', 350);
        });
}

const loadApplicants = () => {
    fetch(baseUrl + 'employer_profile/getApplicants')
        .then(response => response.text())
        .then(data => {
            const applicant_view = document.querySelector('#pills-applicants');
            applicant_view.innerHTML = data;

            viewDetailsFunc();
            editDetailsFunc();
            updateStatusFunc();
        })
        .catch(() => error('ERROR', 'Something went wrong!'))
}

// Function calls
seeMoreBtnFunction();

document.addEventListener('DOMContentLoaded', () => {
    setJobStatus();
    setJobDescription();
    setJobBtn();

    let address;
    let region;
    let province;
    let city;
    let barangay;

    const account_info = document.querySelector('#account-info');
    if (account_info) {
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
    }

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

    textareaEditor('#description', 500);

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
            const summary = tinymce.get('summary').getContent();

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

const post_job = document.querySelector('#post_job');
if (post_job) {
    post_job.addEventListener('click', function () {
        const form = post_job.closest('.modal-content').querySelector('form');
        const description = tinymce.activeEditor.getContent();
        const formData = new FormData(form);

        formData.set('description', description);

        const isValid = validateForm(form);
        if (isValid) {
            const spinner = document.createElement('span');
            spinner.classList.add('spinner-border', 'spinner-border-sm', 'mx-2');
            post_job.append(spinner);

            info('Processing', 'Please wait...', 3000);

            formAction(baseUrl + 'jobposting/service/Jobposting_service/postJob', 'POST', formData, (data) => {
                post_job.querySelector('span.spinner-border').remove();
                success('SUCCESS', 'Job successfully posted');

                if (typeof data === 'string') {
                    const jobPostSection = document.querySelector('#jobpost_view_section');
                    jobPostSection.insertAdjacentHTML('afterbegin', data);

                    setJobStatus();
                }
            });
        }
    });
}

// ------------------------------ SEARCH EMPLOYED ------------------------------

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

// ------------------------------ SEARCH APPLICANTS ------------------------------

const search_applicant_input = document.querySelector('#search_applicant');
if (search_applicant_input) {
    search_applicant_input.addEventListener('input', () => {
        let filter = search_applicant_input.value.toUpperCase();
        const rows = document.querySelector('#applicants_table').querySelectorAll('tbody tr');

        rows.forEach(row => {
            const cells = row.querySelectorAll('td');
            let textValue = '';

            cells.forEach(cell => {
                textValue += cell.textContent || cell.innerHTML;
            });

            textValue = textValue.trim().toUpperCase();

            if (textValue.indexOf(filter) > -1) {
                row.style.display = "";
            } else {
                row.style.display = "none";
            }
        })
    });
}

// ------------------------------ SET ACTIVE AND VERIFIED FOR EMPLOYEES ------------------------------

const check_active = document.querySelectorAll('.check-active');
if (check_active) {
    check_active.forEach(check => {
        check.addEventListener('click', function () {

            const data = {
                id: this.getAttribute('data-id'),
                is_active: this.checked ? 1 : 0
            }

            formAction(baseUrl + 'employer_profile/service/Employer_profile_service/setActive', 'POST', data, function (response) {
                success('SUCCESS', response.message);
            });
        });
    });
}

const check_verified = document.querySelectorAll('.check-verified');
if (check_verified) {
    check_verified.forEach(check => {
        check.addEventListener('click', function () {

            const data = {
                id: this.getAttribute('data-id'),
                is_verified: this.checked ? 1 : 0
            }

            formAction(baseUrl + 'employer_profile/service/Employer_profile_service/setVerified', 'POST', data, function (response) {
                success('SUCCESS', response.message);
            });
        });
    });
}

// ------------------------------ TRANSFER DATA TO MODAL ------------------------------
const viewDetailsFunc = () => {
    const view_details = document.querySelectorAll('.btn-view-applicant');
    if (view_details) {
        view_details.forEach(view => {
            view.addEventListener('click', () => {
                const view_applicant = document.querySelector('#view_details');

                const observer = new MutationObserver(() => {
                    if (view_applicant.classList.contains('show')) {
                        const id = view.getAttribute('data-id');
                        const job_id = view.getAttribute('data-job-id');

                        formAction(baseUrl + 'applicant/getApplicant', 'POST', {id: id, job_id: job_id}, (data) => {
                            view_applicant.querySelector('img').setAttribute('src', baseUrl + 'assets/images/employee/profile_pic/' + data.employeeImage);
                            view_applicant.querySelector('#employee_name').innerHTML = data.employeeName;
                            view_applicant.querySelector('#employee_title').innerHTML = data.employeeTitle;
                            view_applicant.querySelector('#employee_address').innerHTML = data.employeeAddress;

                            view_applicant.querySelector('#employee_email').innerHTML = data.email;
                            view_applicant.querySelector('#employee_city').innerHTML = data.employeeCity;

                            // resume html
                            const resume_info = view_applicant.querySelector('.resume-info');

                            // Get the resume view
                            fetch(baseUrl + 'resume/getResume?id=' + data.employee_id)
                                .then(response => response.text())
                                .then(data => resume_info.innerHTML = data)
                                .catch(e => console.log(e));
                        });

                        observer.disconnect();
                    }
                });

                observer.observe(view_applicant, {attributes: true, attributeFilter: ['class']})
            });
        });
    }
}

const editDetailsFunc = () => {
    const btn_edit_applicant = document.querySelectorAll('.btn-edit-applicant');
    if (btn_edit_applicant) {
        btn_edit_applicant.forEach(btn => {
            btn.addEventListener('click', () => {
                const edit_status_modal = document.querySelector('#edit_status');

                const observer = new MutationObserver(() => {
                    if (edit_status_modal.classList.contains('show')) {
                        const id = btn.getAttribute('data-id');
                        const job_id = btn.getAttribute('data-job-id');

                        formAction(baseUrl + 'applicant/getApplicant', 'POST', {id: id, job_id: job_id}, (data) => {
                            edit_status_modal.querySelector('input[name="id"]').value = data.id;
                            edit_status_modal.querySelector('input[name="job_id"]').value = data.job_id;
                            edit_status_modal.querySelector('input[name="employee_id"]').value = data.employee_id;
                            edit_status_modal.querySelector('input[id="name"]').value = data.employeeName;

                            const select = edit_status_modal.querySelector('select[name="status"]');
                            select.value = data.status;

                            const options = select.querySelectorAll('option');
                            options.forEach(option => {
                                if (option.value.toUpperCase().includes(data.status)) {
                                    option.setAttribute('selected', 'selected');
                                } else {
                                    option.removeAttribute('selected');
                                }
                            });
                        });

                        observer.disconnect();
                    }
                });

                observer.observe(edit_status_modal, {attributes: true, attributeFilter: ['class']})
            });
        });
    }
}

viewDetailsFunc();
editDetailsFunc();

// ------------------------------ UPDATE Applicant Status ------------------------------

const updateStatusFunc = () => {
    const update_applicant_status = document.querySelector('.update-status');
    if (update_applicant_status) {
        const spinner = document.createElement('span');
        spinner.classList.add('spinner-border', 'spinner-border-sm', 'mx-2');

        update_applicant_status.addEventListener('click', () => {
            const form = update_applicant_status.closest('.modal-content').querySelector('form');
            const formData = new FormData(form);

            update_applicant_status.append(spinner);

            formAction(baseUrl + 'applicant/setStatus', 'POST', formData, () => {
                update_applicant_status.querySelector('span.spinner-border').remove();

                const close = update_applicant_status.closest('.modal-content').querySelector('.close');
                const event = new Event('click', {
                    bubbles: true,
                    cancelable: true,
                });

                close.dispatchEvent(event);

                success('SUCCESS', 'Status successfully updated');
                loadApplicants();
            });
        });
    }
}

updateStatusFunc();