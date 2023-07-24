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
    let notificationDelay = 0;

    eventSource.addEventListener('notification', (event) => {
        const data = JSON.parse(event.data);

        // Display notification with a delay
        setTimeout(() => {
            info(data.title, data.message, 6000);
        }, notificationDelay);

        // Increase the delay for the next notification
        notificationDelay += 500;
    });


    // Display all notifications
    const notifications = document.querySelector('#notifications');
    if (notifications) {
        fetch(baseUrl + 'notification/displayNotifications')
            .then(response => response.text())
            .then(data => {
                notifications.innerHTML = data;
            });
    }

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
