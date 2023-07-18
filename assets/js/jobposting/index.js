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

const jobSelectedDisplayEvent = (url) => {
    // Get selected job
    const joblink = document.querySelectorAll('.job-link');

    joblink.forEach(job => {
        job.addEventListener('click', function () {
            const id = this.dataset.id;
            const param = new URLSearchParams({id: id});

            fetch(url, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                },
                body: param
            }).then(response => response.text())
                .then(data => {
                    const jobDetails = job.closest('.job-content').querySelector('.job-details');
                    jobDetails.innerHTML = data;

                    status_badge();
                });
        });
    });
}

document.addEventListener('DOMContentLoaded', function () {
    status_badge();

    // TinyMCE
    textareaEditor('textarea');
    jobSelectedDisplayEvent(baseUrl + 'jobposting/get_selected_job');

    const navJobFeed = document.querySelector('#nav-job-feed');
    navJobFeed.addEventListener('click', function () {
        fetch(baseUrl + 'jobposting/job_feed')
            .then(response => response.text())
            .then(data => {
                const jobList = document.querySelector('#job_list');
                jobList.innerHTML = data;

                status_badge();
                jobSelectedDisplayEvent(baseUrl + 'jobposting/get_selected_job');
            });
    });

    const navJobPosted = document.querySelector('#nav-job-posted');
    navJobPosted.addEventListener('click', function () {
        fetch(baseUrl + 'jobposting/own_jobpost')
            .then(response => response.text())
            .then(data => {
                const ownJobList = document.querySelector('#own_job');
                ownJobList.innerHTML = data;

                status_badge();
                jobSelectedDisplayEvent(baseUrl + 'jobposting/get_own_selected_job');
            });
    });
});

// TODO: Implement new save job, update job, and delete job using fetch API
