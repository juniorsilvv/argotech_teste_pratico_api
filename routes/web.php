<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoListController;
use App\Http\Middleware\AuthMiddleware;

Route::prefix('api')
->middleware(AuthMiddleware::class)
->controller(TodoListController::class)
->group(function(){
    Route::get('/all', 'all');
    Route::post('/create', 'create');
    Route::put('/update/{id}', 'update');
    Route::put('update/status/{id}', 'updateStatus');
    Route::delete('/delete/{id}', 'delete');
});