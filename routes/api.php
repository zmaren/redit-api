<?php

use Eyesee\Entities\Community\UI\API\Controllers\CommunityController;
use Illuminate\Support\Facades\Route;
use Eyesee\Entities\User\UI\API\Controllers\UserController;
use Eyesee\Entities\Thread\UI\API\Controllers\ThreadController;

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

Route::post('register', [UserController::class, 'registerUser'])->name('register');

Route::group(['middleware' => 'auth:api'], function ($router) {

    $router->group(['prefix' => 'threads', 'as' => 'threads.'], function () use ($router) {

        $router->post('', [ThreadController::class, 'create'])->name('create');
        $router->put('{id}', [ThreadController::class, 'update'])->name('update');
        $router->delete('{id}', [ThreadController::class, 'delete'])->name('delete');

    });

    $router->group(['prefix' => 'communities', 'as' => 'communities.'], function () use ($router) {

        $router->post('', [CommunityController::class, 'create'])->name('create');

    });

});
