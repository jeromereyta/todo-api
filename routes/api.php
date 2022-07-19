<?php

use App\Http\Controllers\API\Authentication\LoginController;
use App\Http\Controllers\API\Authentication\LogoutController;
use App\Http\Controllers\API\Authentication\RegisterController;
use App\Http\Controllers\API\Todo\DeleteTodoController;
use App\Http\Controllers\API\Todo\EditTodoController;
use App\Http\Controllers\API\Todo\ListTodoController;
use App\Http\Controllers\API\Todo\CreateTodoController;
use App\Http\Controllers\API\Todo\ShowTodoController;
use Illuminate\Support\Facades\Route;

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

Route::post('/login', [
    'as' => 'login',
    'uses' => LoginController::class,
]);

Route::post('/register', [
    'as' => 'register',
    'uses' => RegisterController::class,
]);

Route::group([
    'middleware' => 'auth:sanctum',
    'as' => 'enco.api.v1.',
    'prefix' => '',
], function () {
    Route::post('/logout', [
        'as' => 'logout',
        'uses' => LogoutController::class,
    ]);

    Route::group([
        'as' => 'todos.',
        'prefix' => '',
    ], function () {
        Route::post('/todos', [
            'as' => 'create',
            'uses' => CreateTodoController::class,
        ]);
        Route::get('/todos', [
            'as' => 'list',
            'uses' => ListTodoController::class,
        ]);
        Route::put('/todos/{id}', [
            'as' => 'update',
            'uses' => EditTodoController::class,
        ]);
        Route::get('/todos/{id}', [
            'as' => 'show',
            'uses' => ShowTodoController::class,
        ]);
        Route::delete('/todos/{id}', [
            'as' => 'delete',
            'uses' => DeleteTodoController::class,
        ]);
    });
});
