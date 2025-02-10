<?php

use App\Models\Room;
use Illuminate\Http\Request;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\NotificationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth:web', 'verified'])->name('dashboard');

Route::get('/auth/user', function (Request $request) {

    $user = auth()->user();

    return response()->json($user);

})->middleware(['auth:web', 'verified']);

Route::middleware('auth:web')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->middleware(['password.confirm:password.confirm,10'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::middleware(['auth:admin'])->group(function () {

    Route::get('admin/notifications', [NotificationController::class, 'index']);

    Route::delete('admin/notifications/clear', [NotificationController::class, 'destroy'])->name('admin.notifications.clear');

    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    });
});

require __DIR__.'/auth.php';
