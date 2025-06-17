

<?php $__env->startSection('title', 'Dashboard Admin'); ?>

<?php $__env->startSection('content'); ?>
<div class="flex min-h-screen bg-gray-100">
    <main class="flex-1 p-8">
        <?php if(session('error')): ?>
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                <strong class="font-bold">Error!</strong>
                <span class="block sm:inline"><?php echo e(session('error')); ?></span>
            </div>
        <?php endif; ?>

        <h1 class="text-3xl font-bold text-gray-800 mb-8">Welcome Back, Admin!</h1>

        
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 mb-8">
            <div class="bg-white p-4 rounded-lg shadow">
                <div class="flex items-center">
                    <div class="flex-1">
                        <h2 class="text-gray-600">Total Users</h2>
                        <p class="text-2xl font-bold"><?php echo e($userCount); ?></p>
                    </div>
                    <i class="fas fa-users text-xl text-blue-500"></i>
                </div>
            </div>

            <div class="bg-white p-4 rounded-lg shadow">
                <div class="flex items-center">
                    <div class="flex-1">
                        <h2 class="text-gray-600">Products</h2>
                        <p class="text-2xl font-bold"><?php echo e($productCount); ?></p>
                    </div>
                    <i class="fas fa-box text-xl text-green-500"></i>
                </div>
            </div>

            <div class="bg-white p-4 rounded-lg shadow">
                <div class="flex items-center">
                    <div class="flex-1">
                        <h2 class="text-gray-600">Donations</h2>
                        <p class="text-2xl font-bold"><?php echo e($donationCount); ?></p>
                    </div>
                    <i class="fas fa-gift text-xl text-purple-500"></i>
                </div>
            </div>
        </div>

        
        <?php if(isset($donations) && $donations->count() > 0): ?>
            <div class="bg-white rounded-lg shadow overflow-hidden">
                <div class="px-4 py-3 border-b">
                    <h2 class="text-lg font-semibold text-gray-700">Recent Donations</h2>
                </div>
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500">Name</th>
                                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500">Category</th>
                                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500">Status</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            <?php $__currentLoopData = $donations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $donation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td class="px-4 py-2 whitespace-nowrap"><?php echo e($donation->name); ?></td>
                                    <td class="px-4 py-2 whitespace-nowrap"><?php echo e($donation->category->name ?? '-'); ?></td>
                                    <td class="px-4 py-2 whitespace-nowrap">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                            <?php echo e($donation->status === 'diterima' ? 'bg-green-100 text-green-800' : 
                                               ($donation->status === 'ditolak' ? 'bg-red-100 text-red-800' : 
                                               'bg-yellow-100 text-yellow-800')); ?>">
                                            <?php echo e(ucfirst($donation->status)); ?>

                                        </span>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
                <div class="px-4 py-3 border-t">
                    <?php echo e($donations->links()); ?>

                </div>
            </div>
        <?php endif; ?>
    </main>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\thingswap\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>