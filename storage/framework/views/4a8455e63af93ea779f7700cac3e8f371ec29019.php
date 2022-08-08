<fieldset
    <?php echo $getId() ? "id=\"{$getId()}\"" : null; ?>

    <?php echo e($attributes->merge($getExtraAttributes())->class([
        'rounded-xl shadow-sm border border-gray-300 p-6 filament-forms-fieldset-component',
        'dark:border-gray-600 dark:text-gray-200' => config('forms.dark_mode'),
    ])); ?>

>
    <legend class="text-sm leading-tight font-medium px-2 -ml-2">
        <?php echo e($getLabel()); ?>

    </legend>

    <?php echo e($getChildComponentContainer()); ?>

</fieldset>
<?php /**PATH /Users/mat/Projects/AStA/asta-ticket-refund/vendor/filament/forms/src/../resources/views/components/fieldset.blade.php ENDPATH**/ ?>