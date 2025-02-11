<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminProfileController;
use App\Http\Controllers\AdminSkillController;

/**
 * Client routes
 */
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/profile/{id}', [HomeController::class, 'showProfile'])->name('profile_show');

/**
 * Admin routes
 */
Route::get('/back-office', [AdminController::class, 'index'])->name('admin.dashboard');

/**
 * Admin profile routes
 */
Route::get('/back-office/profiles', [AdminProfileController::class, 'showProfiles'])->name('admin.profiles');
Route::get('/back-office/profile/show/{id}', [AdminProfileController::class, 'showProfile'])->name('admin.profile.show');

Route::get('/back-office/profile/edit/{id}', [AdminProfileController::class, 'editProfile'])->name('admin.profile.edit');
Route::put('/back-office/profile/edit/{id}', [AdminProfileController::class, 'updateProfile'])->name('admin.profile.edit');

Route::get('/back-office/profile/new', [AdminProfileController::class, 'createProfile'])->name('admin.profile.create');
Route::put('/back-office/profile/new', [AdminProfileController::class, 'saveProfile'])->name('admin.profile.create');

Route::delete('/back-office/profile/delete/{id}', [AdminProfileController::class, 'deleteProfile'])->name('admin.profile.delete');
Route::put('/back-office/profile/{id}/experiences', [AdminProfileController::class, 'updateProfileExperiences'])->name('admin.profile.update_experiences');


/**
 * Admin skills
 */
Route::get('/back-office/skills/{id?}', [AdminSkillController::class, 'showSkills'])->name('admin.show_skills');
Route::put('/back-office/skill/save/{id?}', [AdminSkillController::class, 'saveSkill'])->name('admin.save_skill');
Route::delete('/back-office/skill/delete/{id}', [AdminSkillController::class, 'deleteSkill'])->name('admin.delete_skill');


