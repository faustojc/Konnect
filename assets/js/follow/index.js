document.addEventListener('DOMContentLoaded', function () {
    const follow_btn = document.querySelectorAll('button.follow');

    if (follow_btn) {
        follow_btn.forEach(button => {
            button.addEventListener('click', function (event) {
                const employer_id = button.getAttribute('data-id');
                const url = baseUrl + 'follow/Follow/follow';
                const params = new URLSearchParams({employer_id: employer_id});

                const icon = document.createElement('i');
                icon.classList.add('spinner-border', 'spinner-border-sm', 'mr-1');
                icon.setAttribute('role', 'status');

                const i = button.querySelector('i');

                if (i !== null) {
                    button.removeChild(i);
                }

                button.insertBefore(icon, button.firstChild);

                fetch(url, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: params
                }).then(response => response.json())
                    .then(data => {
                        // if unfollowed change to follow
                        if (data.status === 'unfollowed') {
                            const child = button.querySelector('i');

                            if (child !== null) {
                                button.removeChild(child);
                            }
                            button.classList.remove('btn-outline-success');
                            button.classList.add('btn-outline-info');
                            button.textContent = 'Follow';
                        } else {
                            icon.className = '';
                            icon.classList.add('fa', 'fa-check', 'mr-1');

                            button.classList.remove('btn-outline-info');
                            button.classList.add('btn-outline-success');
                            button.textContent = 'Following';
                            button.insertBefore(icon, button.firstChild);
                        }
                    });
            });
        });
    }
});
