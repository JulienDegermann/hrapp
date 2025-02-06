<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

/**
 * Client routes
 */
Route::get('/', [HomeController::class, 'index'])->name('home');

/**
 * Admin routes
 */
Route::get('/back-office', [AdminController::class, 'index'])->name('admin');

/**
 * Admin profile routes
 */
Route::get('/back-office/profiles', [AdminController::class, 'showProfiles'])->name('admin.profiles');
Route::get('/back-office/profile/show/{id}', [AdminController::class, 'showProfile'])->name('admin.profile.show');

Route::get('/back-office/profile/edit/{id}', [AdminController::class, 'editProfile'])->name('admin.profile.edit');
Route::put('/back-office/profile/edit/{id}', [AdminController::class, 'updateProfile'])->name('admin.profile.edit');

Route::get('/back-office/profile/new', [AdminController::class, 'createProfile'])->name('admin.profile.create');
Route::put('/back-office/profile/new', [AdminController::class, 'saveProfile'])->name('admin.profile.create');

Route::delete('/back-office/profile/delete/{id}', [AdminController::class, 'deleteProfile'])->name('admin.profile.delete');
Route::put('/back-office/profile/{id}/experiences', [AdminController::class, 'updateProfileExperiences'])->name('update_experiences');