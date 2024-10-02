<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;

use App\Http\Middleware\AuthenticateSession;
use App\Models\User;

Route::get('/', function () {
    return view('welcome');
}
);


// Route::get('/user-list', [UserController::class, 'userlist'])->name('user-list')->middleware('checkAge');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('dashboard', [UserController::class, 'dashboard'])->name('dashboard');
    Route::get('/mema', [UserController::class, 'mema'])->name('mema')->middleware('isUser:user');
    Route::get('/post/all', [PostController::class, 'index'])->name('post.all')->middleware('isAdmin:admin');
    Route::get('/user-list', [UserController::class, 'userlist'])->name('user-list')->middleware('isAdmin:admin');
// Create
    Route::post('/create-post', [PostController::class, 'storepost'])->name('create-post')->middleware('isAdmin:admin');
   

    
   
});