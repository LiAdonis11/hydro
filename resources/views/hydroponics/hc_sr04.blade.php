@extends('layouts.app')

@section('title', 'Ultrasonic Sensor HC-SR04 Dashboard')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <!-- Dashboard Header -->
    <div class="bg-gradient-to-r from-purple-600 to-indigo-700 rounded-lg shadow-lg mb-6 p-6">
        <div class="flex flex-col md:flex-row justify-between items-center">
            <div class="text-white mb-4 md:mb-0">
                <h1 class="text-3xl font-bold">HC-SR04 Sensor Dashboard</h1>
                <p class="text-purple-100">Ultrasonic Distance Measurement System</p>
            </div>
            <div class="flex space-x-2">
                <button class="bg-white text-purple-600 px-4 py-2 rounded-md shadow hover:bg-purple-50 transition font-medium">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                    </svg>
                    Refresh
                </button>
                <button class="bg-white text-purple-600 px-4 py-2 rounded-md shadow hover:bg-purple-50 transition font-medium">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                    Export
                </button>
            </div>
        </div>
    </div>

    @if($sensorData && count($sensorData) > 0)
        <!-- Current Distance Card -->
        <div class="mb-8">
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <div class="bg-purple-500 px-4 py-2">
                    <h3 class="text-white font-medium">Current Distance</h3>
                </div>
                <div class="p-6 flex items-center">
                    <div class="bg-purple-100 p-3 rounded-full mr-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-purple-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                    </div>
                    <div>
                        <span class="block text-4xl font-bold">{{ end($sensorData)['distance'] ?? 'N/A' }} cm</span>
                        <span class="text-gray-500 text-sm">Last updated: {{ end($sensorData)['timestamp'] ?? 'N/A' }}</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Distance Visualization -->
        <div class="bg-white rounded-lg shadow-md p-6 mb-8">
            <h3 class="text-lg font-semibold text-gray-800 mb-4">Distance Visualization</h3>
            <div class="relative h-12 bg-gray-200 rounded-full overflow-hidden">
                @php
                    $latestDistance = end($sensorData)['distance'] ?? 0;
                    $maxDistance = 400; // Maximum range of HC-SR04 is typically 400cm
                    $percentage = min(100, ($latestDistance / $maxDistance) * 100);
                @endphp
                <div class="absolute top-0 left-0 h-full bg-gradient-to-r from-green-500 to-purple-500" style="width: {{ $percentage }}%"></div>
                <div class="absolute top-0 left-0 w-full h-full flex items-center justify-center text-sm font-medium">
                    {{ $latestDistance }} cm
                </div>
            </div>
            <div class="flex justify-between mt-2 text-xs text-gray-500">
                <span>0 cm</span>
                <span>100 cm</span>
                <span>200 cm</span>
                <span>300 cm</span>
                <span>400+ cm</span>
            </div>
        </div>

        <!-- Data Table -->
        <div class="bg-white shadow-md rounded-lg overflow-hidden mb-8">
            <div class="border-b border-gray-200 px-6 py-4 bg-gray-50 flex justify-between items-center">
                <h2 class="text-lg font-semibold text-gray-800">Distance Measurement History</h2>
                <div class="flex items-center">
                    <div class="relative">
                        <input type="text" placeholder="Search..." class="pl-8 pr-4 py-2 border rounded-md focus:ring-2 focus:ring-purple-600 focus:border-purple-600 focus:outline-none">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400 absolute left-2.5 top-2.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>
                </div>
            </div>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">#</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                <div class="flex items-center">
                                    Distance (cm)
                                    <svg xmlns="http://www.w3.org/2000/svg" class="ml-1 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16V4m0 0L3 8m4-4l4 4m6 0v12m0 0l4-4m-4 4l-4-4" />
                                    </svg>
                                </div>
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Timestamp</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Proximity</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($sensorData as $key => $reading)
                            @php
                                $distance = $reading['distance'] ?? 0;
                                $proximityClass = 'bg-green-100 text-green-800';
                                $proximityText = 'Far';
                                $dotColor = 'bg-green-500';

                                if ($distance < 10) {
                                    $proximityClass = 'bg-red-100 text-red-800';
                                    $proximityText = 'Very Close';
                                    $dotColor = 'bg-red-500';
                                } elseif ($distance < 30) {
                                    $proximityClass = 'bg-yellow-100 text-yellow-800';
                                    $proximityText = 'Close';
                                    $dotColor = 'bg-yellow-500';
                                } elseif ($distance < 100) {
                                    $proximityClass = 'bg-blue-100 text-blue-800';
                                    $proximityText = 'Medium';
                                    $dotColor = 'bg-blue-500';
                                }
                            @endphp
                            <tr class="hover:bg-gray-50 transition">
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $key }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                    <span class="inline-flex items-center">
                                        <span class="h-2 w-2 rounded-full {{ $dotColor }} mr-2"></span>
                                        {{ $reading['distance'] ?? 'N/A' }} cm
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $reading['timestamp'] ?? 'N/A' }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 py-1 text-xs font-semibold rounded-full {{ $proximityClass }}">
                                        {{ $proximityText }}
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="bg-white px-4 py-3 border-t border-gray-200 sm:px-6">
                <div class="flex items-center justify-between">
                    <div class="text-sm text-gray-700">
                        Showing <span class="font-medium">1</span> to <span class="font-medium">{{ count($sensorData) }}</span> of <span class="font-medium">{{ count($sensorData) }}</span> results
                    </div>
                    <div class="flex-1 flex justify-between sm:justify-end">
                        <a href="#" class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 disabled:opacity-50 disabled:cursor-not-allowed">
                            Previous
                        </a>
                        <a href="#" class="ml-3 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 disabled:opacity-50 disabled:cursor-not-allowed">
                            Next
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Data Visualization -->
        <div class="bg-white rounded-lg shadow-md p-6">
            <h3 class="text-lg font-semibold text-gray-800 mb-4">Distance Trend</h3>
            <div class="chart-container" style="position: relative; height:300px; width:100%">
                <!-- Distance chart would be rendered here with JavaScript -->
                <div class="flex items-center justify-center h-full bg-gray-50 rounded">
                    <p class="text-gray-500">Distance trend chart would render here</p>
                </div>
            </div>
        </div>
    @else
        <!-- Empty State -->
        <div class="bg-white shadow-md rounded-lg p-10 text-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-gray-400 mx-auto mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
            </svg>
            <h2 class="text-xl font-semibold text-gray-700 mb-2">No Distance Data Available</h2>
            <p class="text-gray-500 mb-6">There's currently no data from your HC-SR04 ultrasonic sensor.</p>
            <button class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-purple-600 hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                </svg>
                Check Connection
            </button>
        </div>
    @endif
</div>
@endsection

<!-- Add this section to your layouts.app or include it in a separate file -->
@section('scripts')
<script>
    // Code to initialize distance trend chart would go here
    // Using Chart.js or similar library
</script>
@endsection
