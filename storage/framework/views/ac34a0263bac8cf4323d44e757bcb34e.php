<?php $__env->startSection('title', 'Data Analytics'); ?>

<?php $__env->startSection('content'); ?>
<div class="space-y-8">
    <!-- Header -->
    <div class="flex justify-between items-center">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Hydroponics Analytics</h1>
            <p class="text-gray-500 mt-1">Real-time monitoring dashboard</p>
        </div>
        <div class="flex gap-3">
            <button class="px-4 py-2 bg-white border border-gray-200 rounded-lg flex items-center gap-2 hover:bg-gray-50">
                <i class='bx bx-filter-alt'></i>
                Filters
            </button>
            <button class="px-4 py-2 bg-indigo-600 text-white rounded-lg flex items-center gap-2 hover:bg-indigo-700">
                <i class='bx bx-download'></i>
                Export
            </button>
        </div>
    </div>

    <!-- Sensor Dashboards Grid -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- DHT11 Sensor Dashboard -->
        <div class="bg-white rounded-lg shadow-md p-6">
            <h2 class="text-xl font-semibold mb-4">DHT11 Sensor Dashboard</h2>
            <?php if($sensorData && count($sensorData) > 0): ?>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <!-- Temperature Card -->
                    <div class="bg-red-100 rounded-lg p-4 flex items-center">
                        <div class="bg-red-500 p-3 rounded-full mr-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                            </svg>
                        </div>
                        <div>
                            <span class="block text-4xl font-bold"><?php echo e(end($sensorData)['temperature'] ?? 'N/A'); ?>°C</span>
                            <span class="text-gray-700 text-sm">Last updated: <?php echo e(end($sensorData)['timestamp'] ?? 'N/A'); ?></span>
                        </div>
                    </div>
                    <!-- Humidity Card -->
                    <div class="bg-blue-100 rounded-lg p-4 flex items-center">
                        <div class="bg-blue-500 p-3 rounded-full mr-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
                            </svg>
                        </div>
                        <div>
                            <span class="block text-4xl font-bold"><?php echo e(end($sensorData)['humidity'] ?? 'N/A'); ?>%</span>
                            <span class="text-gray-700 text-sm">Last updated: <?php echo e(end($sensorData)['timestamp'] ?? 'N/A'); ?></span>
                        </div>
                    </div>
                </div>

                <!-- Sensor Data Table -->
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">#</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Temperature (°C)</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Humidity (%)</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Timestamp</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <?php $__currentLoopData = $sensorData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $reading): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr class="hover:bg-gray-50 transition">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900"><?php echo e($key); ?></td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"><?php echo e($reading['temperature'] ?? 'N/A'); ?></td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"><?php echo e($reading['humidity'] ?? 'N/A'); ?></td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><?php echo e($reading['timestamp'] ?? 'N/A'); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            <?php else: ?>
                <div class="text-center text-gray-600 py-10">
                    <p>No DHT11 sensor data available.</p>
                </div>
            <?php endif; ?>
        </div>

        <!-- PH-4502C Sensor Dashboard -->
        <div class="bg-white rounded-lg shadow-md p-6">
            <h2 class="text-xl font-semibold mb-4">PH-4502C Sensor Dashboard</h2>
            <?php if($sensorData && count($sensorData) > 0): ?>
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
                <div class="mb-6 p-4 bg-teal-100 rounded-lg">
                    <div class="flex items-center">
                        <div class="bg-teal-500 p-3 rounded-full mr-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
                            </svg>
                        </div>
                        <div>
                            <span class="block text-4xl font-bold"><?php echo e($phValue); ?></span>
                            <div class="flex items-center mt-1">
                                <span class="text-gray-700 text-sm mr-2">Status:</span>
                                <span class="font-medium <?php echo e($statusColor); ?>"><?php echo e($phStatus); ?></span>
                            </div>
                            <span class="text-gray-700 text-sm block mt-1">Last updated: <?php echo e($latestReading['timestamp'] ?? 'N/A'); ?></span>
                        </div>
                    </div>
                </div>

                <!-- pH Measurement History Table -->
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">#</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">pH Value</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Timestamp</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
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
            <?php else: ?>
                <div class="text-center text-gray-600 py-10">
                    <p>No PH-4502C sensor data available.</p>
                </div>
            <?php endif; ?>
        </div>

        <!-- HC-SR04 Sensor Dashboard -->
        <div class="bg-white rounded-lg shadow-md p-6">
            <h2 class="text-xl font-semibold mb-4">HC-SR04 Sensor Dashboard</h2>
            <?php if($sensorData && count($sensorData) > 0): ?>
                <?php
                    $latestDistance = end($sensorData)['distance'] ?? 0;
                    $maxDistance = 400;
                    $percentage = min(100, ($latestDistance / $maxDistance) * 100);
                ?>
                <div class="mb-6 p-4 bg-purple-100 rounded-lg">
                    <div class="flex items-center">
                        <div class="bg-purple-500 p-3 rounded-full mr-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                            </svg>
                        </div>
                        <div>
                            <span class="block text-4xl font-bold"><?php echo e($latestDistance); ?> cm</span>
                            <span class="text-gray-700 text-sm">Last updated: <?php echo e(end($sensorData)['timestamp'] ?? 'N/A'); ?></span>
                        </div>
                    </div>
                </div>

                <div class="relative h-12 bg-gray-200 rounded-full overflow-hidden mb-6">
                    <div class="absolute top-0 left-0 h-full bg-gradient-to-r from-green-500 to-purple-500" style="width: <?php echo e($percentage); ?>%"></div>
                    <div class="absolute top-0 left-0 w-full h-full flex items-center justify-center text-sm font-medium">
                        <?php echo e($latestDistance); ?> cm
                    </div>
                </div>

                <!-- Distance Measurement History Table -->
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">#</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Distance (cm)</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Timestamp</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Proximity</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <?php $__currentLoopData = $sensorData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $reading): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
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
                                ?>
                                <tr class="hover:bg-gray-50 transition">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900"><?php echo e($key); ?></td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                        <span class="inline-flex items-center">
                                            <span class="h-2 w-2 rounded-full <?php echo e($dotColor); ?> mr-2"></span>
                                            <?php echo e($reading['distance'] ?? 'N/A'); ?> cm
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><?php echo e($reading['timestamp'] ?? 'N/A'); ?></td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 py-1 text-xs font-semibold rounded-full <?php echo e($proximityClass); ?>">
                                            <?php echo e($proximityText); ?>

                                        </span>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            <?php else: ?>
                <div class="text-center text-gray-600 py-10">
                    <p>No HC-SR04 sensor data available.</p>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <!-- Charts Section -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <!-- PH Chart -->
        <div class="dashboard-card p-4 bg-white rounded-lg shadow-md">
            <div class="flex items-center justify-between mb-4">
                <h3 class="font-medium">pH Level History</h3>
                <div class="flex items-center gap-2 text-sm">
                    <span class="w-2 h-2 rounded-full bg-indigo-600"></span>
                    <span>Last 24 hours</span>
                </div>
            </div>
            <canvas id="phChart" class="h-64"></canvas>
        </div>

        <!-- Environmental Chart -->
        <div class="dashboard-card p-4 bg-white rounded-lg shadow-md">
            <div class="flex items-center justify-between mb-4">
                <h3 class="font-medium">Environmental Conditions</h3>
                <div class="flex items-center gap-3 text-sm">
                    <div class="flex items-center gap-1">
                        <span class="w-2 h-2 rounded-full bg-red-600"></span>
                        <span>Temperature</span>
                    </div>
                    <div class="flex items-center gap-1">
                        <span class="w-2 h-2 rounded-full bg-blue-600"></span>
                        <span>Humidity</span>
                    </div>
                </div>
            </div>
            <canvas id="environmentChart" class="h-64"></canvas>
        </div>
    </div>
