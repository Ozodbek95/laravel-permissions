<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
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
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/posts', PostController::class .'@index')->name('posts')->middleware('can:show post');
    Route::get('/posts/create', PostController::class . '@create')->name('posts.create')->middleware('can:create post');
    Route::post('/posts', PostController::class .'@store')->name('posts.store')->middleware('can:store post');;
    Route::get('/posts/{post}', PostController::class .'@show')->name('posts.show')->middleware('can:show post');;
    Route::get('/posts/{post}/edit', PostController::class .'@edit')->name('posts.edit')->middleware('can:edit post');;
    Route::put('/posts/{post}', PostController::class .'@update')->name('posts.update')->middleware('can:update post');;
    Route::delete('/posts/{post}', PostController::class .'@destroy')->name('posts.destroy')->middleware('can:delete post');;

        Route::resource('users', UserController::class)->middleware('role:super-user');
        Route::resource('roles', RoleController::class)->middleware('role:super-user');

/*
        Route::get('/users', [UserController::class, 'index'])->name('users');
        Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
        Route::post('/users', [UserController::class, 'store'])->name('users.store');
        Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
        Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');
        Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');

        Route::get('/roles', [RoleController::class, 'index'])->name('roles');
        Route::get('/roles/create', [RoleController::class, 'create'])->name('roles.create');
        Route::post('/roles', [RoleController::class, 'store'])->name('roles.store');
        Route::get('/roles/{id}/edit', [RoleController::class, 'edit'])->name('roles.edit');
        Route::put('/roles/{id}', [RoleController::class, 'update'])->name('roles.update');
        Route::delete('/roles/{id}', [RoleController::class, 'destroy'])->name('roles.destroy');
*/
});



require __DIR__.'/auth.php';
