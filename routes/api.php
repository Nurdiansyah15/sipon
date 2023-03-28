<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\v1\PSB\PsbSettingController;
use App\Http\Controllers\API\v1\PSB\RegisterController;
use App\Http\Controllers\API\v1\UserController;
use App\Http\Controllers\API\v1\SantriController;
use App\Http\Controllers\API\v1\Security\SecActsController;
use App\Http\Controllers\API\v1\Security\SecActsPermitsController;

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


//auth api hanya digunakan untuk request aplikasi mobile
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);




Route::prefix('v1')->group(function () {
    Route::middleware(['api_key'])->group(function () {
        //psb
        Route::prefix('psb')->group(function () {
            Route::get('/register', [RegisterController::class, 'index']); //( sudah )
            Route::post('/register', [RegisterController::class, 'create']); //( sudah )
            Route::put('/register/{id}', [RegisterController::class, 'update']); //( sudah )
            Route::get('/setting/{id}', [PsbSettingController::class, 'show']); //( sudah )
        });
    });
    Route::middleware('auth:sanctum')->group(function () {
        //token check
        Route::get('/token', function () {
            return response('Valid', 200); // sudah
        });

        //user 
        Route::get('/user', [UserController::class, 'index']); //get all user ( sudah )
        Route::get('/user/{id}', [UserController::class, 'show']); //get one user with id  ( sudah )
        // Route::post('/user', [UserController::class, 'create']); //cretae one user ( sudah )
        // Route::put('/user/{id}', [UserController::class, 'update']); //update one user with id ( sudah )
        //santri
        Route::get('/santri', [SantriController::class, 'index']); // ( sudah )
        Route::get('/santri/pa', [SantriController::class, 'boys']); // ( sudah )
        Route::get('/santri/pi', [SantriController::class, 'girls']); // ( sudah )
        Route::post('/santri', [SantriController::class, 'create']); //( sudah ) data required username
        Route::get('/santri/{nis}', [SantriController::class, 'show']); //(sudah)
        Route::put('/santri/{nis}', [SantriController::class, 'update']); // ( sudah )
        Route::delete('/santri/{nis}', [SantriController::class, 'destroy']); //destroy one santri his user ( sudah )
        //psb
        Route::prefix('psb')->group(function () {
            Route::get('/register/{id}', [RegisterController::class, 'show']); //( sudah )
            Route::delete('/register/{id}', [RegisterController::class, 'destroy']); //( sudah )
            Route::get('/setting', [PsbSettingController::class, 'index']); //( sudah )
            Route::post('/setting', [PsbSettingController::class, 'create']); //( sudah )
            Route::put('/setting/{id}', [PsbSettingController::class, 'update']); //( sudah )
            Route::delete('/setting/{id}', [PsbSettingController::class, 'destroy']); //( sudah )
        });
        //security
        Route::prefix('sec')->group(function () {
            Route::get('/permits', [SecActsPermitsController::class, 'index']); //( sudah )
            Route::post('/permits', [SecActsPermitsController::class, 'create']); //( sudah )
            Route::get('/permits/{id}', [SecActsPermitsController::class, 'show']); //( sudah )
            Route::put('/permits/{id}', [SecActsPermitsController::class, 'update']); //( sudah )
            Route::delete('/permits/{id}', [SecActsPermitsController::class, 'destroy']); //( sudah )
            Route::get('/acts', [SecActsController::class, 'index']); //( sudah )
            Route::post('/acts', [SecActsController::class, 'create']); //( sudah )
            Route::get('/acts/{id}', [SecActsController::class, 'show']); //( sudah )
            Route::put('/acts/{id}', [SecActsController::class, 'update']); //( sudah )
            Route::delete('/acts/{id}', [SecActsController::class, 'destroy']); //( sudah )
        });
    });
});


//doc etc
Route::get('/user/search/{name}', [UserController::class, 'search']);
Route::get('/santri/search/{name}', [SantriController::class, 'search']);
