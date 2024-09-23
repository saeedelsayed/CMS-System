<?php

use Illuminate\Support\Facades\Route;


Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/login', [App\Http\Controllers\HomeController::class, 'login'])->name('login');
Route::get('/post/{post}', [App\Http\Controllers\PostController::class, 'show'])->name('post');

Route::middleware('auth')->group(function()
{
    Route::get('/admin', [App\Http\Controllers\AdminsController::class, 'index'])->name('admin.index');

    Route::get('/admin/posts', [App\Http\Controllers\PostController::class, 'index'])->name('post.index');
    Route::get('/admin/posts/create', [App\Http\Controllers\PostController::class, 'create'])->name('post.create');
    Route::post('/admin/posts', [App\Http\Controllers\PostController::class, 'store'])->name('post.store');

    Route::delete('/admin/posts/{post}/destroy', [App\Http\Controllers\PostController::class, 'destroy'])->name('post.destroy');
    Route::patch('/admin/posts/{post}/update', [App\Http\Controllers\PostController::class, 'update'])->name('post.update');
    Route::get('/admin/posts/{post}/edit', [App\Http\Controllers\PostController::class, 'edit'])->name('post.edit');
    Route::get('admin/users', [\App\Http\Controllers\UserController::class, 'index'])->name('users.index');

    Route::put('{user}/update', [\App\Http\Controllers\UserController::class, 'update'])->name('user.profile.update');
    Route::put('/user/{user}/attach', [\App\Http\Controllers\UserController::class, 'attach'])->name('user.role.attach');
    Route::put('/user/{user}/detach', [\App\Http\Controllers\UserController::class, 'detach'])->name('user.role.detach');

    Route::delete('admin/users/{user}/destroy', [\App\Http\Controllers\UserController::class, 'destroy'])->name('user.destroy');
});


//Route::middleware('role:admin')->group(function (){
//
//    Route::get('admin/users', [\App\Http\Controllers\UserController::class, 'index'])->name('users.index');
//});


Route::middleware('can:view,user')->group(function (){

    Route::get('{user}/profile', [\App\Http\Controllers\UserController::class, 'show'])->name('user.profile');
});
