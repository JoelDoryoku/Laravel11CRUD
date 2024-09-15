<?php

use App\Models\Procedure;
use App\Models\ProcedureType;
use App\Models\Client;
use App\Http\Controllers\ProcedureController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $procedures = Procedure::all();
    $procedureTypes = ProcedureType::all();
    $clients = Client::all();
    return view('procedures.index', compact('procedures', 'procedureTypes', 'clients'));
});

// Create all the routes for the procedures
Route::resource('procedures', ProcedureController::class);
