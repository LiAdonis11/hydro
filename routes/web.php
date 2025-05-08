<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HydroponicsController;
use App\Http\Controllers\SensorController;

// Route::get('/sensor-readings', [HydroponicsController::class, 'showSensorData']);

// Route::get('/data-analytics', [HydroponicsController::class, 'dataAnalytics']);
Route::get('/', [HydroponicsController::class, 'dht11']);
Route::get('/sensors/ph4502c', [HydroponicsController::class, 'ph4502c']);
Route::get('/sensors/dht11', [HydroponicsController::class, 'dht11']);
Route::get('/sensors/hc_sr04', [HydroponicsController::class, 'hc_sr04']);
Route::get('/about', [HydroponicsController::class, 'about']);

Route::get('/dht11', [SensorController::class, 'showDHT11']);
Route::get('/hc_sr04', [SensorController::class, 'showHCSR04']);
Route::get('/ph4502c', [SensorController::class, 'showPH4502C']);

