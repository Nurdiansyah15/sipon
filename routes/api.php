<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\v1\UserController;
use App\Http\Controllers\API\v1\SantriController;


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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


//auth
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']); //user logout

Route::post('/user', [UserController::class, 'create']); //cretae one user

Route::prefix('v1')->group(function () {
    Route::middleware('auth:sanctum')->group(function () {
        //user
        Route::get('/user', [UserController::class, 'index']); //get all user
        Route::get('/user/{id}', [UserController::class, 'show']); //get one user with id
        Route::put('/user/{id}', [UserController::class, 'update']); //update one user with id
        Route::delete('/user/{id}', [UserController::class, 'destroy']); //destroy one user with id
        //santri
        Route::get('/santri', [SantriController::class, 'index']);
        Route::get('/santri/{nis}', [SantriController::class, 'show']);
        Route::post('/santri', [SantriController::class, 'create']);
        Route::put('/santri/{nis}', [SantriController::class, 'update']);
        // Route::delete('/santri/{nis}', [SantriController::class, 'destroy']);
    });
});


//doc etc
Route::get('/user/search/{name}', [UserController::class, 'search']);
Route::get('/santri/search/{name}', [SantriController::class, 'search']);
