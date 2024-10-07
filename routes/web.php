<?php

use App\Http\Controllers\AngularController;
use Illuminate\Support\Facades\Route;


require __DIR__.'/auth.php';
Route::any('/{any}', [AngularController::class, 'index'])->where('any', '^(?!api).*$');
