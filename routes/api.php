<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\TarefaController;


Route::apiResource('tarefas', TarefaController::class);
 