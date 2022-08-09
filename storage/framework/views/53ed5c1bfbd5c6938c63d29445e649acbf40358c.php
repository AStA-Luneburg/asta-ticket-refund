<?php foreach($attributes->onlyProps([
    'align' => 'left',
    'darkMode' => false,
    'fullWidth' => false,
]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps([
    'align' => 'left',
    'darkMode' => false,
    'fullWidth' => false,
]); ?>
<?php foreach (array_filter(([
    'align' => 'left',
    'darkMode' => false,
    'fullWidth' => false,
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<div <?php echo e($attributes->class([
    'filament-modal-actions',
    'flex flex-wrap items-center gap-4 rtl:space-x-reverse' => ! $fullWidth,
    'flex-row-reverse space-x-reverse' => (! $fullWidth) && ($align === 'right'),
    'justify-center' => (! $fullWidth) && ($align === 'center'),
    'grid gap-2 grid-cols-[repeat(auto-fit,minmax(0,1fr))]' => $fullWidth,
])); ?>>
    <?php echo e($slot); ?>

</div>
<?php /**PATH /Users/mat/Projects/AStA/asta-ticket-refund/vendor/filament/support/src/../resources/views/components/modal/actions.blade.php ENDPATH**/ ?>