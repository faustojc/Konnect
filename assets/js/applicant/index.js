function applyBtnFunction() {
    const applyBtn = document.querySelectorAll('.apply-button');

    if (applyBtn) {
        applyBtn.forEach(btn => {
            applyBtnHover(btn, btn.textContent);

            btn.addEventListener('click', function () {
                const job_id = btn.dataset.id;
                const url = baseUrl + 'applicant/apply';

                fetch(url, {
                    method: 'POST',
                    headers: {'Content-Type': 'application/json'},
                    body: JSON.stringify({job_id: job_id})
                }).then(response => response.text())
                    .then(data => {
                        let status = btn.textContent.replace(/\s+/g, '').toUpperCase();

                        if (status.includes('APPLY')) {
                            status = 'PENDING';
                            success('Application sent successfully!', 'You will be notified once the employer accepts your application.');
                        } else if (status.includes('CANCEL') || status.includes('PENDING')) {
                            status = 'APPLY';
                            success('Application cancelled!', 'You cancelled your application to this job.');
                        }

                        btn.textContent = status;
                        applyBtnHover(btn, status);
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
                    })
                    .catch(e => {
                        error('Error!', 'Something went wrong. Please try again later.');
                    });
            });
        });
    }
}

const applyBtnHover = (btn, status) => {
    if (status.includes('PENDING')) {
        btn.addEventListener('mouseover', function () {
            btn.textContent = 'Cancel';
            btn.classList.add('btn-outline-danger');
        });
        btn.addEventListener('mouseout', function () {
            btn.textContent = status;
            btn.classList.remove('btn-outline-danger');
        });
    } else {
        btn.removeEventListener('mouseover', () => {});
        btn.removeEventListener('mouseout', () => {});
        btn.textContent = status;
    }
}
