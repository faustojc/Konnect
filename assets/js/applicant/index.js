const spinner = document.createElement('span');
spinner.classList.add('spinner-border', 'spinner-border-sm', 'mx-2');

const upload_resume_input = document.querySelector('.upload-resume');
if (upload_resume_input) {
    upload_resume_input.addEventListener('change', event => {
        const file = event.target.files[0];
        const url = baseUrl + 'employee_profile/service/employee_profile_service/uploadResume';

        const formData = new FormData();
        formData.append('resume', file);

        upload_resume_input.after(spinner);

        fetch(url, {
            method: 'POST',
            body: formData
        }).then(response => response.text())
            .then(() => {
                upload_resume_input.parentElement.removeChild(spinner);

                // Get the resume view
                fetch(baseUrl + 'resume/getResume')
                    .then(response => response.text())
                    .then(data => {
                        const resume_info = upload_resume_input.closest('.modal-body').querySelector('.resume-info');
                        resume_info.innerHTML = data;
                    })
                    .catch(e => console.log(e));
            })
            .catch(() => error('Error!', 'Something went wrong. Please try again later.'));
    });
}

const btnApplyFunc = () => {
    const btn_apply = document.querySelectorAll('.btn-apply');
    if (btn_apply) {
        btn_apply.forEach(btn => {
            btn.addEventListener('click', () => {
                const apply_modal = document.querySelector('#apply');
                const observer = new MutationObserver(mutations => {
                    mutations.forEach(mutation => {
                        if (mutation.type === 'attributes' && mutation.attributeName === 'class') {
                            if (apply_modal.classList.contains('show')) {
                                apply_modal.querySelector('input[name="job_id"]').value = btn.getAttribute('data-id');
                            }
                        }
                    });
                });

                observer.observe(apply_modal, {attributes: true, attributeFilter: ['class']})
            });
        });
    }
}

btnApplyFunc();

function applyBtnFunction() {
    const applyBtn = document.querySelector('.apply-button');

    if (applyBtn) {
        applyBtn.addEventListener('click', () => {
            applyBtn.appendChild(spinner);

            const job_id = applyBtn.closest('.modal-content').querySelector('input[name="job_id"]').value;
            const url = baseUrl + 'applicant/apply';

            const close = applyBtn.closest('.modal-content').querySelector('.close');

            fetch(url, {
                method: 'POST',
                headers: {'Content-Type': 'application/json'},
                body: JSON.stringify({job_id: job_id})
            }).then(response => response.text())
                .then(() => {
                    applyBtn.removeChild(spinner);

                    let status = applyBtn.textContent.replace(/\s+/g, '').toUpperCase();

                    if (status.includes('APPLY')) {
                        status = 'PENDING';
                        success('Application sent successfully!', 'You will be notified once the employer accepts your application.');
                    } else if (status.includes('CANCEL') || status.includes('PENDING')) {
                        status = 'APPLY';
                        success('Application cancelled!', 'You cancelled your application to this job.');
                    }

                    applyBtn.textContent = status;
                    const applyBtnModal = document.querySelector(`button[data-id="${job_id}"]`);
                    applyBtnModal.textContent = status;

                    const event = new Event('click', {
                        bubbles: true,
                        cancelable: true,
                    });

                    close.dispatchEvent(event);
                })
                .catch(e => {
                    console.log(e);
                    error('Error!', 'Something went wrong. Please try again later.');
                });
        });
    }
}

function acceptRejectBtnFunction() {
    const acceptBtn = document.querySelector('.btn-accept');
    const rejectBtn = document.querySelector('.btn-reject');

    if (acceptBtn) {
        acceptBtn.addEventListener('click', () => {
            const form = acceptBtn.closest('.modal-content').querySelector('form');
            const fromData = new FormData(form);

            acceptBtn.appendChild(spinner);

            formAction(baseUrl + 'applicant/accept', 'POST', fromData, () => {
                acceptBtn.removeChild(spinner);

                success('Application accepted!', 'You can now contact the applicant.');

                jobSelectedDisplayEvent(baseUrl + 'jobposting/get_own_selected_job');
            });
        });
    }

    if (rejectBtn) {
        rejectBtn.addEventListener('click', () => {
            const form = rejectBtn.closest('.modal-content').querySelector('form');
            const fromData = new FormData(form);

            rejectBtn.appendChild(spinner);

            formAction(baseUrl + 'applicant/accept', 'POST', fromData, () => {
                rejectBtn.removeChild(spinner);

                success('Application accepted!', 'You can now contact the applicant.');

                jobSelectedDisplayEvent(baseUrl + 'jobposting/get_own_selected_job');
            });
        });
    }
}
