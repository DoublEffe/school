<?php

use App\Http\Controllers\Api\ApiController;
use App\Http\Controllers\Api\ApiStudentController;
use App\Http\Controllers\Api\ApiTeacherController;
use App\Http\Middleware\SetSessionTable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


//Using controller for student routes
Route::group(['middleware' => ['web']], function (){
  Route::controller(ApiStudentController::class)->group(function() {
  
    Route::get('/subjects', 'subjects');

    Route::post('/exercise', 'exercise');
    
    Route::post('/answer', 'answer');
    
    Route::post('/chats', 'chats');
    
    Route::post('/stats', 'stats');
  });
});

//Using controller for teacher routes
Route::group(['middleware' => ['web']], function (){
  Route::controller(ApiTeacherController::class)->group(function() {
  
    Route::get('/classes',  'class');
    
    Route::post('/stuans', 'student_answer');
    
    Route::post('/evaluate', 'evaluation');
    
    Route::get('/archive', 'archive');
    
    Route::post('/assign', 'assign');
    
    Route::get('/stats', 'retriveStats');
  });
});



