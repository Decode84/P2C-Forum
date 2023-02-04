<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Forum\ForumController;
use App\Http\Controllers\Forum\ReplyController;
use App\Http\Controllers\Forum\TopicController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Forum\CategoryController;
use App\Http\Controllers\Account\ProfileController;
use App\Http\Controllers\Account\SettingsController;
use App\Http\Controllers\Auth\AuthenticationController;

// Route::get('/', [WelcomeController::class, 'index'])->name('welcome');

Route::group(['middleware' => 'guest'], function () {
    Route::get('login', [AuthenticationController::class, 'create'])->name('auth.login');
    Route::post('authenticate', [AuthenticationController::class, 'store'])->name('auth.authenticate');

    Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('auth.register');
    Route::post('register', [RegisterController::class, 'store'])->name('auth.store');
});

Route::middleware('auth')->group(function () {
    Route::post('logout', [AuthenticationController::class, 'logout'])->name('auth.logout');
});

Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->middleware('role:admin')->group(function () {
    // Admin routes
    Route::get('/asd', [AdminController::class, 'index'])->name('admin.index');
 });

Route::middleware('auth')->group(function () {
    Route::get('/', [ForumController::class, 'index'])->name('forum.index');

    Route::controller(ProfileController::class)->group(function () {
        Route::get('/profile/{user}', 'show')->name('profile.show');
    });

    Route::controller(SettingsController::class)->group(function () {
        Route::get('settings', 'index')->name('settings.index');
        Route::put('profile', 'updateProfile')->name('profile.update');
        Route::put('avatar', 'updateAvatar')->name('avatar.update');
        Route::put('cover', 'updateCover')->name('cover.update');
    });

    Route::controller(CategoryController::class)->group(function () {
        Route::get('{category}', 'show')->name('forum.category.show');
    });

    Route::controller(TopicController::class)->group(function () {
        Route::get('{category}/create', 'create')->name('forum.topic.create');
        Route::post('{category}/', 'store')->name('forum.topic.store');
        Route::get('{category}/topic/{topic}', 'show')->name('forum.topic.show');
        Route::get('{category}/topic/{topic}/edit', 'edit')->name('forum.topic.edit');
        Route::put('{category}/topic/{topic}/', 'update')->name('forum.topic.update');
        Route::delete('{category}/topic/{topic}', 'destroy')->name('forum.topic.destroy');
    });

    Route::controller(ReplyController::class)->group(function () {
        Route::post('{category}/topic/{topic}', 'store')->name('forum.reply.store');
        Route::get('{category}/topic/{topic}/reply/{reply}', 'show')->name('forum.reply.show');
        Route::get('{category}/topic/{topic}/reply/{reply}/edit', 'edit')->name('forum.reply.edit');
        Route::put('{category}/topic/{topic}/{reply}', 'update')->name('forum.reply.update');
        Route::delete('{category}/topic/{topic}/reply/{reply}', 'destroy')->name('forum.reply.destroy');
    });
});
