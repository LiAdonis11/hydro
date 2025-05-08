<?php

use Illuminate\Support\Facades\Route;

Route::get('/firebase-sensors', function() {
    return view('sensors.firebase-sensors');
});
