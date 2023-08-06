const spinner = document.createElement('span');
spinner.classList.add('spinner-border', 'spinner-border-sm', 'mx-2');

const upload_resume_input = document.querySelectorAll('.upload-resume');
if (upload_resume_input) {
    upload_resume_input.forEach(input => {
        input.addEventListener('change', event => {
            const file = event.target.files[0];
            const url = baseUrl + 'employee_profile/service/employee_profile_service/uploadResume';

            const formData = new FormData();
            formData.append('resume', file);

            input.after(spinner);

            fetch(url, {
                method: 'POST',
                body: formData
            }).then(response => response.text())
                .then(() => {
                    input.parentElement.removeChild(spinner);

                    // Get the resume view
                    fetch(baseUrl + 'resume/getResume')
                        .then(response => response.text())
                        .then(data => {
                            const resume_info = input.closest('.modal-body').querySelector('.resume-info');
                            resume_info.innerHTML = data;
                        })
                        .catch(e => console.log(e));
                })
                .catch(() => error('Error!', 'Something went wrong. Please try again later.'));
        });
    });
}

const btn_apply = document.querySelectorAll('.btn-apply');
if (btn_apply) {
    btn_apply.forEach(btn => {

    });
}

function applyBtnFunction() {
    const applyBtn = document.querySelectorAll('.apply-button');

    if (applyBtn) {
        applyBtn.forEach(btn => {
            btn.addEventListener('click', function () {
                btn.appendChild(spinner);

                const job_id = btn.dataset.id;
                const url = baseUrl + 'applicant/apply';

                fetch(url, {
                    method: 'POST',
                    headers: {'Content-Type': 'application/json'},
                    body: JSON.stringify({job_id: job_id})
                }).then(response => response.text())
                    .then(() => {
                        btn.removeChild(spinner);

                        let status = btn.textContent.replace(/\s+/g, '').toUpperCase();

                        if (status.includes('APPLY')) {
                            status = 'PENDING';
                            success('Application sent successfully!', 'You will be notified once the employer accepts your application.');
                        } else if (status.includes('CANCEL') || status.includes('PENDING')) {
                            status = 'APPLY';
                            success('Application cancelled!', 'You cancelled your application to this job.');
                        }

                        btn.textContent = status;

                        const applyBtn = document.querySelector(`button[data-target="#apply${job_id}"]`);
                        applyBtn.textContent = status;
                    })
                    .catch(e => {
                        console.log(e);
                        error('Error!', 'Something went wrong. Please try again later.');
                    });
            });
        });
    }
}

function acceptRejectBtnFunction() {
    const acceptBtn = document.querySelectorAll('.btn-accept');
    const rejectBtn = document.querySelectorAll('.btn-reject');

    if (acceptBtn) {
        acceptBtn.forEach(btn => {
            btn.addEventListener('click', function (event) {
                const application_id = btn.getAttribute('data-id');
                const job_id = btn.getAttribute('data-job-id');
                const url = baseUrl + 'applicant/accept';

                btn.appendChild(spinner);

                fetch(url, {
                    method: 'POST',
                    headers: {'Content-Type': 'application/json'},
                    body: JSON.stringify({application_id: application_id, job_id: job_id})
                }).then(response => response.text())
                    .then(data => {
                        btn.textContent = 'ACCEPTED';
                        btn.classList.remove('btn-info');
                        btn.classList.add('btn-outline-success');
                        btn.disabled = true;

                        const rejectBtn = document.querySelector(`.btn-reject[data-id="${application_id}"]`);
                        rejectBtn.disabled = true;

                        success('Application accepted!', 'You can now contact the applicant.');
                    })
                    .catch(e => {
                        error('Error!', 'Something went wrong. Please try again later.');
                    });
            });
        });
    }

    if (rejectBtn) {
        rejectBtn.forEach(btn => {
            btn.addEventListener('click', function (event) {
                const application_id = btn.getAttribute('data-id');
                const job_id = btn.getAttribute('data-job-id');
                const url = baseUrl + 'applicant/reject';

                btn.appendChild(spinner);

                fetch(url, {
                    method: 'POST',
                    headers: {'Content-Type': 'application/json'},
                    body: JSON.stringify({application_id: application_id, job_id: job_id})
                }).then(response => response.text())
                    .then(data => {
                        btn.textContent = 'REJECTED';
                        btn.classList.remove('btn-secondary');
                        btn.classList.add('btn-outline-danger');
                        btn.disabled = true;

                        const acceptBtn = document.querySelector(`.btn-accept[data-id="${application_id}"]`);
                        acceptBtn.disabled = true;

                        success('Application rejected!', 'The applicant will be notified.');
                    })
                    .catch(e => {
                        error('Error!', 'Something went wrong. Please try again later.');
                    });
            });
        });
    }
}
