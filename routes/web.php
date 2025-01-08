<?php

use App\Http\Controllers\LayoutsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\VideoController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('test/{id}/{user_id}/certificate/{name}',[LayoutsController::class,'certificate'])->name('certificate.generate');

Route::get('/', [LayoutsController::class, 'welcome'])->name('welcome');
Route::get('/topics', [LayoutsController::class, 'topics'])->name('topics');
Route::get('/contact', [LayoutsController::class, 'contact'])->name('contact');
Route::get('/about', [LayoutsController::class, 'about'])->name('about');
Route::get('/settings', [LayoutsController::class, 'settings'])->name('settings');
Route::get('/profile', [LayoutsController::class, 'profile'])->name('profile');
Route::get('/study', [LayoutsController::class, 'study'])->name('study');
Route::get('/study/{id}', [LayoutsController::class, 'studyFind'])->name('study.show');
Route::get('/link/articles', [LayoutsController::class, 'linkArticles'])->name('link.articles');
Route::get('/glossary', [LayoutsController::class, 'glossary'])->name('glossary');

Route::get('/topic/{id}/details', [LayoutsController::class, 'topicDetails'])->name('topic.details');
Route::get('topic/{id}/about', [LayoutsController::class, 'topicAbout'])->name('topic.about');
Route::get('topic/{id}/audio', [LayoutsController::class, 'topicAudio'])->name('topic.audio');
Route::get('stream/audio/{filename}', [VideoController::class, 'stream'])->name('audio.stream');
Route::get('topic/{id}/test', [LayoutsController::class, 'topicTest'])->name('topic.test');
Route::get('test/{id}/submit', [LayoutsController::class, 'testSubmit'])->name('test.submit');
Route::get('/test', [TestController::class, 'test'])->name('test');
Route::get('/test/start', [TestController::class, 'start'])->name('test.start');

Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
Route::put('/profile/change-password', [ProfileController::class, 'changePassword'])->name('profile.change_password');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
