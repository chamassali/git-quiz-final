<?php

use App\Http\Controllers\Api\QuizController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\ChoiceController;
use App\Http\Controllers\ScoreController;
use App\Models\Quiz;
use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::get('/user-profile', [AuthController::class, 'userProfile']);    
});

Route::group([
    'middleware' => 'api',
    'prefix' => 'quiz'
], function ($router) {

    Route::get('', [QuizController::class, 'index']);
    Route::post('', [QuizController::class, 'store']);
    Route::put('/{quiz}', [QuizController::class, 'update']);
    Route::get('/{id}', [QuizController::class, 'show']);
    Route::delete('/{id}', [QuizController::class, 'delete']);
    Route::post('/{id}/publish', [QuizController::class, 'publish']);
    Route::post('/{id}/unpublish', [QuizController::class, 'unpublish']);
    Route::get('/{id}/questions', [QuestionController::class, 'index']);

});

Route::get('/question/{questionId}/choices', [ChoiceController::class, 'index']);

Route::get('/user/{userId}', [QuizController::class, 'getUser']);



Route::group([
    'middleware' => 'api',
    'prefix' => 'score'
], function ($router) {

    Route::get('/', [ScoreController::class, 'index']);
    Route::post('/', [ScoreController::class, 'addScore']);

});



