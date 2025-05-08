<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HydroponicsController;
use App\Http\Controllers\SensorController;

// Test route
Route::get('/test', function() {
    return response()->json(['message' => 'API is working']);
});

Route::get('/firebase-sensors', [HydroponicsController::class, 'getSensorReadings']);
Route::apiResource('sensors', SensorController::class);

Route::post('/sensor-data', [SensorController::class, 'store']);



