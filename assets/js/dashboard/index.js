document.addEventListener("DOMContentLoaded", function () {
    textareaEditor('textarea', 400);
    setJobStatus();
    applyBtnFunction();

    const postJobBtn = document.querySelector('#btn_post');
    if (postJobBtn) {
        postJobBtn.addEventListener('click', () => {
            const form = postJobBtn.closest('.modal-content').querySelector('form');
            const description = tinymce.activeEditor.getContent();
            const isValid = validateForm(form);

            const formData = new FormData(form);
            formData.set('description', description);

            if (isValid && description !== '') {
                const spinner = document.createElement('span');

                spinner.classList.add('spinner-border', 'spinner-border-sm', 'mx-2');
                postJobBtn.append(spinner);

                formAction(baseUrl + 'jobposting/service/Jobposting_service/postJob', 'POST', formData, (data) => {
                    success('SUCCESS!', 'Job posted successfully!');
                    postJobBtn.querySelector('span.spinner-border').remove();

                    if (typeof data === 'string') {
                        const jobPostSection = document.querySelector('#jobpost_section');
                        jobPostSection.insertAdjacentElement('afterbegin', data);
                    }
                });
            }
        });
    }
});

seeMoreBtnFunction();

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
        input.value = inputValue.slice(0, currentCursorPosition) +
            ", " +
            inputValue.slice(currentCursorPosition);
        input.selectionStart = input.selectionEnd = currentCursorPosition + 2;
    }
});
