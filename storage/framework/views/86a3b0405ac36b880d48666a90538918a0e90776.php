<?php foreach($attributes->onlyProps([
    'active' => false,
    'tag' => 'button',
    'type' => 'button',
]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps([
    'active' => false,
    'tag' => 'button',
    'type' => 'button',
]); ?>
<?php foreach (array_filter(([
    'active' => false,
    'tag' => 'button',
    'type' => 'button',
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<?php
    $buttonClasses = \Illuminate\Support\Arr::toCssClasses([
        'flex items-center h-8 px-5 font-medium rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-600 focus:ring-inset filament-tabs-item',
        'hover:text-gray-800 focus:text-primary-600' => ! $active,
        'dark:text-gray-400 dark:hover:text-gray-300 dark:focus:text-primary-400' => (! $active) && config('filament.dark_mode'),
        'text-primary-600 shadow bg-white' => $active,
    ]);
?>

<?php if($tag === 'button'): ?>
    <button
        type="<?php echo e($type); ?>"
        <?php echo e($attributes->class([$buttonClasses])); ?>

    >
        <?php echo e($slot); ?>

    </button>
<?php elseif($tag === 'a'): ?>
    <a <?php echo e($attributes->class([$buttonClasses])); ?>>
        <?php echo e($slot); ?>

    </a>
<?php endif; ?>
<?php /**PATH /Users/mat/Projects/AStA/asta-ticket-refund/vendor/filament/filament/resources/views/components/tabs/item.blade.php ENDPATH**/ ?>