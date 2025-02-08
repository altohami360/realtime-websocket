<?php

use App\Models\Room;
use Illuminate\Http\Request;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth:admin']);

Route::get('admin/get-notification', function () {
    return response()->json([
        'notifications' => auth()->guard('admin')->user()->notifications,
        'notifications_count' => auth()->guard('admin')->user()->notifications->count()
    ]);
})->middleware(['auth:admin']);

require __DIR__.'/auth.php';
