<?php $__env->startSection('title', 'DHT11 Temperature & Humidity Dashboard'); ?>

<?php $__env->startSection('content'); ?>
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <!-- Dashboard Header -->
    <div class="bg-gradient-to-r from-blue-600 to-indigo-700 rounded-lg shadow-lg mb-6 p-6">
        <div class="flex flex-col md:flex-row justify-between items-center">
            <div class="text-white mb-4 md:mb-0">
                <h1 class="text-3xl font-bold">DHT11 Sensor Dashboard</h1>
                <p class="text-blue-100">Temperature and Humidity Monitoring System</p>
            </div>
            <div class="flex space-x-2">
                <button class="bg-white text-blue-600 px-4 py-2 rounded-md shadow hover:bg-blue-50 transition font-medium">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                    </svg>
                    Refresh
                </button>
                <button class="bg-white text-blue-600 px-4 py-2 rounded-md shadow hover:bg-blue-50 transition font-medium">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                    Export
                </button>
            </div>
        </div>
    </div>

    <?php if($sensorData): ?>
        <!-- Current Values Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
            <!-- Temperature Card -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <div class="bg-red-500 px-4 py-2">
                    <h3 class="text-white font-medium">Temperature</h3>
                </div>
                <div class="p-6 flex items-center">
                    <div class="bg-red-100 p-3 rounded-full mr-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                        </svg>
                    </div>
                    <div>
                        <span class="block text-4xl font-bold"><?php echo e(end($sensorData)['temperature'] ?? 'N/A'); ?>°C</span>
                        <span class="text-gray-500 text-sm">Last updated: <?php echo e(end($sensorData)['timestamp'] ?? 'N/A'); ?></span>
                    </div>
                </div>
            </div>

            <!-- Humidity Card -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <div class="bg-blue-500 px-4 py-2">
                    <h3 class="text-white font-medium">Humidity</h3>
                </div>
                <div class="p-6 flex items-center">
                    <div class="bg-blue-100 p-3 rounded-full mr-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
                        </svg>
                    </div>
                    <div>
                        <span class="block text-4xl font-bold"><?php echo e(end($sensorData)['humidity'] ?? 'N/A'); ?>%</span>
                        <span class="text-gray-500 text-sm">Last updated: <?php echo e(end($sensorData)['timestamp'] ?? 'N/A'); ?></span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Data Table -->
        <div class="bg-white shadow-md rounded-lg overflow-hidden mb-8">
            <div class="border-b border-gray-200 px-6 py-4 bg-gray-50 flex justify-between items-center">
                <h2 class="text-lg font-semibold text-gray-800">Sensor Data History</h2>
                <div class="flex items-center">
                    <div class="relative">
                        <input type="text" placeholder="Search..." class="pl-8 pr-4 py-2 border rounded-md focus:ring-2 focus:ring-blue-600 focus:border-blue-600 focus:outline-none">
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
                                    Temperature (°C)
                                    <svg xmlns="http://www.w3.org/2000/svg" class="ml-1 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16V4m0 0L3 8m4-4l4 4m6 0v12m0 0l4-4m-4 4l-4-4" />
                                    </svg>
                                </div>
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                <div class="flex items-center">
                                    Humidity (%)
                                    <svg xmlns="http://www.w3.org/2000/svg" class="ml-1 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16V4m0 0L3 8m4-4l4 4m6 0v12m0 0l4-4m-4 4l-4-4" />
                                    </svg>
                                </div>
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Timestamp</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <?php $__currentLoopData = $sensorData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $reading): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr class="hover:bg-gray-50 transition">
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900"><?php echo e($key); ?></td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                    <span class="inline-flex items-center">
<span class="h-2 w-2 rounded-full <?php echo e((isset($reading['temperature']) && $reading['temperature'] !== null && $reading['temperature'] > 30) ? 'bg-red-500' : 'bg-green-500'); ?> mr-2"></span>
                                        <?php echo e($reading['temperature'] ?? 'N/A'); ?>°C
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                    <span class="inline-flex items-center">
<span class="h-2 w-2 rounded-full <?php echo e((isset($reading['humidity']) && $reading['humidity'] !== null && $reading['humidity'] > 70) ? 'bg-blue-500' : 'bg-green-500'); ?> mr-2"></span>
                                        <?php echo e($reading['humidity'] ?? 'N/A'); ?>%
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><?php echo e($reading['timestamp'] ?? 'N/A'); ?></td>
                                <td class="px-6 py-4 whitespace-nowrap">
<span class="px-2 py-1 text-xs font-semibold rounded-full
                                    <?php echo e(((isset($reading['temperature']) && $reading['temperature'] !== null && $reading['temperature'] > 30) || (isset($reading['humidity']) && $reading['humidity'] !== null && $reading['humidity'] > 70)) ? 'bg-yellow-100 text-yellow-800' : 'bg-green-100 text-green-800'); ?>">
                                        <?php echo e(((isset($reading['temperature']) && $reading['temperature'] !== null && $reading['temperature'] > 30) || (isset($reading['humidity']) && $reading['humidity'] !== null && $reading['humidity'] > 70)) ? 'Warning' : 'Normal'); ?>

                                    </span>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
            <div class="bg-white px-4 py-3 border-t border-gray-200 sm:px-6">
                <div class="flex items-center justify-between">
                    <div class="text-sm text-gray-700">
                        Showing <span class="font-medium">1</span> to <span class="font-medium"><?php echo e(count($sensorData)); ?></span> of <span class="font-medium"><?php echo e(count($sensorData)); ?></span> results
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
    <?php else: ?>
        <!-- Empty State -->
        <div class="bg-white shadow-md rounded-lg p-10 text-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-gray-400 mx-auto mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <h2 class="text-xl font-semibold text-gray-700 mb-2">No Sensor Data Available</h2>
            <p class="text-gray-500 mb-6">There's currently no data from your DHT11 sensor.</p>
            <button class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                </svg>
                Check Connection
            </button>
        </div>
    <?php endif; ?>

    <!-- Data Visualization -->
    <?php if($sensorData && count($sensorData) > 1): ?>
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <!-- Temperature Chart -->
            <div class="bg-white rounded-lg shadow-md p-6">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Temperature Trend</h3>
                <div class="chart-container" style="position: relative; height:300px; width:100%">
                    <!-- Temperature chart would be rendered here with JavaScript -->
                    <div class="flex items-center justify-center h-full bg-gray-50 rounded">
                        <p class="text-gray-500">Temperature chart would render here</p>
                    </div>
                </div>
            </div>

            <!-- Humidity Chart -->
            <div class="bg-white rounded-lg shadow-md p-6">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Humidity Trend</h3>
                <div class="chart-container" style="position: relative; height:300px; width:100%">
                    <!-- Humidity chart would be rendered here with JavaScript -->
                    <div class="flex items-center justify-center h-full bg-gray-50 rounded">
                        <p class="text-gray-500">Humidity chart would render here</p>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<!-- Add this section to your layouts.app or include it in a separate file -->
<?php $__env->startSection('scripts'); ?>
<script>
    // Code to initialize charts would go here
    // Using Chart.js or similar library
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\hydroponics-api\resources\views/hydroponics/dht11.blade.php ENDPATH**/ ?>