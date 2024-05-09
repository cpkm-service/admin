<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::middleware(['backend'])
    ->prefix('example')
    ->name('example.')
    ->namespace('Cpkm\Admin\Http\Controllers\Example')->group(function(){
        /* Input */
        Route::resource('input', InputController::class);
        /* Radio */
        Route::resource('radio', RadioController::class);
        /* Checkbox */
        Route::resource('checkbox', CheckboxController::class);
    });