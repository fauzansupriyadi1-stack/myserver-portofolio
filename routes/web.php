<?php

use App\Http\Controllers\LandingController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LandingController::class, 'index'])->name('home');
Route::get('/about', [LandingController::class, 'about'])->name('about');
Route::get('/cv', [LandingController::class, 'cv'])->name('cv');
Route::get('/skills', [LandingController::class, 'skills'])->name('skills');
Route::get('/certifications', [LandingController::class, 'certifications'])->name('certifications');
Route::get('/projects', [LandingController::class, 'projects'])->name('projects');
