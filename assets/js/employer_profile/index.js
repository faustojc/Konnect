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
});

// For jobpost details
function formatInput() {
    const input = document.getElementById("salary");
    const value = input.value;

    // Check if the input value is not empty
    if (value !== "") {
        // Add ".00" at the end if it's not already present
        if (!value.endsWith(".00")) {
            input.value = value + ".00";
        }
    }
}

function formatInput2() {
    const input = document.getElementById("salary");
    let value = input.value;

    // Remove existing commas from the value
    value = value.replace(/,/g, '');

    // Format the value with commas for every thousand
    value = value.replace(/\B(?=(\d{3})+(?!\d))/g, ",");

    // Update the input value with the formatted value
    input.value = value;
}

function disableDotZero() {
    const input = document.getElementById("salary");
    const value = input.value;

    // Check if the input value ends with ".00"
    if (!value.endsWith(".00")) {
        // Set the selection range to exclude ".00"
        input.setSelectionRange(0, value.length - 3);
    }
}

document.getElementById("skills_req").addEventListener("keydown", function (event) {
    if (event.key === "Enter") {
        event.preventDefault();
        const input = event.target;
        const currentCursorPosition = input.selectionStart;
        const inputValue = input.value;
        const newValue =
            inputValue.slice(0, currentCursorPosition) +
            ", " +
            inputValue.slice(currentCursorPosition);

        input.value = newValue;
        input.selectionStart = input.selectionEnd = currentCursorPosition + 2;
    }
});
