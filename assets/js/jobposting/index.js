// ####### STYLES #######
let style = document.createElement('style');
style.innerHTML = `
        .loading-card {
            position: relative;
            overflow: hidden;
        }
    
        .loading-card::after {
            content: "";
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background-image: linear-gradient(
                    to right,
                    rgba(255, 255, 255, 0) 0%,
                    rgba(255, 255, 255, 0.8) 50%,
                    rgba(255, 255, 255, 0) 100%
            );
            animation: loading-card-overlay-animation 1s infinite;
        }
    
        @keyframes loading-card-overlay-animation {
            from {
                left: -100%;
            }
            to {
                left: 100%;
            }
        }
    
        .loading-content-box {
            height: 1rem;
            background-color: #ddd;
            margin-bottom: .8rem;
        }
    `;
document.head.appendChild(style);
// ####### END OF STYLES #######

const status_badge = () => {
    const statuses = document.querySelectorAll('.job-status');

    statuses.forEach(function (status) {
        status.textContent = status.textContent.replace(/\s+/g, '').toUpperCase();

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

            const jobDetails = job.closest('.job-content').querySelector('.job-details');

            displaySingleLoadingCard(jobDetails);

            fetch(url + '?id=' + id)
                .then(response => response.text())
                .then(data => {
                    jobDetails.innerHTML = data;

                    status_badge();
                    applyBtnFunction();
                    acceptRejectBtnFunction();
                    setJobFunctionality();
                    setViewApplicant();

                    tinymce.remove('textarea');
                    textareaEditor('#description' + id, 400);

                    const description = document.querySelector('#description' + id);

                    if (description) {
                        tinymce.get('description' + id).setContent(description.innerHTML);
                    }
                });
        });
    });
}

const setJobFunctionality = () => {
    const updateJobBtn = document.querySelector('.btn-update-job');
    const deleteJobBtn = document.querySelector('.delete-job-btn');

    if (updateJobBtn) {
        updateJobBtn.addEventListener('click', () => {
            const form = updateJobBtn.closest('.modal-content').querySelector('form');
            const id = form.querySelector('input[name="id"]').value;
            const description = tinymce.get('description' + id).getContent();

            const formData = new FormData(form);
            formData.append('description', description);

            const isValid = validateForm(form);

            if (isValid && description !== '') {
                const spinner = document.createElement('span');
                spinner.classList.add('spinner-border', 'spinner-border-sm', 'mx-2');

                updateJobBtn.append(spinner);

                formAction(baseUrl + 'jobposting/service/Jobposting_service/update', 'POST', formData, () => {
                    success('SUCCESS!', 'Job updated successfully!');

                    updateJobBtn.querySelector('span.spinner-border').remove();

                    const modal_close = document.querySelector('#job_modal' + id).querySelector('.close');
                    const click_event = new MouseEvent('click', {
                        view: window,
                        bubbles: true,
                        cancelable: true
                    });

                    modal_close.dispatchEvent(click_event);
                });
            }
        });
    }


    if (deleteJobBtn) {
        deleteJobBtn.addEventListener('click', () => {
            const id = deleteJobBtn.dataset.id;

            if (confirm('Are you sure you want to delete this job?')) {
                formAction(baseUrl + 'jobposting/service/Jobposting_service/delete', 'POST', {id: id}, () => {
                    const ownJobList = document.querySelector('#job_posted');

                    success('SUCCESS!', 'Job deleted successfully!');
                    displayLoadingCard('#job_posted');
                    fetch(baseUrl + 'jobposting/own_jobpost')
                        .then(response => response.text())
                        .then(data => {
                            ownJobList.innerHTML = data;

                            status_badge();
                            jobSelectedDisplayEvent(baseUrl + 'jobposting/get_own_selected_job');
                        });
                });
            }
        });
    }
}

