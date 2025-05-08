<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\DHT11Reading;
use App\Models\HCSR04Reading;
use App\Models\PH4502CReading;

class SensorController extends Controller
{
    public function showDHT11() {
        $reading = DHT11Reading::latest()->first();
        return view('hydroponics.dht11', compact('reading'));
    }

    public function showHCSR04() {
        $reading = HCSR04Reading::latest()->first();
        return view('hydroponics.hc_sr04', compact('reading'));
    }

    public function showPH4502C() {
        $reading = PH4502CReading::latest()->first();
        return view('hydroponics.ph4502c', compact('reading'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'ph' => 'required|numeric',
            'temperature' => 'required|numeric',
            'humidity' => 'required|numeric',
            'water_level' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => 'Invalid sensor data', 'details' => $validator->errors()], 400);
        }

        // Store pH value
        PH4502CReading::create([
            'ph_value' => $request->input('ph'),
        ]);

        // Store temperature and humidity
        DHT11Reading::create([
            'temperature' => $request->input('temperature'),
            'humidity' => $request->input('humidity'),
        ]);

        // Store water level (distance)
        HCSR04Reading::create([
            'distance' => $request->input('water_level'),
        ]);

        return response()->json(['message' => 'Sensor data stored successfully']);
    }
}
