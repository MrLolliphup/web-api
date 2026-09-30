<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ServiceTypeCategoryController;
use App\Http\Controllers\ServiceTypeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;



// public routes
Route::prefix('auth')->group(function () {
    Route::post('/register', [UserController::class, 'store']);
    Route::post('/login', [UserController::class, 'login']);
});




//protected admiin routes
Route::middleware("auth:api")->group(function () {
    Route::get('/users', [UserController::class, 'index']);

    Route::get('/users/{user}', [UserController::class, 'show']);

    Route::post('/users', [UserController::class, 'store']);
    Route::put('/users/{user}', [UserController::class, 'update']);
    Route::delete('/users/{user}', [UserController::class, 'destroy']);

    Route::get('/products', [ProductController::class, 'index']);
    Route::get('/products/{product}', [ProductController::class, 'show']);
    Route::post('/products', [ProductController::class, 'store']);
    Route::put('/products/{product}', [ProductController::class, 'update']);
    Route::delete('/products/{product}', [ProductController::class, 'destroy']);

    Route::apiResource('posts', PostController::class);

    Route::apiResource('services', ServiceController::class);

    Route::get('/users/{user}/services', [ServiceController::class, 'getUserServices']);
    Route::get('/users/{user}/services/{service}', [ServiceController::class, 'getUserService']);

    Route::apiResource('service-type-categories', ServiceTypeCategoryController::class);
    Route::apiResource('service-types', ServiceTypeController::class);
});

//user specific routes
Route::middleware('auth:api')->group(function () {

    Route::get('/user', [UserController::class, 'getAuthenticatedUser']);
    Route::patch('/user', [UserController::class, 'updateAuthenticatedUser']);
    Route::delete('/user', [UserController::class, 'deleteAuthenticatedUser']);

    Route::get('/user/services', [ServiceController::class, 'getAuthUserServices']);
    Route::get('/user/services/{service}', [ServiceController::class, 'getAuthUserService']);
    Route::post('/user/services', [ServiceController::class, 'createAuthUserService']);
    

    Route::get('/logout', [UserController::class, 'logout']);
});






// Route::get(/)