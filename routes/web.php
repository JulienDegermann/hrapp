<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminJobController;
use App\Http\Controllers\AdminSkillController;
use App\Http\Controllers\AdminProfileController;

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
Route::get('/back-office/profiles', [AdminProfileController::class, 'showProfiles'])->name('admin.show_profiles');
Route::get('/back-office/profile/show/{id}', [AdminProfileController::class, 'showProfile'])->name('admin.show_profile');

Route::get('/back-office/profile/edit/{id?}', [AdminProfileController::class, 'editProfile'])->name('admin.edit_profile');
Route::put('/back-office/profile/edit/{id}', [AdminProfileController::class, 'saveProfile'])->name('admin.save_profile');


Route::delete('/back-office/profile/delete/{id}', [AdminProfileController::class, 'deleteProfile'])->name('admin.delete_profile');
Route::put('/back-office/profile/{id}/experiences', [AdminProfileController::class, 'saveProfileExperiences'])->name('admin.save_profile_experiences');


/**
 * Admin skills
 */
Route::get('/back-office/skills', [AdminSkillController::class, 'showSkills'])->name('admin.show_skills');
Route::get('/back-office/skill/edit/{id?}', [AdminSkillController::class, 'editSkill'])->name('admin.edit_skill');
Route::put('/back-office/skill/save/{id?}', [AdminSkillController::class, 'saveSkill'])->name('admin.save_skill');
Route::delete('/back-office/skill/delete/{id}', [AdminSkillController::class, 'deleteSkill'])->name('admin.delete_skill');


/**
 * Admin jobs
 */
Route::GET('/back-office/jobs', [AdminJobController::class, 'showJobs'])->name('admin.show_jobs');
Route::GET('/back-office/jobs/edit/{id?}', [AdminJobController::class, 'editJob'])->name('admin.edit_job');
Route::PUT('/back-office/jobs/save/{id?}', [AdminJobController::class, 'saveJob'])->name('admin.save_job');
Route::DELETE('/back-office/jobs/delete/{id?}', [AdminJobController::class, 'deleteJob'])->name('admin.delete_job');

