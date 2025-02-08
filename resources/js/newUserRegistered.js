const onlineUsers = window.Echo.channel('new-user-registered');

onlineUsers.listen('NewUserRegisteredEvent', (e) => {
    console.log('render new user notification');
    renderUserNotification();
});

function renderUserNotification() {

    window.axios.get(`/admin/get-notification`)
        .then(function (response) {
            let ul = document.getElementById('admin-new-users');
            ul.innerHTML = '';
            response.data.notifications.forEach(notification => {
                let li = document.createElement('li');
                li.appendChild(document.createTextNode(notification.data.message));
                ul.appendChild(li);
            });
            let count = document.getElementById('admin-new-users-count').innerHTML = response.data.notifications_count;
        })
        .catch(function (error) {
            console.log(error);
        })
        .finally(function () {
            // always executed
        });
}

renderUserNotification();
