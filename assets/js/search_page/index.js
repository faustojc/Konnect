document.addEventListener("DOMContentLoaded", function () {
    textareaEditor('textarea', 400);

    const jobStatus = document.querySelectorAll('.job-status');
    jobStatus.forEach(value => {
        const status = value.textContent.replace(/\s+/g, '').toUpperCase();

        if (status === 'OPEN') {
            value.classList.add('text-success');
            value.classList.remove('text-danger');
        } else {
            value.classList.add('text-danger');
            value.classList.remove('text-success');
        }

        value.textContent = status;
    });

    applyBtnFunction();
});
