const applyBtnFunction = () => {
    const applyBtn = document.querySelectorAll('.apply-button');

    applyBtn.forEach(btn => {
        applyBtnHover(btn, btn.textContent);

        // Click event listener for the apply button
        btn.addEventListener('click', function (event) {
            const job_id = btn.dataset.id;
            const url = baseUrl + 'applicant/apply';

            fetch(url, {
                method: 'POST',
                headers: {'Content-Type': 'application/json'},
                body: JSON.stringify({job_id: job_id})
            }).then(response => response.json())
                .then(data => {
                    if (data.status === 'success') {
                        btn.textContent = data.apply_status;

                        applyBtnHover(btn, data.apply_status);

                        if (data.apply_status === 'PENDING') {
                            success('Application sent successfully!', 'You will be notified once the employer accepts your application.');
                        } else {
                            success('Application cancelled!', 'You cancelled your application to this job.');
                        }
                    }
                })
                .catch(e => {
                    error('Error!', 'Something went wrong. Please try again later.');
                });
        });
    });
}

const acceptRejectBtnFunction = () => {
    const acceptBtn = document.querySelectorAll('.btn-accept');
    const rejectBtn = document.querySelectorAll('.btn-reject');

    if (acceptBtn) {
        acceptBtn.forEach(btn => {
            btn.addEventListener('click', function (event) {
                const application_id = btn.dataset.id;
                const url = baseUrl + 'applicant/accept';

                fetch(url, {
                    method: 'POST',
                    headers: {'Content-Type': 'application/json'},
                    body: JSON.stringify({application_id: application_id})
                }).then(response => response.json())
                    .then(data => {
                        if (data.status === 'success') {
                            btn.textContent = 'ACCEPTED';
                            btn.classList.remove('btn-info');
                            btn.classList.add('btn-outline-success');
                            btn.disabled = true;

                            const rejectBtn = document.querySelector(`.btn-reject[data-id="${application_id}"]`);
                            rejectBtn.disabled = true;

                            success('Application accepted!', 'You can now contact the applicant.');
                        }
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
                const application_id = btn.dataset.id;
                const url = baseUrl + 'applicant/reject';

                fetch(url, {
                    method: 'POST',
                    headers: {'Content-Type': 'application/json'},
                    body: JSON.stringify({application_id: application_id})
                }).then(response => response.json())
                    .then(data => {
                        if (data.status === 'success') {
                            btn.textContent = 'REJECTED';
                            btn.classList.remove('btn-secondary');
                            btn.classList.add('btn-outline-danger');
                            btn.disabled = true;

                            const acceptBtn = document.querySelector(`.btn-accept[data-id="${application_id}"]`);
                            acceptBtn.disabled = true;
                        }
                    })
                    .catch(e => {
                        error('Error!', 'Something went wrong. Please try again later.');
                    });
            });
        });
    }
}