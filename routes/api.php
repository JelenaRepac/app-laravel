<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\PresenterController;
use App\Http\Controllers\StudioController;
use App\Http\Controllers\TVShowController;
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


//routes for Presenter

Route::resource("presenters", PresenterController::class)->only(['index']);

//routes for Studio

Route::resource("studios", StudioController::class)->only(['index']);


//routes for TVShow

Route::resource("tvshows", TVShowController::class)->only(['index']);
Route::get('/tvshows/search/{name}', [TVShowController::class, 'search']);

//route for registration
Route::post('/register', [AuthController::class, 'register']);

//route for login
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/profile', function (Request $request) {
        return auth()->user();
    });


    // Route::get("presenters/{id}", [PresenterController::class, 'show']);
    // Route::put("presenters/{id}", [PresenterController::class, "update"]);
    Route::resource("presenters", PresenterController::class)->only(['store', 'update', 'show', 'destroy']);

    // Route::get("studios/{id}", [StudioController::class, 'show']);
    // Route::put("studios/{id}", [StudioController::class, "update"]);
    Route::resource("studios", StudioController::class)->only(['store', 'update', 'show', 'destroy']);

    //Route::get("tvshows/{id}", [TVShowController::class, 'show']);
    // Route::put("tvshows/{id}", [TVShowController::class, "update"]);
    Route::resource("tvshows", TVShowController::class)->only(['store', 'update', 'show']);

    Route::post('/logout', [AuthController::class, 'logout']);
});