<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoListController;
use App\Http\Middleware\AuthMiddleware;

Route::prefix('api')
->middleware(AuthMiddleware::class)
->controller(TodoListController::class)
->group(function(){
    Route::get('/all', 'all'); // Lista todas as tarefas
    Route::post('/create', 'create'); // Cria uma tarefa
    Route::put('/update/{id}', 'update'); // Atualiza uma tarefa
    Route::put('update/status/{id}', 'updateStatus'); // Muda o status de uma tarefa
    Route::delete('/delete/{id}', 'delete'); // Apaga uma tarefa
});