const setViewApplicant = () => {
    const btn_view_details = document.querySelector('.btn-view-details');
    if (btn_view_details) {
        btn_view_details.addEventListener('click', () => {
            const view_applicant = document.querySelector('#view_details');

            const observer = new MutationObserver(() => {
                if (view_applicant.classList.contains('show')) {
                    const id = btn_view_details.getAttribute('data-id');
                    const job_id = btn_view_details.getAttribute('data-job-id');

                    formAction(baseUrl + 'applicant/getApplicant', 'POST', {id: id, job_id: job_id}, (data) => {
                        view_applicant.querySelector('img').setAttribute('src', baseUrl + 'assets/images/employee/profile_pic/' + data.employeeImage);
                        view_applicant.querySelector('#employee_name').innerHTML = data.employeeName;
                        view_applicant.querySelector('#employee_title').innerHTML = data.employeeTitle;
                        view_applicant.querySelector('#employee_address').innerHTML = data.employeeAddress;

                        view_applicant.querySelector('#employee_email').innerHTML = data.email;
                        view_applicant.querySelector('#employee_city').innerHTML = data.employeeCity;

                        const form = view_applicant.querySelector('form');
                        form.querySelector('input[name="id"]').value = data.id;
                        form.querySelector('input[name="job_id"]').value = data.job_id;
                        form.querySelector('input[name="employee_id"]').value = data.employee_id;

                        // resume html
                        const resume_info = view_applicant.querySelector('.resume-info');

                        // Get the resume view
                        fetch(baseUrl + 'resume/getResume?id=' + data.employee_id)
                            .then(response => response.text())
                            .then(data => resume_info.innerHTML = data)
                            .catch(e => console.log(e));
                    });

                    observer.disconnect();
                }
            });

            observer.observe(view_applicant, {attributes: true, attributeFilter: ['class']})
        });
    }
}

document.addEventListener('DOMContentLoaded', function () {
    status_badge();

    // TinyMCE
    textareaEditor('textarea');

    const navJobFeed = document.querySelector('#nav-job-feed');
    if (navJobFeed) {
        navJobFeed.addEventListener('click', function () {
            const jobList = document.querySelector('#job_feed');

            displayLoadingCard('#job_feed');

            fetch(baseUrl + 'jobposting/job_feed')
                .then(response => response.text())
                .then(data => {
                    jobList.innerHTML = data;

                    status_badge();
                    jobSelectedDisplayEvent(baseUrl + 'jobposting/get_selected_job');
                });
        });
    }

    // For employers where they can view their own job posts
    const navJobPosted = document.querySelector('#nav-job-posted');
    if (navJobPosted) {
        navJobPosted.addEventListener('click', function () {
            const ownJobList = document.querySelector('#job_posted');

            displayLoadingCard('#job_posted');

            fetch(baseUrl + 'jobposting/own_jobpost')
                .then(response => response.text())
                .then(data => {
                    ownJobList.innerHTML = data;

                    status_badge();
                    jobSelectedDisplayEvent(baseUrl + 'jobposting/get_own_selected_job');
                });
        });
    }

    // For employees where they can view their applied jobs
    const navAppliedJob = document.querySelector('#nav-application');
    if (navAppliedJob) {
        navAppliedJob.addEventListener('click', function () {
            const appliedJobList = document.querySelector('#job_applied');

            displayLoadingCard('#job_applied');

            fetch(baseUrl + 'jobposting/get_applied_jobs')
                .then(response => response.text())
                .then(data => {
                    appliedJobList.innerHTML = data;

                    status_badge();
                    jobSelectedDisplayEvent(baseUrl + 'jobposting/get_selected_applied_job');
                });
        });
    }

    displayLoadingCard('#job_feed');
    const urlParams = new URLSearchParams(window.location.search);
    const id = urlParams.get('id');

    // If there is a job ID in link, display the job details
    if (id) {
        //displaySingleLoadingCard(jobDetails);

        fetch(baseUrl + 'jobposting/job_info?id=' + id)
            .then(response => response.json())
            .then(data => {
                const jobNavLinks = document.querySelectorAll('.nav-job .nav-link');
                jobNavLinks.forEach(jobNav => {
                    jobNav.classList.remove('active');
                    jobNav.setAttribute('aria-selected', 'false');
                });

                const tabPanes = document.querySelectorAll('.tab-pane');
                tabPanes.forEach(tabPane => {
                    tabPane.classList.remove('show', 'active');
                });

                let jobContent;
                let url = '';

                if (data.user_type.toUpperCase() === 'EMPLOYER') {
                    const navJobPosted = document.querySelector('#nav-job-posted');
                    navJobPosted.classList.toggle('active');
                    navJobPosted.setAttribute('aria-selected', 'true');

                    const jobTabPosted = document.querySelector('#posted-tab');
                    jobTabPosted.classList.add('show', 'active');

                    const jobPosted = document.querySelector('#job_posted');
                    jobPosted.innerHTML = data.jobs;

                    jobContent = jobPosted;
                    url = baseUrl + 'jobposting/get_own_selected_job';
                } else {
                    const navApplication = document.querySelector('#nav-application');
                    navApplication.classList.toggle('active');
                    navApplication.setAttribute('aria-selected', 'true');

                    const jobTabApplied = document.querySelector('#application-tab');
                    jobTabApplied.classList.add('show', 'active');

                    const ownJobApplied = document.querySelector('#job_applied');
                    ownJobApplied.innerHTML = data.jobs;

                    jobContent = ownJobApplied;
                    url = baseUrl + 'jobposting/get_selected_applied_job';
                }

                const jobDetails = jobContent.querySelector('.job-content .job-details')
                jobDetails.innerHTML = data.selected;

                jobSelectedDisplayEvent(url);
                status_badge();
                applyBtnFunction();

                // EMPLOYER FUNCTIONALITY
                acceptRejectBtnFunction();
                setJobFunctionality();
                setViewApplicant();
            });
    } else {
        fetch(baseUrl + 'jobposting/job_feed')
            .then(response => response.text())
            .then(data => {
                const jobList = document.querySelector('#job_feed');
                jobList.innerHTML = data;

                status_badge();
                jobSelectedDisplayEvent(baseUrl + 'jobposting/get_selected_job');
            });
    }
});

