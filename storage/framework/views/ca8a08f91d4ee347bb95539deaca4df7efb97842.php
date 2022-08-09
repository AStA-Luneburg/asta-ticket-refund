<?php foreach($attributes->onlyProps([
    'active' => false,
    'disabled' => false,
    'icon' => false,
    'label' => null,
    'separator' => false,
]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps([
    'active' => false,
    'disabled' => false,
    'icon' => false,
    'label' => null,
    'separator' => false,
]); ?>
<?php foreach (array_filter(([
    'active' => false,
    'disabled' => false,
    'icon' => false,
    'label' => null,
    'separator' => false,
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<li>
    <button
        <?php if($disabled || $separator): ?> disabled <?php endif; ?>
        type="button"
        <?php echo e($attributes->class([
            'relative flex items-center justify-center font-medium min-w-[2rem] px-1.5 h-8 -my-3 rounded-md focus:outline-none filament-tables-pagination-item',
            'hover:bg-gray-500/5 focus:bg-primary-500/10 focus:ring-2 focus:ring-primary-500' => (! $active) && (! $disabled) && (! $separator),
            'dark:hover:bg-gray-400/5' => (! $active) && (! $disabled) && (! $separator) && config('tables.dark_mode'),
            'focus:text-primary-600' => (! $active) && (! $disabled) && (! $icon) && (! $separator),
            'transition' => ((! $active) && (! $disabled) && (! $separator)) || $active,
            'text-primary-600' => ((! $active) && (! $disabled) && $icon && (! $separator)) || $active,
            'focus:underline bg-primary-500/10 ring-2 ring-primary-500' => $active,
            'cursor-not-allowed pointer-events-none opacity-70' => $disabled,
            'cursor-default' => $separator,
        ])); ?>

    >
        <?php if($icon): ?>
            <?php if (isset($component)) { $__componentOriginal3bf0a20793be3eca9a779778cf74145887b021b9 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\DynamicComponent::class, ['component' => $icon] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('dynamic-component'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(Illuminate\View\DynamicComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-5 h-5 rtl:scale-x-[-1]']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3bf0a20793be3eca9a779778cf74145887b021b9)): ?>
<?php $component = $__componentOriginal3bf0a20793be3eca9a779778cf74145887b021b9; ?>
<?php unset($__componentOriginal3bf0a20793be3eca9a779778cf74145887b021b9); ?>
<?php endif; ?>
        <?php endif; ?>

        <span><?php echo e($label ?? ($separator ? '...' : '')); ?></span>
    </button>
</li>
<?php /**PATH /Users/mat/Projects/AStA/asta-ticket-refund/vendor/filament/tables/resources/views/components/pagination/item.blade.php ENDPATH**/ ?>