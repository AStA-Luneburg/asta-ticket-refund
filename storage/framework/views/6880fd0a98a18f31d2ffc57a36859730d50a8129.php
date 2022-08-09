<?php foreach($attributes->onlyProps([
    'options',
]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps([
    'options',
]); ?>
<?php foreach (array_filter(([
    'options',
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<div class="flex items-center space-x-2 rtl:space-x-reverse filament-tables-pagination-records-per-page-selector">
    <select wire:model="tableRecordsPerPage" id="tableRecordsPerPageSelect" class="<?php echo \Illuminate\Support\Arr::toCssClasses([
        'h-8 text-sm pr-8 leading-none transition duration-75 border-gray-300 rounded-lg shadow-sm focus:border-primary-600 focus:ring-1 focus:ring-inset focus:ring-primary-600',
        'dark:text-white dark:bg-gray-700 dark:border-gray-600 dark:focus:border-primary-600' => config('tables.dark_mode'),
    ]) ?>">
        <?php $__currentLoopData = $options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($option); ?>"><?php echo e($option); ?></option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>

    <label for="tableRecordsPerPageSelect" class="<?php echo \Illuminate\Support\Arr::toCssClasses([
        'text-sm font-medium',
        'dark:text-white' => config('tables.dark_mode'),
    ]) ?>">
        <?php echo e(__('tables::table.pagination.fields.records_per_page.label')); ?>

    </label>
</div>
<?php /**PATH /Users/mat/Projects/AStA/asta-ticket-refund/vendor/filament/tables/src/../resources/views/components/pagination/records-per-page-selector.blade.php ENDPATH**/ ?>