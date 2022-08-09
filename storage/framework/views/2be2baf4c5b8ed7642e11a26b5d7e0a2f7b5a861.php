<?php foreach($attributes->onlyProps([
    'form',
    'width' => 'sm',
]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps([
    'form',
    'width' => 'sm',
]); ?>
<?php foreach (array_filter(([
    'form',
    'width' => 'sm',
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<div
    x-data
    <?php echo e($attributes->class(['relative inline-block filament-tables-column-toggling'])); ?>

>
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'tables::components.toggleable.trigger','data' => []] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('tables::toggleable.trigger'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

    <div
        x-ref="toggleablePanel"
        x-float.placement.bottom-end.offset="{ offset: 8 }"
        wire:ignore.self
        wire:key="<?php echo e($this->id); ?>.table.toggle.panel"
        x-cloak
        x-transition:enter="ease duration-300"
        x-transition:enter-start="opacity-0 -translate-y-2"
        x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="ease duration-300"
        x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 translate-y-2"
        class="<?php echo \Illuminate\Support\Arr::toCssClasses([
            'absolute hidden z-10 w-screen top-full transition',
            match ($width) {
                'xs' => 'max-w-xs',
                'md' => 'max-w-md',
                'lg' => 'max-w-lg',
                'xl' => 'max-w-xl',
                '2xl' => 'max-w-2xl',
                '3xl' => 'max-w-3xl',
                '4xl' => 'max-w-4xl',
                '5xl' => 'max-w-5xl',
                '6xl' => 'max-w-6xl',
                '7xl' => 'max-w-7xl',
                default => 'max-w-sm',
            },
        ]) ?>"
    >
        <div class="<?php echo \Illuminate\Support\Arr::toCssClasses([
            'px-6 py-4 bg-white border border-gray-300 space-y-6 shadow-xl rounded-xl',
            'dark:bg-gray-800 dark:border-gray-700' => config('tables.dark_mode'),
        ]) ?>">
            <?php echo e($form); ?>

        </div>
    </div>
</div>
<?php /**PATH /Users/mat/Projects/AStA/asta-ticket-refund/vendor/filament/tables/resources/views/components/toggleable/index.blade.php ENDPATH**/ ?>