/**
 * This script will execute only if the user authenticates and is authorized to access the page
 */

const load_feedbacks = () => {
    const id = new URLSearchParams(window.location.search).get('id');
    const feedbacks = document.querySelector('#load_feedbacks');

    fetch(baseUrl + 'feedback/getFeedbacks?id=' + id)
        .then(response => response.text())
        .then(data => {
            feedbacks.innerHTML = data;

            tinymce.remove('#message');
            textareaEditor('#message', 400);
        })
        .catch(() => error('ERROR', 'Something went wrong. Please try again later'));
}

// ------------------------------ Employer's Job Function Section ------------------------------

const load_jobs = () => {
    fetch(baseUrl + 'jobposting/loadJobposts')
        .then(response => response.text())
        .then(data => {
            const jobpost_section = document.querySelector('#jobpost_section');
            jobpost_section.innerHTML = data;

            tinymce.remove('textarea');
            textareaEditor('textarea', 400);
            setJobDescription();
            setJobBtn();
            seeMoreBtnFunction();
            setJobStatus();
        });
}

const setJobDescription = () => {
    const edit_job_btn = document.querySelectorAll('.edit-job-btn');
    if (edit_job_btn) {
        edit_job_btn.forEach((btn) => {
            btn.addEventListener('click', () => {
                const content = document.querySelector('.job-description' + btn.getAttribute('data-id')).innerHTML;
                tinymce.get('description' + btn.getAttribute('data-id')).setContent(content);
            });
        });
    }
}

const setJobBtn = () => {
    const update_job = document.querySelectorAll('.btn-update-job');
    if (update_job) {
        update_job.forEach((btn) => {
            btn.addEventListener('click', () => {
                const form = btn.closest('.modal-content').querySelector('form');
                const id = form.querySelector('#id').value;
                const description = tinymce.get('description' + id).getContent();

                const formData = new FormData(form);
                formData.set('description', description);

                const is_valid = validateForm(form);
                if (is_valid) {
                    const spinner = document.createElement('span');
                    spinner.classList.add('spinner-border', 'spinner-border-sm', 'mx-2');
                    btn.append(spinner);

                    formAction(baseUrl + 'jobposting/service/Jobposting_service/update', 'POST', formData, () => {
                        success('SUCCESS!', 'Job updated successfully!');
                        btn.querySelector('span.spinner-border').remove();

                        const modal_close = document.querySelector('#modal' + id).querySelector('.close');
                        const click_event = new MouseEvent('click', {
                            view: window,
                            bubbles: true,
                            cancelable: true
                        });

                        modal_close.dispatchEvent(click_event);

                        load_jobs();
                    });
                }
            });
        });
    }

    const delete_job = document.querySelectorAll('.delete-job-btn');
    if (delete_job) {
        delete_job.forEach((btn) => {
            btn.addEventListener('click', () => {
                const id = btn.getAttribute('data-id');

                if (confirm('Are you sure you want to delete this job?')) {
                    info('Please wait...', 'Deleting job...');

                    formAction(baseUrl + 'jobposting/service/Jobposting_service/delete', 'POST', {id: id}, () => {
                        success('SUCCESS!', 'Job deleted successfully!');
                        load_jobs();
                    });
                }
            });
        });
    }
}

document.addEventListener('DOMContentLoaded', function () {
    const eventSource = new EventSource(baseUrl + 'notification/notify');

    eventSource.addEventListener('notification', (event) => {
        const data = JSON.parse(event.data);

        // Display notification with a delay
        setTimeout(() => {
            info(data.title, data.message, 6000);
        }, 5000);

    });

    const feedbackBtn = document.querySelector('#btn_feedback');
    if (feedbackBtn) {
        feedbackBtn.addEventListener('click', () => {
            const form = feedbackBtn.closest('.modal-content').querySelector('form');
            const message = tinymce.get('message').getContent();

            const feedbackWarning = document.querySelector('#feedback_warning');
            const user_id = form.querySelector('#user_id').value;

            // if the message is empty cancel the submission
            const length = tinymce.activeEditor.getContent({format: 'text'}).length;
            if (length === 0) {
                feedbackWarning.textContent = 'Please enter a message';
                feedbackWarning.removeAttribute('hidden');
                return;
            } else {
                feedbackWarning.setAttribute('hidden', 'hidden');
            }

            const data = {
                user_id: user_id,
                rating: form.querySelector('input[name="rating"]').value,
                message: message
            }

            formAction(baseUrl + 'feedback/submitFeedback', 'POST', data, function (data) {
                load_feedbacks();
                success('SUCCESS', 'Feedback submitted successfully');
            });
        });
    }

    textareaEditor('#message', 400, function (editor) {
        editor.on('input', function () {
            let count = editor.getContent({format: 'text'}).length;
            document.getElementById('feedback_char_count').innerText = count + '/2000';

            const feedbackBtn = document.querySelector('#btn_feedback');
            const feedbackWarning = document.querySelector('#feedback_warning');

            if (count > 2000) {
                feedbackWarning.removeAttribute('hidden');
                feedbackBtn.setAttribute('disabled', 'disabled');
            } else {
                feedbackWarning.setAttribute('hidden', 'hidden');
                feedbackBtn.removeAttribute('disabled');
            }
        });
    });
});

function setJobStatus() {
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
}

function seeMoreBtnFunction() {
    const seeMoreButtons = document.querySelectorAll(".see-more");
    if (seeMoreButtons) {
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

            button.addEventListener("click", function (event) {
                const button = event.target;
                const target = button.dataset.target;
                const jobDescription = button.previousElementSibling;

                if (jobDescription.matches(target)) {
                    if (button.textContent.toLowerCase().includes("see more")) {
                        button.textContent = "See less";
                        jobDescription.style.maxHeight = "none";
                        jobDescription.style.overflowY = "visible";
                    } else {
                        button.textContent = "See more";
                        jobDescription.style.maxHeight = '200px';
                        jobDescription.style.overflowY = "hidden";
                    }
                }
            });
        });
    }
}

const skills_required_input = document.getElementById("skills_req");
if (skills_required_input) {
    skills_required_input.addEventListener("keydown", function (event) {
        if (event.key === "Enter") {
            event.preventDefault();
            const input = event.target;
            const currentCursorPosition = input.selectionStart;
            const inputValue = input.value;

            input.value = inputValue.slice(0, currentCursorPosition) + ", " + inputValue.slice(currentCursorPosition);
            input.selectionStart = input.selectionEnd = currentCursorPosition + 2;
        }
    });
}

const resend_verify = document.querySelector('#resend_verify');
if (resend_verify) {
    const spinner = document.createElement('span');
    spinner.classList.add('spinner-border', 'spinner-border-sm', 'mx-2');

    resend_verify.addEventListener('click', () => {
        resend_verify.appendChild(spinner);

        fetch(baseUrl + 'verify/resend',)
            .then(response => response.json())
            .then(data => {
                success('SUCCESS', data.message, 6000);
            })
            .catch(() => {
                error('ERROR', 'Something went wrong. Please try again later');
            })
            .finally(() => {
                resend_verify.removeChild(spinner);
            });
    });
}
