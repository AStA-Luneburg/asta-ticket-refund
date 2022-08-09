<?php
    $state = $getTags();
?>

<div <?php echo e($attributes->merge($getExtraAttributes())->class([
    'px-4 py-3 flex flex-wrap items-center gap-1 filament-tables-tags-column',
    match ($getAlignment()) {
        'left' => 'justify-start',
        'center' => 'justify-center',
        'right' => 'justify-end',
        default => null,
    },
])); ?>>
    <?php $__currentLoopData = array_slice($getTags(), 0, $getLimit()); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <span class="<?php echo \Illuminate\Support\Arr::toCssClasses([
            'inline-flex items-center justify-center min-h-6 px-2 py-0.5 text-sm font-medium tracking-tight rounded-xl text-primary-700 bg-primary-500/10 whitespace-normal',
            'dark:text-primary-500' => config('tables.dark_mode'),
        ]) ?>">
            <?php echo e($tag); ?>

        </span>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    <?php if($hasActiveLimit()): ?>
        <span class="text-xs ml-1">
            <?php echo e(trans_choice('tables::table.columns.tags.more', count($getTags()) - $getLimit())); ?>

        </span>
    <?php endif; ?>
</div>
<?php /**PATH /Users/mat/Projects/AStA/asta-ticket-refund/vendor/filament/tables/resources/views/columns/tags-column.blade.php ENDPATH**/ ?>