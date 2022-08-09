<div <?php echo e($attributes->class(['filament-tables-search-input'])); ?>>
    <label for="tableSearchInput" class="sr-only">
        <?php echo e(__('tables::table.fields.search_query.label')); ?>

    </label>

    <div class="relative group">
        <span class="absolute inset-y-0 left-0 flex items-center justify-center w-9 h-9 text-gray-400 pointer-events-none group-focus-within:text-primary-500">
            <?php if (isset($component)) { $__componentOriginalcd9972c8156dfa6e5fd36675ca7bf5f21b506e2e = $component; } ?>
<?php $component = $__env->getContainer()->make(BladeUI\Icons\Components\Svg::class, [] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('heroicon-o-search'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(BladeUI\Icons\Components\Svg::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-5 h-5']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalcd9972c8156dfa6e5fd36675ca7bf5f21b506e2e)): ?>
<?php $component = $__componentOriginalcd9972c8156dfa6e5fd36675ca7bf5f21b506e2e; ?>
<?php unset($__componentOriginalcd9972c8156dfa6e5fd36675ca7bf5f21b506e2e); ?>
<?php endif; ?>
        </span>

        <input
            wire:model.debounce.500ms="tableSearchQuery"
            id="tableSearchInput"
            placeholder="<?php echo e(__('tables::table.fields.search_query.placeholder')); ?>"
            type="search"
            autocomplete="off"
            class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                'block w-full h-9 pl-9 placeholder-gray-400 transition duration-75 border-gray-300 rounded-lg shadow-sm focus:border-primary-600 focus:ring-1 focus:ring-inset focus:ring-primary-600',
                'dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:placeholder-gray-400' => config('tables.dark_mode'),
            ]) ?>"
        >
    </div>
</div>
<?php /**PATH /Users/mat/Projects/AStA/asta-ticket-refund/vendor/filament/tables/src/../resources/views/components/search-input.blade.php ENDPATH**/ ?>