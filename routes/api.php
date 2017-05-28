<?php

use App\Http\Controllers\Api\V1\AuthController;
use App\Http\Controllers\Api\V1\QuestionController;
use App\Http\Controllers\Api\V1\TopicController;
use App\Http\Controllers\Api\V1\UserController;
use Illuminate\Http\Request;
use Dingo\Api\Routing\Router;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('auth/token', 'Api\Auth\DefaultController@authenticate');
Route::post('auth/refresh', 'Api\Auth\DefaultController@refreshToken');

$api = app(Router::class);
$api->version('v1', function ($api) {

    $api->group(['prefix' => 'auth'], function(Router $api) {
        $api->post('login', AuthController::class.'@login');
    });
    $api->post('register', UserController::class.'@store');

    $api->group(['middleware' => ['api.auth']], function(Router $api) {
        $api->get('profile', UserController::class.'@getProfile');

        $api->resource('topic', TopicController::class);
        $api->resource('question', QuestionController::class);
    });
});
