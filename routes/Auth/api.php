<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\Auth\AuthController;

/*==******************************************==
 ==*********=Admin==Auth=routs=***************==
 ==******************************************==*/

Route::post('/tokens/create', [ AuthController::class , 'login' ] )->name('auth.login');

Route::middleware('auth:sanctum')->group( function(){

    Route::post('/tokens/logout', [ AuthController::class , 'logout' ] )->name('auth.logout');

    Route::post('/tokens/logout/all', [ AuthController::class , 'logoutAll' ] )->name('auth.logout-all');

    Route::post('/tokens/logout/all/except', [ AuthController::class , 'logoutAllExcept' ] )->name('auth.logout-all-except');
});
