let onlineUsers = [];
const online = window.Echo.join('online');

online.here((users) => {
    onlineUsers = users;
    renderCountOfOnlineUsers(users);
    onlineUsersChat(users);
})
    .joining((user) => {
        onlineUsers.push(user);
        renderCountOfOnlineUsers(onlineUsers);
        onlineUsersChat(onlineUsers);
    })
    .leaving((user) => {
        console.log('user leave', user)
        onlineUsers = onlineUsers.filter((onlineUser) => onlineUser.id !== user.id);
        renderCountOfOnlineUsers(onlineUsers);
        onlineUsersChat(onlineUsers);
    });

function renderCountOfOnlineUsers(users) {
    const onlineUsersCount = document.getElementById('online-users-count');
    onlineUsersCount.innerHTML = users.length;
}

function onlineUsersChat(users) {
    const onlineUsers = document.getElementById('online-users-chats');
    onlineUsers.innerHTML = '';
    let user = '';
    for (let i = 0; i < users.length; i++) {
        user += `<div class="border-b border-b-gray-200 w-full p-2 flex gap-2 items-center">
                    <img src="https://placehold.co/500?text=H" alt="" class="w-8 rounded-full">
                    <p class="font-bold">${users[i].name}</p>
                </div>`;
    }
    onlineUsers.innerHTML = user;
}
