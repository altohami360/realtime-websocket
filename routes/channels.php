<?php

use App\Models\Admin;
use Illuminate\Foundation\Auth\User;
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
Broadcast::channel('new-user-registered', function ($user) {
    return $user;
});
//
// Broadcast::channel('chat.room.1', function (User $user) {
//     return $user;
// });

Broadcast::channel('online-users', function ($user) {

    if ($user instanceof User) {
        return $user;
    }

    return false;
}, ['guards' => ['web', 'admin']]);
