<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $__env->yieldContent('title'); ?> | Admin Panel</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 text-gray-800">

    <div class="flex min-h-screen">

        
        <aside class="w-64 bg-gray-900 text-white flex-shrink-0 shadow-md">
            <div class="p-6">
                <h1 class="text-2xl font-bold flex items-center gap-2">
                    <i class="fas fa-cogs"></i> Admin Panel
                </h1>
            </div>
            <nav class="mt-6">
                <a href="<?php echo e(route('admin.dashboard')); ?>"
                   class="block py-2.5 px-6 hover:bg-green-600 rounded transition <?php echo e(request()->routeIs('admin.dashboard') ? 'bg-green-700' : ''); ?>">
                    <i class="fas fa-home mr-2"></i> Dashboard
                </a>
                <a href="<?php echo e(route('admin.categories.index')); ?>"
                   class="block py-2.5 px-6 hover:bg-green-600 rounded transition <?php echo e(request()->routeIs('admin.categories.*') ? 'bg-green-700' : ''); ?>">
                    <i class="fas fa-tags mr-2"></i> Kategori
                </a>
                <a href="<?php echo e(route('admin.products.index')); ?>"
                   class="block py-2.5 px-6 hover:bg-green-600 rounded transition <?php echo e(request()->routeIs('admin.products.*') ? 'bg-green-700' : ''); ?>">
                    <i class="fas fa-box mr-2"></i> Produk
                </a>
                <a href="<?php echo e(route('admin.donations.index')); ?>"
                   class="block py-2.5 px-6 hover:bg-green-600 rounded transition <?php echo e(request()->routeIs('admin.donations.*') ? 'bg-green-700' : ''); ?>">
                    <i class="fas fa-gift mr-2"></i> Donasi
                </a>
                <a href="<?php echo e(route('admin.users.index')); ?>"
                   class="block py-2.5 px-6 hover:bg-green-600 rounded transition <?php echo e(request()->routeIs('admin.users.*') ? 'bg-green-700' : ''); ?>">
                    <i class="fas fa-users mr-2"></i> Pengguna
                </a>
                <a href="<?php echo e(route('admin.partners.index')); ?>"
                   class="block py-2.5 px-6 hover:bg-green-600 rounded transition <?php echo e(request()->routeIs('admin.partners.*') ? 'bg-green-700' : ''); ?>">
                    <i class="fas fa-handshake mr-2"></i> Mitra
                </a>
                <a href="<?php echo e(route('logout')); ?>"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                   class="block py-2.5 px-6 hover:bg-red-600 rounded transition">
                    <i class="fas fa-sign-out-alt mr-2"></i> Logout
                </a>
                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="hidden">
                    <?php echo csrf_field(); ?>
                </form>
            </nav>
        </aside>

        
        <main class="flex-1 p-8">
            <div class="mb-6 border-b pb-4">
                <h2 class="text-2xl font-bold"><?php echo $__env->yieldContent('title'); ?></h2>
            </div>

            <?php if(session('success')): ?>
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
                    <?php echo e(session('success')); ?>

                </div>
            <?php endif; ?>

            <?php echo $__env->yieldContent('content'); ?>
        </main>
    </div>

</body>
</html>
<?php /**PATH C:\xampp\htdocs\thingswap\resources\views/layouts/admin.blade.php ENDPATH**/ ?>