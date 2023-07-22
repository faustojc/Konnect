async function pollNotifications() {
    const response = await fetch(baseUrl + 'notification/notify');
    const data = await response.json();

    if (data.length > 0) {
        for (const notification of data) {
            // Display notification
            info(notification.title, notification.message, 6000);
        }
    }
}

document.addEventListener('DOMContentLoaded', function () {
    pollNotifications().then(response => {
        setInterval(pollNotifications, 3000);
    });
});
