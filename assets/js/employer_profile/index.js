const load_summary = () => {
    const id = new URLSearchParams(window.location.search).get('id');

    fetch(baseUrl + 'employer_profile/get_summary?id=' + id)
        .then(response => response.text())
        .then(data => {
            document.querySelector('#load_summary').innerHTML = data;
        });

}

document.addEventListener('DOMContentLoaded', () => {
    const status = document.querySelectorAll('span.status');

    status.forEach(value => {
        if (value.textContent === 'OPEN') {
            value.classList.add('badge-success');
            value.classList.remove('badge-danger');
        } else {
            value.classList.add('badge-danger');
            value.classList.remove('badge-success');
        }
    });

    // TinyMCE
    textareaEditor('#summary', 350, function (editor) {
        editor.on('input', function (event) {
            let count = editor.getContent({format: 'text'}).length;
            document.getElementById('summary_character_count').innerText = count + '/2000';

            if (count > 2000) {
                $('.summary-warning').removeAttr('hidden')
                $('#update_summary').attr('disabled', 'disabled');
            } else {
                $('.summary-warning').attr('hidden', 'hidden');
                $('#update_summary').removeAttr('disabled');
            }
        });
    });

    textareaEditor('#feedback', 400, function (editor) {
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
            const summary = tinymce.activeEditor.getContent();

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

    update_profile.addEventListener('click', function () {
        // Get all form control elements within the div that has .active.show class only
        const form = update_profile.closest('#form_content').querySelector('div.active.show > form');
        const isValid = validateForm(form);

        if (isValid) {
            formAction(baseUrl + 'employer_profile/service/Employer_profile_service/update', 'POST', new FormData(form), () => {
                success('SUCCESS', 'Profile successfully updated');
            });
        }
    });
});
