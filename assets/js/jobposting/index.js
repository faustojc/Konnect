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

            const jobDetails = job.closest('.job-content').querySelector('.job-details');

            displaySingleLoadingCard(jobDetails);

            fetch(url, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                },
                body: param
            }).then(response => response.text())
                .then(data => {
                    jobDetails.innerHTML = data;

                    status_badge();
                    acceptRejectBtnFunction();
                });
        });
    });
}

document.addEventListener('DOMContentLoaded', function () {
    status_badge();

    // TinyMCE
    textareaEditor('textarea');

    displayLoadingCard('#job_feed');

    fetch(baseUrl + 'jobposting/job_feed')
        .then(response => response.text())
        .then(data => {
            const jobList = document.querySelector('#job_feed');
            jobList.innerHTML = data;

            status_badge();
            jobSelectedDisplayEvent(baseUrl + 'jobposting/get_selected_job');
        });

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
});

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