const search_btn = document.querySelector('#search_btn');
if (search_btn) {
    search_btn.addEventListener('click', searchEvent);
}

const search_job = document.querySelector('#search_job');
if (search_job) {
    search_job.addEventListener('keydown', (e) => {
        if (e.key === 'Enter') {
            searchEvent();
        }
    });
}

function searchEvent() {
    const activeTab = document.querySelector('.tab-pane.show.active');
    const query = search_job.value.trim();

    // if the active tab is the feed-tab, search for all jobs
    if (activeTab.id.toLowerCase() === 'feed-tab') {
        const job_feed = document.querySelector('#job_feed');

        displayLoadingCard('#job_feed');

        fetch(baseUrl + 'jobposting/job_feed?query=' + query)
            .then(response => response.text())
            .then(data => {
                job_feed.innerHTML = data;

                status_badge();
                jobSelectedDisplayEvent(baseUrl + 'jobposting/get_selected_job');
            });
    }

    // if active tab is posted-tab, search for own job posts
    if (activeTab.id.toLowerCase() === 'posted-tab') {
        const own_job_posted = document.querySelector('#job_posted');

        displayLoadingCard('#job_posted');

        fetch(baseUrl + 'jobposting/own_jobpost?query=' + query)
            .then(response => response.text())
            .then(data => {
                own_job_posted.innerHTML = data;

                status_badge();
                jobSelectedDisplayEvent(baseUrl + 'jobposting/get_own_selected_job');
            });
    }

    // if active tab is application-tab, search for own job applications
    if (activeTab.id.toLowerCase() === 'application-tab') {
        const applied_jobs = document.querySelector('#job_applied');

        displayLoadingCard('#job_applied');

        fetch(baseUrl + 'jobposting/get_applied_jobs?query=' + query)
            .then(response => response.text())
            .then(data => {
                applied_jobs.innerHTML = data;

                status_badge();
                jobSelectedDisplayEvent(baseUrl + 'jobposting/get_selected_applied_job');
            });
    }
}

/**
 * @param {string} selectors
 */
