

<?php $__env->startSection('title', 'Moderasi Donasi'); ?>

<?php $__env->startSection('content'); ?>
    <div class="mb-6">
        <h2 class="text-2xl font-bold text-gray-800">📬 Moderasi Donasi</h2>
    </div>

    
    <form method="GET" action="<?php echo e(route('admin.donations.index')); ?>" class="flex items-center space-x-2 mb-6">
        <label for="status" class="text-sm text-gray-700">Filter Status</label>
        <select name="status" id="status" class="border-gray-300 rounded px-3 py-2 text-sm">
            <option value="">-- Semua Status --</option>
            <option value="baru" <?php echo e(request('status') === 'baru' ? 'selected' : ''); ?>>Baru</option>
            <option value="diterima" <?php echo e(request('status') === 'diterima' ? 'selected' : ''); ?>>Diterima</option>
            <option value="ditolak" <?php echo e(request('status') === 'ditolak' ? 'selected' : ''); ?>>Ditolak</option>
        </select>
        <button type="submit" class="px-4 py-2 bg-blue-600 text-white text-sm rounded hover:bg-blue-700">
            <i class="fas fa-search mr-1"></i> Filter
        </button>
    </form>

    
    <div class="overflow-x-auto bg-white rounded shadow">
        <table class="min-w-full table-auto text-sm text-left text-gray-700">
            <thead class="bg-gray-100 text-gray-700 font-semibold">
                <tr>
                    <th class="px-4 py-3 border-b">#</th>
                    <th class="px-4 py-3 border-b">Barang</th>
                    <th class="px-4 py-3 border-b">Kategori</th>
                    <th class="px-4 py-3 border-b">Kondisi</th>
                    <th class="px-4 py-3 border-b">Deskripsi</th>
                    <th class="px-4 py-3 border-b">Foto</th>
                    <th class="px-4 py-3 border-b">Donatur</th>
                    <th class="px-4 py-3 border-b">Kontak</th>
                    <th class="px-4 py-3 border-b">Status</th>
                    <th class="px-4 py-3 border-b text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $donations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $donation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-3 border-b"><?php echo e($index + 1); ?></td>
                        <td class="px-4 py-3 border-b"><?php echo e($donation->name); ?></td>
                        <td class="px-4 py-3 border-b"><?php echo e($donation->category->name ?? '-'); ?></td>
                        <td class="px-4 py-3 border-b"><?php echo e(ucfirst($donation->condition)); ?></td>
                        <td class="px-4 py-3 border-b"><?php echo e($donation->description); ?></td>
                        <td class="px-4 py-3 border-b">
                            <?php if($donation->photo): ?>
                                <img src="<?php echo e(asset('storage/' . $donation->photo)); ?>" alt="Foto Barang" class="w-16 h-16 object-cover rounded">
                            <?php else: ?>
                                <span class="text-gray-400 italic">Tidak ada</span>
                            <?php endif; ?>
                        </td>
                        <td class="px-4 py-3 border-b"><?php echo e($donation->user->name ?? '-'); ?></td>
                        <td class="px-4 py-3 border-b">
                            <div class="flex flex-col">
                                <span class="flex items-center"><i class="fas fa-phone mr-1 text-pink-600"></i> <?php echo e($donation->phone ?? '-'); ?></span>
                                <span class="flex items-center"><i class="fas fa-envelope mr-1 text-purple-600"></i> <?php echo e($donation->email ?? '-'); ?></span>
                            </div>
                        </td>
                        <td class="px-4 py-3 border-b capitalize"><?php echo e($donation->status); ?></td>
                        <td class="px-4 py-3 border-b text-center">
                            <?php if($donation->status === 'baru'): ?>
                                <div class="flex items-center justify-center space-x-2">
                                    <form action="<?php echo e(route('admin.donations.updateStatus', ['donation' => $donation->id, 'status' => 'diterima'])); ?>" method="POST">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('PATCH'); ?>
                                        <button type="submit" class="bg-green-500 hover:bg-green-600 text-white px-2 py-1 rounded text-xs shadow">
                                            <i class="fas fa-check mr-1"></i> Terima
                                        </button>
                                    </form>
                                    <form action="<?php echo e(route('admin.donations.updateStatus', ['donation' => $donation->id, 'status' => 'ditolak'])); ?>" method="POST">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('PATCH'); ?>
                                        <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-2 py-1 rounded text-xs shadow">
                                            <i class="fas fa-times mr-1"></i> Tolak
                                        </button>
                                    </form>
                                </div>
                            <?php else: ?>
                                <span class="text-gray-500 text-sm italic">-</span>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="10" class="text-center py-4 text-gray-500">Belum ada donasi</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\thingswap\resources\views/layouts/admin.blade.php ENDPATH**/ ?>