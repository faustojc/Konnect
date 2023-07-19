const applyBtnFunction = () => {
    const applyBtn = document.querySelectorAll('.apply-button');

    applyBtn.forEach(btn => {
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

                        if (data.apply_status === 'PENDING') {
                            btn.addEventListener('mouseover', function () {
                                btn.textContent = 'Cancel';
                                btn.classList.add('btn-outline-danger');
                            });
                            btn.addEventListener('mouseout', function () {
                                btn.textContent = data.apply_status;
                                btn.classList.remove('btn-outline-danger');
                            });
                        } else {
                            btn.removeEventListener('mouseover', () => {
                            });
                            btn.removeEventListener('mouseout', () => {
                            });
                            btn.textContent = data.apply_status;
                        }

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

document.addEventListener("DOMContentLoaded", function () {
    textareaEditor('textarea', 400);

    const jobStatus = document.querySelectorAll('.job-status');
    jobStatus.forEach(value => {
        const status = value.textContent.replace(/\s+/g, '').toUpperCase();

        if (status === 'OPEN') {
            value.classList.add('badge-success');
            value.classList.remove('badge-danger');
        } else {
            value.classList.add('badge-danger');
            value.classList.remove('badge-success');
        }

        value.textContent = status;
    });


    // See more functionality in .job-description
    const seeMoreButtons = document.querySelectorAll(".see-more");

    // Hide the buttons if the div height is less than or equal to 450px
    seeMoreButtons.forEach(button => {
        const target = button.dataset.target;
        const jobDescription = button.previousElementSibling;
        const maxHeight = parseInt(jobDescription.style.maxHeight);

        if (jobDescription.matches(target) && jobDescription.offsetHeight < maxHeight) {
            button.style.display = "none";
        } else if (jobDescription.offsetHeight >= maxHeight) {
            button.style.display = "block";
        }
    });

    // Add an event listener to each button
    seeMoreButtons.forEach(button => {
        button.addEventListener("click", function (event) {
            const button = event.target;
            const target = button.dataset.target;
            const jobDescription = button.previousElementSibling;

            if (jobDescription.matches(target)) {
                if (button.textContent === "See more") {
                    button.textContent = "See less";
                    jobDescription.style.maxHeight = "none";
                    jobDescription.style.overflowY = "visible";
                } else {
                    button.textContent = "See more";
                    jobDescription.style.maxHeight = "450px";
                    jobDescription.style.overflowY = "hidden";
                }
            }
        });
    });

    applyBtnFunction();
});