function displayLoadingCard(selectors) {
    const parentElement = document.querySelector(selectors);
    const container = document.createElement('div');

    container.classList.add('row', 'justify-content-center', 'p-3');

    let colMd4 = document.createElement('div');
    colMd4.className = 'col-md-4 px-2';

    // Generate 3 random loading cards
    for (let i = 0; i < 3; i++) {
        // Generate a random number of boxes (between 3 and 6)
        let title_boxes = Math.floor(Math.random() * (4 - 3 + 1)) + 3;
        let body_boxes = Math.floor(Math.random() * (7 - 4 + 1)) + 4;

        // Start the card
        let card = document.createElement('div');
        card.className = 'card loading-card mb-3';
        let cardBody = document.createElement('div');
        cardBody.className = 'card-body';

        // Generate the boxes for card-title
        for (let j = 0; j < title_boxes; j++) {
            // Generate a random width for the box (between 30% and 100%)
            let width = Math.floor(Math.random() * (90 - 30 + 1)) + 30;
            let loadingContentBox = document.createElement('div');
            loadingContentBox.className = 'loading-content-box';
            loadingContentBox.style.width = width + '%';
            cardBody.appendChild(loadingContentBox);
        }

        cardBody.appendChild(document.createElement('br'));

        // Generate the boxes for card-body
        for (let j = 0; j < body_boxes; j++) {
            // Generate a random width for the box (between 30% and 100%)
            let width = Math.floor(Math.random() * (100 - 30 + 1)) + 30;
            let loadingContentBox = document.createElement('div');
            loadingContentBox.className = 'loading-content-box';
            loadingContentBox.style.width = width + '%';
            cardBody.appendChild(loadingContentBox);
        }

        // End the card
        card.appendChild(cardBody);
        colMd4.appendChild(card);
    }

    let colMd5 = document.createElement('div');
    colMd5.className = 'col-md-5 px-2';

    let card2 = document.createElement('div');
    card2.className = 'card loading-card';
    card2.style.position = 'sticky';
    card2.style.top = '60px';

    let cardBody2 = document.createElement('div');
    cardBody2.className = 'card-body';

    let boxWidths = [80, 60, 70, 50, 100, 100, 100, 100, 100, 100, 45, 100, 60];
    for (let i = 0; i < boxWidths.length; i++) {
        if (i === 2 || i === 3 || i === 7) {
            cardBody2.appendChild(document.createElement('br'));
        }
        if (i === 4) {
            let hr = document.createElement('hr');
            cardBody2.appendChild(hr);
        }
        let loadingContentBox = document.createElement('div');
        loadingContentBox.className = 'loading-content-box';
        loadingContentBox.style.width = boxWidths[i] + '%';
        cardBody2.appendChild(loadingContentBox);
    }

    card2.appendChild(cardBody2);
    colMd5.appendChild(card2);

    container.appendChild(colMd4);
    container.appendChild(colMd5);

    parentElement.innerHTML = container.outerHTML;
}

/**
 * @param {Element} element
 */
function displaySingleLoadingCard(element) {
    let card = document.createElement('div');
    card.className = 'card loading-card';
    card.style.position = 'sticky';
    card.style.top = '60px';

    let cardBody = document.createElement('div');
    cardBody.className = 'card-body';

    let boxWidths = [80, 60, 70, 50, 100, 100, 100, 100, 100, 100, 45, 100, 60];
    for (let i = 0; i < boxWidths.length; i++) {
        if (i === 2 || i === 3 || i === 7) {
            cardBody.appendChild(document.createElement('br'));
        }
        if (i === 4) {
            let hr = document.createElement('hr');
            cardBody.appendChild(hr);
        }
        let loadingContentBox = document.createElement('div');
        loadingContentBox.className = 'loading-content-box';
        loadingContentBox.style.width = boxWidths[i] + '%';
        cardBody.appendChild(loadingContentBox);
    }

    card.appendChild(cardBody);

    element.innerHTML = card.outerHTML;
}

// TODO: Implement new save job, update job, and delete job using fetch API
