<?php

use App\Http\Controllers\LayoutsController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/',[LayoutsController::class,'welcome'])->name('welcome');
Route::get('/topics',[LayoutsController::class,'topics'])->name('topics');
Route::get('/contact',[LayoutsController::class,'contact'])->name('contact');
Route::get('/about',[LayoutsController::class,'about'])->name('about');
Route::get('/settings',[LayoutsController::class,'settings'])->name('settings');
Route::get('/profile',[LayoutsController::class,'profile'])->name('profile');
Route::get('/study',[LayoutsController::class,'study'])->name('study');
Route::get('/study/{id}',[LayoutsController::class,'studyFind'])->name('study.show');


Route::get('/topic/{id}/details',[LayoutsController::class,'topicDetails'])->name('topic.details');
Route::get('topic/{id}/about',[LayoutsController::class,'topicAbout'])->name('topic.about');

Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
Route::put('/profile/change-password', [ProfileController::class, 'changePassword'])->name('profile.change_password');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
