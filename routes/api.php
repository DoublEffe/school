<?php

use App\Http\Controllers\Api\ApiController;
use App\Http\Middleware\SetSessionTable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/subjects', [ApiController::class, 'subjects']);

Route::post('/exercise', [ApiController::class, 'exercise']);

Route::post('/answer', [ApiController::class, 'answer']);

Route::post('/classes', [ApiController::class, 'class']);

Route::post('/stuans', [ApiController::class, 'student_answer']);

Route::post('/evaluate', [ApiController::class, 'evaluation']);

Route::get('/archive', [ApiController::class, 'archive']);

Route::post('/assign', [ApiController::class, 'assign']);

Route::post('/chats', [ApiController::class, 'chats']);

Route::post('/stats', [ApiController::class, 'stats']);

Route::get('/stats', [ApiController::class, 'retriveStats']);

