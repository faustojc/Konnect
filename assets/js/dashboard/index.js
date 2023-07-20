const applyBtnHover = (btn, status, doApply = true) => {
    const btnText = btn.textContent.replace(/\s+/g, '').toUpperCase();

    if (doApply) {
        if (status === 'PENDING') {
            btn.addEventListener('mouseover', function () {
                btn.textContent = 'Cancel';
                btn.classList.add('btn-outline-danger');
            });
            btn.addEventListener('mouseout', function () {
                btn.textContent = status;
                btn.classList.remove('btn-outline-danger');
            });
        } else {
            btn.removeEventListener('mouseover', () => {});
            btn.removeEventListener('mouseout', () => {});
            btn.textContent = status;
        }
    }
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

    applyBtnFunction();
});

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
}

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