</div>

<script>
    // Initialize Charts
    const phChart = new Chart(document.getElementById('phChart'), {
        type: 'line',
        data: {
            labels: [],
            datasets: [{
                label: 'pH Level',
                data: [],
                borderColor: '#4F46E5',
                backgroundColor: 'rgba(79, 70, 229, 0.05)',
                borderWidth: 2,
                tension: 0.3,
                sensorType: 'ph'
            }]
        },
        options: getChartOptions()
    });

    const environmentChart = new Chart(document.getElementById('environmentChart'), {
        type: 'line',
        data: {
            labels: [],
            datasets: [
                {
                    label: 'Temperature (°C)',
                    data: [],
                    borderColor: '#EF4444',
                    backgroundColor: 'rgba(239, 68, 68, 0.05)',
                    borderWidth: 2,
                    tension: 0.3,
                    sensorType: 'temp'
                },
                {
                    label: 'Humidity (%)',
                    data: [],
                    borderColor: '#3B82F6',
                    backgroundColor: 'rgba(59, 130, 246, 0.05)',
                    borderWidth: 2,
                    tension: 0.3,
                    sensorType: 'humidity'
                }
            ]
        },
        options: getChartOptions()
    });

    function getChartOptions() {
        return {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: { position: 'bottom' },
                tooltip: { mode: 'index', intersect: false },
                annotation: {
                    annotations: {
                        phZone: {
                            type: 'box',
                            yMin: 5.5,
                            yMax: 6.5,
                            backgroundColor: 'rgba(34, 197, 94, 0.1)',
                            borderColor: 'rgba(34, 197, 94, 0.3)',
                            borderWidth: 1
                        }
                    }
                }
            },
            scales: {
                x: {
                    grid: { display: false },
                    ticks: { maxRotation: 0 }
                },
                y: {
                    grid: { color: '#f3f4f6' },
                    beginAtZero: false
                }
            }
        };
    }
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\hydroponics-api\resources\views/hydroponics/data_analytics.blade.php ENDPATH**/ ?>