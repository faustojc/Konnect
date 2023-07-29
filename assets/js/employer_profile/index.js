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

    if (update_profile) {
        update_profile.addEventListener('click', function () {
            const form = update_profile.closest('#form_content').querySelector('div.active.show > form');
            const isValid = validateForm(form);

            if (isValid) {
                formAction(baseUrl + 'employer_profile/service/Employer_profile_service/update', 'POST', new FormData(form), () => {
                    success('SUCCESS', 'Profile successfully updated');
                });
            }
        });
    }

    const jobpost_tab = document.querySelector('#pills-jobpost-tab');
    if (jobpost_tab) {
        jobpost_tab.addEventListener('click', function () {
            const target = document.querySelector('.job-description');
            const observer = new ResizeObserver(() => seeMoreBtnFunction());

            observer.observe(target);
        });
    }
});

document.getElementById("skills_req").addEventListener("keydown", function (event) {
    if (event.key === "Enter") {
        event.preventDefault();
        const input = event.target;
        const currentCursorPosition = input.selectionStart;
        const inputValue = input.value;
        input.value = inputValue.slice(0, currentCursorPosition) +
            ", " +
            inputValue.slice(currentCursorPosition);
        input.selectionStart = input.selectionEnd = currentCursorPosition + 2;
    }
});
