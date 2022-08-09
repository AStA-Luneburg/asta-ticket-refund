<?php foreach($attributes->onlyProps([
    'actions',
    'record',
]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps([
    'actions',
    'record',
]); ?>
<?php foreach (array_filter(([
    'actions',
    'record',
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<td <?php echo e($attributes->class(['px-4 py-3 whitespace-nowrap filament-tables-actions-cell'])); ?>>
    <div
        <?php echo e($attributes->class([
            'flex items-center gap-4',
            match (config('tables.layout.action_alignment', config('tables.layout.actions.cell.alignment'))) {
                'center' => 'justify-center',
                'left' => 'justify-start',
                default => 'justify-end',
            },
        ])); ?>

    >
        <?php $__currentLoopData = $actions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $action): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if(! $action->record($record)->isHidden()): ?>
                <?php echo e($action); ?>

            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</td>
<?php /**PATH /Users/mat/Projects/AStA/asta-ticket-refund/vendor/filament/tables/src/../resources/views/components/actions-cell.blade.php ENDPATH**/ ?>