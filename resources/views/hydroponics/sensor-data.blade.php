@extends('layouts.app')

@section('title', 'Hydroponics Sensor Data')

@section('content')
    <div class="max-w-5xl mx-auto p-6">
        <h1 class="text-3xl font-bold mb-6 text-center text-gray-700">Hydroponics Sensor Data</h1>

        @if($sensorData)
            <div class="overflow-x-auto bg-white shadow-md rounded-lg">
                <table class="min-w-full text-sm text-left border-collapse">
                    <thead class="bg-gray-200 text-gray-600 uppercase tracking-wide text-xs">
                        <tr>
                            <th class="px-6 py-3">#</th>
                            <th class="px-6 py-3">Temperature (°C)</th>
                            <th class="px-6 py-3">Humidity (%)</th>
                            <th class="px-6 py-3">Timestamp</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach($sensorData as $key => $reading)
                            <tr class="hover:bg-gray-100 transition">
                                <td class="px-6 py-4 font-medium">{{ $key }}</td>
                                <td class="px-6 py-4">{{ $reading['temperature'] ?? 'N/A' }}</td>
                                <td class="px-6 py-4">{{ $reading['humidity'] ?? 'N/A' }}</td>
                                <td class="px-6 py-4">{{ $reading['timestamp'] ?? 'N/A' }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="text-center text-gray-600 mt-10">
                <p class="text-lg">No sensor data found.</p>
            </div>
        @endif
    </div>
@endsection
