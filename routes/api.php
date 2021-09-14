<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Eyesee\Entities\User\UI\API\Controllers\UserController;
use Eyesee\Entities\Authentication\UI\API\Controllers\AuthenticationController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::post('login', [AuthenticationController::class, 'login'])->name('login');
Route::post('register', [UserController::class, 'registerUser'])->name('register');

Route::middleware('auth:api')->group(function ($router) {
    //$router->post('');
});
