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
                .catch(error => {
                    error('Error!', 'Something went wrong. Please try again later.');
                });
        });
    });
}