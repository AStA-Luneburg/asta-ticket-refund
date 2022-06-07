<?php foreach($attributes->onlyProps(['index', 'active' => false]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps(['index', 'active' => false]); ?>
<?php foreach (array_filter((['index', 'active' => false]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<?php if($active): ?>
    <a
        <?php echo e($attributes->merge(['class' => 'flex-1 px-2 py-2 rounded-lg flex gap-4 items-center text-sm md:text-base lg:text-lg font-medium text-asta-blue-900'])); ?>>
        <?php if(isset($index)): ?>
            <span
                class="inline-flex flex-shrink-0 items-center justify-center bg-asta-blue-200 rounded-full h-6 w-6 lg:h-8 lg:w-8 text-slate-50 font-bold text-sm md:text-lg lg:text-xl"><?php echo e($index); ?></span>
        <?php endif; ?>
        <?php echo e($slot); ?>

    </a>
<?php else: ?>
    <a
        <?php echo e($attributes->merge(['class' => 'flex-1 px-2 py-2 rounded-lg flex gap-4 items-center text-sm md:text-base lg:text-lg font-medium text-asta-blue-900 opacity-40'])); ?>>
        <?php if(isset($index)): ?>
            <span
                class="inline-flex flex-shrink-0  items-center justify-center bg-asta-blue-200 rounded-full h-6 w-6 lg:h-8 lg:w-8 text-slate-50 font-bold text-sm md:text-lg lg:text-xl"><?php echo e($index); ?></span>
        <?php endif; ?>
        <?php echo e($slot); ?>

    </a>
<?php endif; ?>
<?php /**PATH /Users/mat/Projects/AStA/asta-ticket-refund/resources/views/components/header-step.blade.php ENDPATH**/ ?>