<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $__env->yieldContent('title', 'HydroMonitor'); ?></title>

    <!-- Tailwind & Fonts -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-annotation@2.0.1"></script>

    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
        .dashboard-card {
            @apply bg-white rounded-xl shadow hover:shadow-md transition p-4 border border-gray-100;
        }
        .data-table {
            @apply w-full divide-y divide-gray-200;
        }
        .data-table th {
            @apply px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase;
        }
        .data-table td {
            @apply px-6 py-4 text-sm text-gray-700 whitespace-nowrap;
        }
    </style>
</head>
<body class="bg-gray-50 min-h-screen">

<!-- Layout Wrapper -->
<div class="flex">

    <!-- Sidebar -->
    <aside class="w-64 bg-white h-screen border-r fixed top-0 left-0 overflow-y-auto shadow-sm">
        <div class="p-6">
            <!-- Brand -->
            <div class="flex items-center gap-3 mb-8">
                <div class="w-9 h-9 bg-indigo-600 rounded-lg flex items-center justify-center text-white font-bold">H</div>
                <h1 class="text-xl font-semibold text-gray-800">HydroMonitor</h1>
            </div>

            <!-- Navigation -->
            <nav class="space-y-2">


                <p class="text-xs font-medium text-gray-400 px-4 pt-4">SENSORS</p>

                <a href="<?php echo e(url('/sensors/ph4502c')); ?>" class="flex items-center gap-3 px-4 py-2 rounded-lg hover:bg-indigo-50 text-gray-600 <?php if(request()->is('sensors/ph4502c')): ?> bg-indigo-100 text-indigo-700 <?php endif; ?>">
                    <i class='bx bx-test-tube text-xl'></i> PH Sensor
                </a>
                <a href="<?php echo e(url('/sensors/dht11')); ?>" class="flex items-center gap-3 px-4 py-2 rounded-lg hover:bg-indigo-50 text-gray-600 <?php if(request()->is('sensors/dht11')): ?> bg-indigo-100 text-indigo-700 <?php endif; ?>">
                    <i class='bx bx-wind text-xl'></i> Temp & Humidity
                </a>
                <a href="<?php echo e(url('/sensors/hc_sr04')); ?>" class="flex items-center gap-3 px-4 py-2 rounded-lg hover:bg-indigo-50 text-gray-600 <?php if(request()->is('sensors/hc_sr04')): ?> bg-indigo-100 text-indigo-700 <?php endif; ?>">
                    <i class='bx bx-ruler text-xl'></i> Ultrasonic Sensor
                </a>

                <p class="text-xs font-medium text-gray-400 px-4 pt-6">OTHER</p>

                <a href="<?php echo e(url('/about')); ?>" class="flex items-center gap-3 px-4 py-2 rounded-lg hover:bg-indigo-50 text-gray-600 <?php if(request()->is('about')): ?> bg-indigo-100 text-indigo-700 <?php endif; ?>">
                    <i class='bx bx-info-circle text-xl'></i> About Us
                </a>
            </nav>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="ml-64 flex-1 p-8">
        <?php echo $__env->yieldContent('content'); ?>
    </main>
</div>

<!-- Scripts -->
<script>
    Chart.register(window['chartjs-plugin-annotation']);

    const echo = new Echo({
        broadcaster: 'pusher',
        key: '<?php echo e(env('PUSHER_APP_KEY')); ?>',
        cluster: '<?php echo e(env('PUSHER_APP_CLUSTER')); ?>',
        encrypted: true
    });

    echo.channel('sensor-data')
        .listen('SensorDataUpdated', (data) => {
            updateDashboard(data);
        });

    function updateDashboard(data) {
        updateCard('ph', data.ph);
        updateCard('temp', data.temperature);
        updateCard('humidity', data.humidity);
        updateCard('distance', data.distance);

        updateChart('phChart', data);
        updateChart('tempChart', data);
        updateChart('humidityChart', data);
        updateChart('distanceChart', data);
    }

    function updateCard(sensorType, value) {
        const card = document.getElementById(`${sensorType}-card`);
        const valueEl = card.querySelector('.current-value');
        const statusEl = card.querySelector('.status-indicator');

        valueEl.textContent = value.toFixed(2);
        statusEl.className = `status-indicator w-2 h-2 rounded-full ${getStatusColor(sensorType, value)}`;
    }

    function getStatusColor(sensorType, value) {
        const thresholds = {
            ph: { good: [5.5, 6.5], color: 'bg-green-500' },
            temp: { good: [18, 28], color: 'bg-green-500' },
            humidity: { good: [40, 80], color: 'bg-green-500' }
        };

        const { good, color } = thresholds[sensorType];
        return value >= good[0] && value <= good[1] ? color : 'bg-red-500';
    }

    function updateChart(chartId, data) {
        const chart = window[chartId];
        const timestamp = new Date().toLocaleTimeString();

        chart.data.labels.push(timestamp);
        chart.data.datasets.forEach((dataset) => {
            dataset.data.push(data[dataset.sensorType]);
        });

        chart.update();
    }
</script>
<?php echo $__env->yieldContent('scripts'); ?>

</body>
</html>
<?php /**PATH C:\xampp\htdocs\laravel\hydroponics-api\resources\views/layouts/app.blade.php ENDPATH**/ ?>