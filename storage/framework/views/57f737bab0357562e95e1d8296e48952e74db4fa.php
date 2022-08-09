<div
    <?php echo $getId() ? "id=\"{$getId()}\"" : null; ?>

    <?php echo e($attributes->merge($getExtraAttributes())->class([
        'p-6 bg-white rounded-xl border border-gray-300 filament-forms-card-component',
        'dark:border-gray-600 dark:bg-gray-800' => config('forms.dark_mode'),
    ])); ?>

>
    <?php echo e($getChildComponentContainer()); ?>

</div>
<?php /**PATH /Users/mat/Projects/AStA/asta-ticket-refund/vendor/filament/forms/resources/views/components/card.blade.php ENDPATH**/ ?>