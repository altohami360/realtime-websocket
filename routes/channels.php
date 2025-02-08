<?php

use App\Models\User;
use Illuminate\Support\Facades\Broadcast;


/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

// Broadcast::channel('online-users', function (User $user) {
//     return $user;
// });
//
// Broadcast::channel('new-user-registered', function (User $user) {
//     return true;
// });
//
// Broadcast::channel('chat.room.1', function (User $user) {
//     return $user;
// });

Broadcast::channel('online', function (User $user) {
    return [
        'id' => $user->id,
        'name' => $user->name
    ];
});
