let onlineUsers = [];
const online = window.Echo.channel('online-users');

online
    .listenForWhisper('online-users', (data) => {
        console.log(data);
    });
