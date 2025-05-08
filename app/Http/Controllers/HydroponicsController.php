<?php

namespace App\Http\Controllers;

use App\Models\DHT11Reading;
use App\Models\HCSR04Reading;
use App\Models\PH4502CReading;

class HydroponicsController extends Controller
{
    // Fetch data from Hostinger database using Eloquent models
    public function getSensorReadings()
    {
        $dht11 = DHT11Reading::latest()->first();
        $hc_sr04 = HCSR04Reading::latest()->first();
        $ph4502c = PH4502CReading::latest()->first();

        $data = [
            'dht11' => $dht11,
            'hc_sr04' => $hc_sr04,
            'ph4502c' => $ph4502c,
        ];

        if ($data) {
            return response()->json([
                'status' => 'success',
                'data' => $data
            ]);
        }

        return response()->json([
            'status' => 'error',
            'message' => 'Failed to fetch data from Hostinger database.'
        ]);
    }

    public function ph4502c()
    {
        return view('hydroponics.ph4502c', ['sensorData' => []]);
    }

    public function about()
    {
        return view('hydroponics.about');
    }

    public function dht11()
    {
        $data = DHT11Reading::latest()->first();
        return view('hydroponics.dht11', ['sensorData' => $data]);
    }

    public function hc_sr04()
    {
        return view('hydroponics.hc_sr04', ['sensorData' => []]);
    }

    public function dataAnalytics()
    {
        $data = DHT11Reading::latest()->first();
        return view('hydroponics.data_analytics', ['sensorData' => $data]);
    }
}
