<?php

use Illuminate\Support\Facades\Route;
use Eyesee\Entities\Authentication\UI\API\Controllers\AuthenticationController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/login/reddit', [AuthenticationController::class, 'handleRedditRedirect'])->name('reddit.login');
Route::get('/login/redirect', [AuthenticationController::class, 'handleRedditLogin'])->name('reddit.redirect');
