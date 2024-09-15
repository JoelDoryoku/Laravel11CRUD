<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Route to get all procedures
Route::get('/procedures', 'App\Http\Controllers\ProcedureController@getProcedures');

// Route to get a procedure by status
Route::get('/procedures/status/{status}', 'App\Http\Controllers\ProcedureController@getProcedureByStatus');

// Route to get a procedure by type
Route::get('/procedures/type/{type}', 'App\Http\Controllers\ProcedureController@getProcedureByType');

// Route to get a procedure by client
Route::get('/procedures/client/{client}', 'App\Http\Controllers\ProcedureController@getProcedureByClient');