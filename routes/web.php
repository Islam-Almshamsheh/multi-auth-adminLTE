<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//Data tables testing purpose -->the file has been deleted
// Route::get('/datatables', function () {
//     return view('backend.datatables');
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/all-user', [App\Http\Controllers\backend\UserController::class, 'AllUser'])->name('alluser');
