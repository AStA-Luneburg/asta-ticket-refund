<?php foreach($attributes->onlyProps([
    'extraAttributes' => [],
    'isSortColumn' => false,
    'name',
    'sortable' => false,
    'sortDirection',
    'alignment' => null,
]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps([
    'extraAttributes' => [],
    'isSortColumn' => false,
    'name',
    'sortable' => false,
    'sortDirection',
    'alignment' => null,
]); ?>
<?php foreach (array_filter(([
    'extraAttributes' => [],
    'isSortColumn' => false,
    'name',
    'sortable' => false,
    'sortDirection',
    'alignment' => null,
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<th <?php echo e($attributes->merge($extraAttributes)->class(['p-0 filament-tables-header-cell'])); ?>>
    <button
        <?php if($sortable): ?>
            wire:click="sortTable('<?php echo e($name); ?>')"
        <?php endif; ?>
        type="button"
        class="<?php echo \Illuminate\Support\Arr::toCssClasses([
            'flex items-center w-full px-4 py-2 whitespace-nowrap space-x-1 rtl:space-x-reverse font-medium text-sm text-gray-600',
            'dark:text-gray-300' => config('tables.dark_mode'),
            'cursor-default' => ! $sortable,
            match ($alignment) {
                'left' => 'justify-start',
                'center' => 'justify-center',
                'right' => 'justify-end',
                default => null,
            },
        ]) ?>"
    >
        <span>
            <?php echo e($slot); ?>

        </span>

        <?php if($sortable): ?>
            <span class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                'relative flex items-center',
                'dark:text-gray-300' => config('tables.dark_mode'),
            ]) ?>">
                <?php if($isSortColumn && $sortDirection === 'asc'): ?>
                    <?php if (isset($component)) { $__componentOriginalcd9972c8156dfa6e5fd36675ca7bf5f21b506e2e = $component; } ?>
<?php $component = $__env->getContainer()->make(BladeUI\Icons\Components\Svg::class, [] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('heroicon-s-chevron-up'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(BladeUI\Icons\Components\Svg::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-3 h-3']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalcd9972c8156dfa6e5fd36675ca7bf5f21b506e2e)): ?>
<?php $component = $__componentOriginalcd9972c8156dfa6e5fd36675ca7bf5f21b506e2e; ?>
<?php unset($__componentOriginalcd9972c8156dfa6e5fd36675ca7bf5f21b506e2e); ?>
<?php endif; ?>
                <?php else: ?>
                    <?php if (isset($component)) { $__componentOriginalcd9972c8156dfa6e5fd36675ca7bf5f21b506e2e = $component; } ?>
<?php $component = $__env->getContainer()->make(BladeUI\Icons\Components\Svg::class, [] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('heroicon-s-chevron-down'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(BladeUI\Icons\Components\Svg::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(\Illuminate\Support\Arr::toCssClasses(['w-3 h-3', 'opacity-25' => ! $isSortColumn]))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalcd9972c8156dfa6e5fd36675ca7bf5f21b506e2e)): ?>
<?php $component = $__componentOriginalcd9972c8156dfa6e5fd36675ca7bf5f21b506e2e; ?>
<?php unset($__componentOriginalcd9972c8156dfa6e5fd36675ca7bf5f21b506e2e); ?>
<?php endif; ?>
                <?php endif; ?>
            </span>
        <?php endif; ?>
    </button>
</th>
<?php /**PATH /Users/mat/Projects/AStA/asta-ticket-refund/vendor/filament/tables/resources/views/components/header-cell.blade.php ENDPATH**/ ?>