const chat = window.Echo.join('chat.room.1');
console.log(chat)

let inUsers = [];
let user = {};
window.onload = function() {
    axios.get('/auth/user').then((response) => {
        user = response.data;
    }).catch((error) => {
        user = {
            name: 'Some one'
        }
    });

    const chatBox = document.getElementById('chat-box');
    chatBox.scrollTop = chatBox.scrollHeight;
}

document.getElementById('text-chat').addEventListener('input', function() {
    if (this.value.length >= 1) {
        chat.whisper('typing', {
            message: `${user.name.split(' ')[0]} writing...`
        });
    } else {
        chat.whisper('stop-typing', {
            message: 'stop writing'
        });
    }
});

chat
    .here((users) => {
        inUsers = users;
        onlineUsers(users)
    })
    .joining((user) => {
        inUsers.push(user);
        onlineUsers(inUsers);
    }).
leaving((user) => {
    inUsers = inUsers.filter((inUser) => inUser.id !== user.id);
    onlineUsers(inUsers);
})
    .error((error) => {
        console.error(error);
    })
    .listenForWhisper('typing', (event) => {
        document.getElementById('writing-now').innerHTML = event.message;
    })
    .listenForWhisper('stop-typing', (event) => {
        document.getElementById('writing-now').innerHTML = '';
    });

function onlineUsers(users) {
    const onlineUsers = document.getElementById('online-users');
    onlineUsers.innerHTML = '';
    let user = '';
    for (let i = 0; i < users.length; i++) {
        if (i < users.length - 1) {
            user += users[i].name.split(' ')[0] + ', ';
        } else {
            user += users[i].name.split(' ')[0];
        }
    }
    onlineUsers.innerHTML = (user);
    user = '';
}
