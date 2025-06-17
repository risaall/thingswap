<?php $__env->startSection('title', 'Produk'); ?>

<?php $__env->startSection('head'); ?>
<!-- Lightbox2 CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.4/css/lightbox.min.css" rel="stylesheet" />
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container mx-auto px-4">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Daftar Produk</h2>
        <a href="<?php echo e(route('admin.products.create')); ?>"
           class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded shadow">
            <i class="fas fa-plus mr-2"></i> Tambah Produk
        </a>
    </div>

    <?php if(session('success')): ?>
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    <?php if($products->isEmpty()): ?>
        <div class="text-center text-gray-500">Tidak ada produk yang tersedia.</div>
    <?php else: ?>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="bg-white rounded-lg shadow-md overflow-hidden flex flex-col">
                    <div class="relative">
                        <?php if($product->image): ?>
                            <a href="<?php echo e(asset('storage/' . $product->image)); ?>" data-lightbox="product-<?php echo e($product->id); ?>">
                                <img src="<?php echo e(asset('storage/' . $product->image)); ?>" alt="<?php echo e($product->name); ?>" class="w-full h-48 object-cover">
                            </a>
                        <?php else: ?>
                            <img src="https://via.placeholder.com/300x200" alt="No Image" class="w-full h-48 object-cover">
                        <?php endif; ?>
                    </div>
                    <div class="p-4 flex flex-col flex-grow">
                        <h3 class="text-lg font-semibold text-gray-800"><?php echo e($product->name); ?></h3>
                        <p class="text-sm text-gray-600 mb-1">Kategori: <span class="font-medium"><?php echo e($product->category->name ?? '-'); ?></span></p>
                        <p class="text-sm text-gray-600 mb-1">Stok: <span class="font-medium"><?php echo e($product->stock); ?></span></p>
                        <p class="text-sm text-gray-600 mb-1">Tujuan Barang:
                            <span class="inline-block px-2 py-1 rounded text-white text-xs
                                <?php if($product->type === 'sell'): ?> bg-blue-500
                                <?php elseif($product->type === 'donation'): ?> bg-green-500
                                <?php elseif($product->type === 'recycled'): ?> bg-yellow-500
                                <?php else: ?> bg-gray-400 <?php endif; ?>">
                                <?php if($product->type === 'sell'): ?>
                                    Dijual
                                <?php elseif($product->type === 'donation'): ?>
                                    Donasi
                                <?php elseif($product->type === 'recycled'): ?>
                                    Didaur Ulang
                                <?php else: ?>
                                    Tidak Diketahui
                                <?php endif; ?>
                            </span>
                        </p>
                        <p class="text-sm text-gray-800 mb-3">Harga: 
                            <span class="font-bold text-green-600">Rp <?php echo e(number_format((float) $product->price, 0, ',', '.')); ?></span>
                        </p>
                        <div class="mt-auto flex justify-between items-center space-x-2">
                            <a href="<?php echo e(route('admin.products.edit', $product->id)); ?>"
                               class="bg-yellow-400 hover:bg-yellow-500 text-white px-3 py-1 rounded text-sm">
                                <i class="fas fa-edit mr-1"></i> Edit
                            </a>
                            <form action="<?php echo e(route('admin.products.destroy', $product->id)); ?>" method="POST" onsubmit="return confirm('Hapus produk ini?')">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit"
                                        class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded text-sm">
                                    <i class="fas fa-trash mr-1"></i> Hapus
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<!-- Lightbox2 JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.4/js/lightbox.min.js"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\thingswap\resources\views/admin/products/index.blade.php ENDPATH**/ ?>