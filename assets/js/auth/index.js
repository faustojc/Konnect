/**
 * This script will execute only if the user authenticates and is authorized to access the page
 */

async function pollNotifications() {
    const response = await fetch(baseUrl + 'notification/notify');
    const data = await response.json();

    if (data.length > 0) {
        for (const notification of data) {
            // Display notification
            info(notification.title, notification.message, 6000);
        }
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
            const message = tinymce.activeEditor.getContent();

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
        });
    }
}

const seeMoreButtons = document.querySelectorAll(".see-more");
if (seeMoreButtons) {
    seeMoreButtons.forEach(button => {
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
