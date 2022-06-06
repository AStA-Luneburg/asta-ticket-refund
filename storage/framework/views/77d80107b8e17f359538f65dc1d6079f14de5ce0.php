<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'Laravel')); ?></title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="<?php echo e(asset('css/app.css')); ?>">

    <!-- Scripts -->
    <script src="<?php echo e(asset('js/app.js')); ?>" defer></script>
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-slate-100">
        <?php echo $__env->make('layouts.navigation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <!-- Page Content -->
        <main class="text-asta-blue-900 pb-16">
            <?php echo e($slot); ?>

        </main>
        <footer class="pt-6 pb-12 bg-slate-200 shadow-inner">
            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.content','data' => ['class' => 'flex flex-col gap-2 md:flex-row md:gap-10 mb-8']] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('content'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'flex flex-col gap-2 md:flex-row md:gap-10 mb-8']); ?>
                <figure class="flex justify-center">
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.application-logo','data' => ['class' => 'w-64 md:w-48 text-slate-400 fill-current']] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('application-logo'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-64 md:w-48 text-slate-400 fill-current']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                </figure>
                <p class="pt-4 min-w-lg flex-1 text-slate-500 text-sm">
                    <strong>Allgemeiner Student*innenausschuss</strong><br>
                    Gebäude C9.103<br>
                    Universitätsallee 1<br>
                    21335 Lüneburg
                </p>
                <div class="pt-4 text-base flex-1 flex-shrink-0">
                    <ul class="flex flex-col gap-2">
                        <li><a href="#" class="text-slate-600 hover:text-slate-800 font-medium">Impressum</a></li>
                        <li><a href="#" class="text-slate-600 hover:text-slate-800 font-medium">Datenschutzerklärung</a>
                        </li>
                        <li><a href="#" class="text-slate-600 hover:text-slate-800 font-medium">FAQ – Frequently Asked
                                Questions</a></li>
                    </ul>
                </div>
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.content','data' => ['class' => 'flex gap-10 text-sm text-slate-500 py-4 hidden md:block']] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('content'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'flex gap-10 text-sm text-slate-500 py-4 hidden md:block']); ?>
                <p class="md:px-4">Betrieben durch den Allgemeinen Student*innenausschuss der Leuphana
                    Universität Lüneburg.</p>
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
        </footer>
    </div>
</body>

</html>
<?php /**PATH /Users/mat/Projects/AStA/asta-ticket-refund/resources/views/layouts/app.blade.php ENDPATH**/ ?>