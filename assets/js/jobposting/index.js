// Load all employers
const load_jobpostings = () => {
    $('#job_list').load(baseUrl + '/jobposting/get_jobpostings', function () {
        status_badge();
    });
}

const status_badge = () => {
    const status = document.querySelectorAll('.job-status');

    status.forEach(function (status) {
        // Change status color
        if (status.textContent.includes('OPEN')) {
            status.classList.remove('badge-danger');
            status.classList.add('badge-success');
        } else if (status.textContent.includes('CLOSE')) {
            status.classList.remove('badge-success');
            status.classList.add('badge-danger');
        }
    });
}

document.addEventListener('DOMContentLoaded', function () {
    status_badge();

    // TinyMCE
    textareaEditor('textarea');

    // Get selected job
    const joblink = document.querySelectorAll('.job-link');

    joblink.forEach(job => {
        job.addEventListener('click', function () {
            const id = this.dataset.id;
            const param = new URLSearchParams({id: id});

            fetch(baseUrl + 'jobposting/get_selected_job', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                },
                body: param
            }).then(response => response.text())
                .then(data => {
                    document.querySelector('#job-details').innerHTML = data;
                    status_badge();
                });
        });
    });
});


$(document).on('input', '#search_jobpost', function () {
    $('#job_list').load('jobposting/service/Jobposting_service/search_jobs', {search_text: $('#search_jobpost').val()}, function () {
        const status = document.querySelectorAll('.job-status');

        status.forEach(function (status) {
            // Change status color
            if (status.textContent.includes('OPEN')) {
                status.classList.remove('badge-danger');
                status.classList.add('badge-success');
            } else if (status.textContent.includes('CLOSE')) {
                status.classList.remove('badge-success');
                status.classList.add('badge-danger');
            }
        });
    });
});

// Save job
$(document).on('click', '#save_job', function () {
    const valid = validateForm('#needs-validation');

    if (valid) {
        const employer_id = new URLSearchParams(window.location.search).get('id');
        const description = tinymce.activeEditor.getContent();

        formAction(baseUrl + 'jobposting/service/Jobposting_service/save', 'POST', {
            employer_id: employer_id,
            title: $('#job_title').val(),
            description: description,
            filled: $('#job_filled').val()
        }, function () {
            success('SUCCESS', 'Job successfully added');
        });
    }
});

// Update job details
$(document).on('click', '#update_job', function () {
    const valid = validateForm('#needs-validation');

    if (valid) {
        const employer_id = new URLSearchParams(window.location.search).get('id');
        const description = tinymce.activeEditor.getContent();

        formAction(baseUrl + 'jobposting/service/Jobposting_service/update', 'POST',
            {
                id: $('#id').val(),
                employer_id: employer_id,
                title: $('#job_title').val(),
                description: description,
                filled: $('#job_filled').val()
            }, function () {
                success('SUCCESS', 'Job details successfully updated');
            }
        );
    }
});

// Delete job
$(document).on('click', '#delete_job', function () {
    formAction(baseUrl + 'jobposting/service/Jobposting_service/delete', 'POST', {id: $(this).data('id')}, function () {
        load_jobpostings();
        success('SUCCESS', 'Job successfully deleted');
    });
});

