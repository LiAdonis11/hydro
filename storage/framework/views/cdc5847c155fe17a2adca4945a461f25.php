<?php $__env->startSection('title', 'Hydroponics Sensor Data'); ?>

<?php $__env->startSection('content'); ?>
    <div class="max-w-5xl mx-auto p-6">
        <h1 class="text-3xl font-bold mb-6 text-center text-gray-700">Hydroponics Sensor Data</h1>

        <?php if($sensorData): ?>
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
                        <?php $__currentLoopData = $sensorData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $reading): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr class="hover:bg-gray-100 transition">
                                <td class="px-6 py-4 font-medium"><?php echo e($key); ?></td>
                                <td class="px-6 py-4"><?php echo e($reading['temperature'] ?? 'N/A'); ?></td>
                                <td class="px-6 py-4"><?php echo e($reading['humidity'] ?? 'N/A'); ?></td>
                                <td class="px-6 py-4"><?php echo e($reading['timestamp'] ?? 'N/A'); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        <?php else: ?>
            <div class="text-center text-gray-600 mt-10">
                <p class="text-lg">No sensor data found.</p>
            </div>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\hydroponics-api\resources\views/hydroponics/sensor-data.blade.php ENDPATH**/ ?>