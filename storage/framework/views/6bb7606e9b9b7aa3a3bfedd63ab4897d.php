<?php $__env->startSection('title', 'PH-4502C Liquid PH Sensor Dashboard'); ?>

<?php $__env->startSection('content'); ?>
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <!-- Dashboard Header -->
    <div class="bg-gradient-to-r from-teal-600 to-green-700 rounded-lg shadow-lg mb-6 p-6">
        <div class="flex flex-col md:flex-row justify-between items-center">
            <div class="text-white mb-4 md:mb-0">
                <h1 class="text-3xl font-bold">PH-4502C Sensor Dashboard</h1>
                <p class="text-teal-100">Real-time Liquid pH Level Monitoring System</p>
            </div>
            <div class="flex space-x-2">
                <button class="bg-white text-teal-600 px-4 py-2 rounded-md shadow hover:bg-teal-50 transition font-medium">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                    </svg>
                    Refresh
                </button>
                <button class="bg-white text-teal-600 px-4 py-2 rounded-md shadow hover:bg-teal-50 transition font-medium">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                    Export
                </button>
            </div>
        </div>
    </div>

    <?php if($sensorData && count($sensorData) > 0): ?>
        <!-- Current pH Value Card -->
        <div class="mb-8">
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <div class="bg-teal-500 px-4 py-2">
                    <h3 class="text-white font-medium">Current pH Level</h3>
                </div>
                <div class="p-6 flex items-center">
                    <div class="bg-teal-100 p-3 rounded-full mr-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-teal-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
                        </svg>
                    </div>
                    <div>
                        <?php
                            $latestReading = end($sensorData);
                            $phValue = $latestReading['ph'] ?? 'N/A';

                            $phStatus = 'Neutral';
                            $statusColor = 'text-green-600';

                            if ($phValue !== 'N/A') {
                                if ($phValue < 6.5) {
                                    $phStatus = 'Acidic';
                                    $statusColor = 'text-red-600';
                                } elseif ($phValue > 8.5) {
                                    $phStatus = 'Alkaline';
                                    $statusColor = 'text-blue-600';
                                }
                            }
                        ?>
                        <span class="block text-4xl font-bold"><?php echo e($phValue); ?></span>
                        <div class="flex items-center mt-1">
                            <span class="text-gray-500 text-sm mr-2">Status:</span>
                            <span class="font-medium <?php echo e($statusColor); ?>"><?php echo e($phStatus); ?></span>
                        </div>
                        <span class="text-gray-500 text-sm block mt-1">Last updated: <?php echo e($latestReading['timestamp'] ?? 'N/A'); ?></span>
                    </div>
                </div>
            </div>
        </div>

        <!-- pH Scale Visualization -->
        <div class="bg-white rounded-lg shadow-md p-6 mb-8">
            <h3 class="text-lg font-semibold text-gray-800 mb-4">pH Scale Visualization</h3>
            <div class="relative h-16">
                <!-- pH Scale Gradient -->
                <div class="absolute inset-0 rounded-lg overflow-hidden">
                    <div class="h-full w-full bg-gradient-to-r from-red-500 via-yellow-400 via-green-500 to-blue-600"></div>
                </div>

                <!-- pH Value Markers -->
                <div class="absolute inset-0 flex justify-between px-2 items-center text-xs font-medium text-white">
                    <span>0</span>
                    <span>1</span>
                    <span>2</span>
                    <span>3</span>
                    <span>4</span>
                    <span>5</span>
                    <span>6</span>
                    <span>7</span>
                    <span>8</span>
                    <span>9</span>
                    <span>10</span>
                    <span>11</span>
                    <span>12</span>
                    <span>13</span>
                    <span>14</span>
                </div>

                <!-- Current pH Value Indicator -->
                <?php if($phValue !== 'N/A'): ?>
                    <?php
                        $indicatorPosition = min(100, max(0, ($phValue / 14) * 100));
                    ?>
                    <div class="absolute top-0 h-16 flex items-center" style="left: <?php echo e($indicatorPosition); ?>%;">
                        <div class="h-20 w-1 bg-black"></div>
                        <div class="absolute -top-6 transform -translate-x-1/2 bg-gray-800 text-white px-2 py-1 rounded text-xs">
                            pH <?php echo e($phValue); ?>

                        </div>
                    </div>
                <?php endif; ?>
            </div>
            <div class="mt-6 grid grid-cols-3 text-center text-sm">
                <div class="text-red-600 font-medium">Acidic (0-6.5)</div>
                <div class="text-green-600 font-medium">Neutral (6.5-8.5)</div>
                <div class="text-blue-600 font-medium">Alkaline (8.5-14)</div>
            </div>
        </div>

        <!-- Data Table -->
        <div class="bg-white shadow-md rounded-lg overflow-hidden mb-8">
            <div class="border-b border-gray-200 px-6 py-4 bg-gray-50 flex justify-between items-center">
                <h2 class="text-lg font-semibold text-gray-800">pH Measurement History</h2>
                <div class="flex items-center">
                    <div class="relative">
                        <input type="text" placeholder="Search..." class="pl-8 pr-4 py-2 border rounded-md focus:ring-2 focus:ring-teal-600 focus:border-teal-600 focus:outline-none">
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
                                    pH Value
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
                            <?php
                                $phValue = $reading['ph'] ?? 'N/A';
                                $statusClass = 'bg-green-100 text-green-800';
                                $statusText = 'Neutral';
                                $dotColor = 'bg-green-500';

                                if ($phValue !== 'N/A') {
                                    if ($phValue < 6.5) {
                                        $statusClass = 'bg-red-100 text-red-800';
                                        $statusText = 'Acidic';
                                        $dotColor = 'bg-red-500';
                                    } elseif ($phValue > 8.5) {
                                        $statusClass = 'bg-blue-100 text-blue-800';
                                        $statusText = 'Alkaline';
                                        $dotColor = 'bg-blue-500';
                                    }
                                }
                            ?>
                            <tr class="hover:bg-gray-50 transition">
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900"><?php echo e($key + 1); ?></td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                    <span class="inline-flex items-center">
                                        <span class="h-2 w-2 rounded-full <?php echo e($dotColor); ?> mr-2"></span>
                                        <?php echo e($phValue); ?>

                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><?php echo e($reading['timestamp'] ?? 'N/A'); ?></td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 py-1 text-xs font-semibold rounded-full <?php echo e($statusClass); ?>">
                                        <?php echo e($statusText); ?>

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

        <!-- Data Visualization -->
        <div class="bg-white rounded-lg shadow-md p-6">
            <h3 class="text-lg font-semibold text-gray-800 mb-4">pH Level Trend</h3>
            <div class="chart-container" style="position: relative; height:300px; width:100%">
                <!-- pH trend chart would be rendered here with JavaScript -->
                <div class="flex items-center justify-center h-full bg-gray-50 rounded">
                    <p class="text-gray-500">pH level trend chart would render here</p>
                </div>
            </div>
        </div>
    <?php else: ?>
        <!-- Empty State -->
        <div class="bg-white shadow-md rounded-lg p-10 text-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-gray-400 mx-auto mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
            </svg>
            <h2 class="text-xl font-semibold text-gray-700 mb-2">No pH Data Available</h2>
            <p class="text-gray-500 mb-6">There's currently no data from your PH-4502C liquid pH sensor.</p>
            <button class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-teal-600 hover:bg-teal-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-500">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                </svg>
                Check Connection
            </button>
        </div>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<!-- Add this section to your layouts.app or include it in a separate file -->
<?php $__env->startSection('scripts'); ?>
<script>
    // Code to initialize pH trend chart would go here
    // Using Chart.js or similar library
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\hydroponics-api\resources\views/hydroponics/ph4502c.blade.php ENDPATH**/ ?>