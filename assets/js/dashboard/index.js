document.addEventListener("DOMContentLoaded", function () {
    textareaEditor('textarea', 400);

    const jobStatus = document.querySelectorAll('.job-status');
    jobStatus.forEach(value => {
        if (value.textContent === 'OPEN') {
            value.classList.add('badge-success');
            value.classList.remove('badge-danger');
        } else {
            value.classList.add('badge-danger');
            value.classList.remove('badge-success');
        }
    });

    // See more functionality in .job-description
    const seeMoreButtons = document.querySelectorAll(".see-more");

    // Hide the buttons if the div height is less than or equal to 450px
    seeMoreButtons.forEach(button => {
        const target = button.dataset.target;
        const jobDescription = button.previousElementSibling;

        if (jobDescription.matches(target) && jobDescription.offsetHeight < 450) {
            button.style.display = "none";
        } else if (jobDescription.offsetHeight >= 450) {
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
});