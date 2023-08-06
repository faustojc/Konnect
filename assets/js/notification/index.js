const notifications = document.querySelectorAll('.notification-body');
if (notifications) {
    notifications.forEach(notification => {
        notification.addEventListener('click', () => {
            if (notification.classList.contains('bg-gray-light')) {
                notification.classList.remove('bg-gray-light');
            }

            const id = notification.getAttribute('data-id');

            fetch(baseUrl + 'notification/setRead?id=' + id)
                .then(response => response.json())
                .catch(e => error('ERROR', 'Something went wrong!'));
        });
    });
}
