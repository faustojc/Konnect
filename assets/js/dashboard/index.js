const applyBtnHover = (btn, status) => {
    const btnText = btn.textContent.replace(/\s+/g, '').toUpperCase();

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
        btn.removeEventListener('mouseover', () => {
        });
        btn.removeEventListener('mouseout', () => {
        });
        btn.textContent = status;
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

$(document).on('click', '#btn_post', function () {
    $(document).gmPostHandler({
        url: 'beu_dashboard/service/beu_dashboard_service/btn_post',
        selector: '.form-control',
        data: {
            employer_id: $('#employer_id').val(),
            title: $('#title').val(),
            description: $('#description').val(),
            start_date: $('#start_date').val(),
            filled: $('#filled').val(),
            salary: $('#salary').val(),
            shift: $('#shift').val(),
            job_type: $('#job_type').val()
        },
    });
});
// See more functionality in .job-description
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


