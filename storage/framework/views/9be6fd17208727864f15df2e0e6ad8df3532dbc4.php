<td <?php echo e($attributes->class(['w-4 px-4 whitespace-nowrap filament-tables-checkbox-cell'])); ?>>
    <input
        <?php echo e($checkbox->attributes->class([
            'block border-gray-300 rounded shadow-sm text-primary-600 focus:border-primary-600 focus:ring focus:ring-primary-200 focus:ring-opacity-50',
            'dark:bg-gray-700 dark:border-gray-600 dark:checked:bg-primary-500' => config('tables.dark_mode'),
        ])); ?>

        wire:loading.attr="disabled"
        wire:target="<?php echo e(implode(',', \Filament\Tables\Table::LOADING_TARGETS)); ?>"
        type="checkbox"
    />
</td>
<?php /**PATH /Users/mat/Projects/AStA/asta-ticket-refund/vendor/filament/tables/resources/views/components/checkbox-cell.blade.php ENDPATH**/ ?>