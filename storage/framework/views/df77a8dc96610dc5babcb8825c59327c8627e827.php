<?php foreach($attributes->onlyProps(['index', 'href', 'active' => false]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps(['index', 'href', 'active' => false]); ?>
<?php foreach (array_filter((['index', 'href', 'active' => false]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<?php if($active): ?>
    <div href="<?php echo e($href); ?>"
        class="flex-1 px-2 py-2 rounded-lg flex gap-4 items-center text-lg font-medium text-asta-blue-900">
        <span
            class="inline-flex flex-shrink-0 items-center justify-center bg-asta-blue-200 rounded-full h-8 w-8 text-slate-50 font-bold text-xl"><?php echo e($index); ?></span>
        <?php echo e($slot); ?>

    </div>
<?php else: ?>
    <div href="<?php echo e($href); ?>"
        class="flex-1 px-2 py-2 rounded-lg flex gap-4 items-center text-lg font-medium text-asta-blue-900 opacity-40">
        <span
            class="inline-flex flex-shrink-0  items-center justify-center bg-asta-blue-200 rounded-full h-8 w-8 text-slate-50 font-bold text-xl"><?php echo e($index); ?></span>
        <?php echo e($slot); ?>

    </div>
<?php endif; ?>
<?php /**PATH /Users/mat/Projects/AStA/asta-ticket-refund/resources/views/components/header-step.blade.php ENDPATH**/ ?>