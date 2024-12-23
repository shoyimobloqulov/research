<?php

use App\Http\Controllers\LayoutsController;
use Illuminate\Support\Facades\Route;

Route::get('/',[LayoutsController::class,'welcome']);



