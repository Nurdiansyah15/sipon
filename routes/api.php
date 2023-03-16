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


//auth api hanya digunakan untuk request aplikasi mobile
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);


Route::prefix('v1')->group(function () {
    Route::middleware('auth:sanctum')->group(function () {
        //token check
        Route::get('/token', function () {
            return response('Valid', 200); // sudah
        });

        //user
        Route::get('/user', [UserController::class, 'index']); //get all user ( sudah )
        Route::post('/user', [UserController::class, 'create']); //cretae one user ( sudah )
        Route::get('/user/{id}', [UserController::class, 'show']); //get one user with id  ( sudah )
        Route::put('/user/{id}', [UserController::class, 'update']); //update one user with id ( sudah )
        Route::delete('/user/{id}', [UserController::class, 'destroy']); //destroy one user with id ( sudah )
        //santri
        Route::get('/santri', [SantriController::class, 'index']); // ( sudah )
        Route::post('/santri', [SantriController::class, 'create']); //( sudah )
        Route::get('/santri/{nis}', [SantriController::class, 'show']); //(sudah)
        Route::put('/santri/{nis}', [SantriController::class, 'update']); // ( sudah )
    });
});


//doc etc
Route::get('/user/search/{name}', [UserController::class, 'search']);
Route::get('/santri/search/{name}', [SantriController::class, 'search']);
