<?php foreach($attributes->onlyProps([
    'isGrid' => true,
    'default' => 1,
    'sm' => null,
    'md' => null,
    'lg' => null,
    'xl' => null,
    'twoXl' => null,
]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps([
    'isGrid' => true,
    'default' => 1,
    'sm' => null,
    'md' => null,
    'lg' => null,
    'xl' => null,
    'twoXl' => null,
]); ?>
<?php foreach (array_filter(([
    'isGrid' => true,
    'default' => 1,
    'sm' => null,
    'md' => null,
    'lg' => null,
    'xl' => null,
    'twoXl' => null,
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<div <?php echo e($attributes->class([
    'grid' => $isGrid,
    $default ? match ($default) {
        1 => 'grid-cols-1',
        2 => 'grid-cols-2',
        3 => 'grid-cols-3',
        4 => 'grid-cols-4',
        5 => 'grid-cols-5',
        6 => 'grid-cols-6',
        7 => 'grid-cols-7',
        8 => 'grid-cols-8',
        9 => 'grid-cols-9',
        10 => 'grid-cols-10',
        11 => 'grid-cols-11',
        12 => 'grid-cols-12',
        default => $default,
    } : null,
    $sm ? match ($sm) {
        1 => 'sm:grid-cols-1',
        2 => 'sm:grid-cols-2',
        3 => 'sm:grid-cols-3',
        4 => 'sm:grid-cols-4',
        5 => 'sm:grid-cols-5',
        6 => 'sm:grid-cols-6',
        7 => 'sm:grid-cols-7',
        8 => 'sm:grid-cols-8',
        9 => 'sm:grid-cols-9',
        10 => 'sm:grid-cols-10',
        11 => 'sm:grid-cols-11',
        12 => 'sm:grid-cols-12',
        default => $sm,
    } : null,
    $md ? match ($md) {
        1 => 'md:grid-cols-1',
        2 => 'md:grid-cols-2',
        3 => 'md:grid-cols-3',
        4 => 'md:grid-cols-4',
        5 => 'md:grid-cols-5',
        6 => 'md:grid-cols-6',
        7 => 'md:grid-cols-7',
        8 => 'md:grid-cols-8',
        9 => 'md:grid-cols-9',
        10 => 'md:grid-cols-10',
        11 => 'md:grid-cols-11',
        12 => 'md:grid-cols-12',
        default => $md,
    } : null,
    $lg ? match ($lg) {
        1 => 'lg:grid-cols-1',
        2 => 'lg:grid-cols-2',
        3 => 'lg:grid-cols-3',
        4 => 'lg:grid-cols-4',
        5 => 'lg:grid-cols-5',
        6 => 'lg:grid-cols-6',
        7 => 'lg:grid-cols-7',
        8 => 'lg:grid-cols-8',
        9 => 'lg:grid-cols-9',
        10 => 'lg:grid-cols-10',
        11 => 'lg:grid-cols-11',
        12 => 'lg:grid-cols-12',
        default => $lg,
    } : null,
    $xl ? match ($xl) {
        1 => 'xl:grid-cols-1',
        2 => 'xl:grid-cols-2',
        3 => 'xl:grid-cols-3',
        4 => 'xl:grid-cols-4',
        5 => 'xl:grid-cols-5',
        6 => 'xl:grid-cols-6',
        7 => 'xl:grid-cols-7',
        8 => 'xl:grid-cols-8',
        9 => 'xl:grid-cols-9',
        10 => 'xl:grid-cols-10',
        11 => 'xl:grid-cols-11',
        12 => 'xl:grid-cols-12',
        default => $xl,
    } : null,
    $twoXl ? match ($twoXl) {
        1 => '2xl:grid-cols-1',
        2 => '2xl:grid-cols-2',
        3 => '2xl:grid-cols-3',
        4 => '2xl:grid-cols-4',
        5 => '2xl:grid-cols-5',
        6 => '2xl:grid-cols-6',
        7 => '2xl:grid-cols-7',
        8 => '2xl:grid-cols-8',
        9 => '2xl:grid-cols-9',
        10 => '2xl:grid-cols-10',
        11 => '2xl:grid-cols-11',
        12 => '2xl:grid-cols-12',
        default => $twoXl,
    } : null,
])); ?>>
    <?php echo e($slot); ?>

</div>
<?php /**PATH /Users/mat/Projects/AStA/asta-ticket-refund/vendor/filament/support/resources/views/components/grid.blade.php ENDPATH**/ ?>