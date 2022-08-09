<?php foreach($attributes->onlyProps([
    'color' => 'primary',
    'darkMode' => false,
    'detail' => null,
    'icon' => null,
    'keyBindings' => null,
    'tag' => 'button',
    'type' => 'button',
]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps([
    'color' => 'primary',
    'darkMode' => false,
    'detail' => null,
    'icon' => null,
    'keyBindings' => null,
    'tag' => 'button',
    'type' => 'button',
]); ?>
<?php foreach (array_filter(([
    'color' => 'primary',
    'darkMode' => false,
    'detail' => null,
    'icon' => null,
    'keyBindings' => null,
    'tag' => 'button',
    'type' => 'button',
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<?php
    $hasHoverAndFocusState = ($tag !== 'a' || filled($attributes->get('href')));

    $buttonClasses = \Illuminate\Support\Arr::toCssClasses([
        'flex items-center w-full h-8 px-3 text-sm font-medium group whitespace-nowrap filament-dropdown-item',
        'focus:outline-none hover:text-white focus:text-white' => $hasHoverAndFocusState,
        'hover:bg-primary-600 focus:bg-primary-700' => ($color === 'primary' || $color === 'secondary') && $hasHoverAndFocusState,
        'hover:bg-danger-600 focus:bg-danger-700' => $color === 'danger' && $hasHoverAndFocusState,
        'hover:bg-success-600 focus:bg-success-700' => $color === 'success' && $hasHoverAndFocusState,
        'hover:bg-warning-600 focus:bg-warning-700' => $color === 'warning' && $hasHoverAndFocusState,
    ]);

    $detailClasses = \Illuminate\Support\Arr::toCssClasses([
        'ml-auto text-xs text-gray-500',
        'group-hover:text-primary-100 group-focus:text-primary-100' => ($color === 'primary' || $color === 'secondary') && $hasHoverAndFocusState,
        'group-hover:text-danger-100 group-focus:text-danger-100' => $color === 'danger' && $hasHoverAndFocusState,
        'group-hover:text-success-100 group-focus:text-success-100' => $color === 'success' && $hasHoverAndFocusState,
        'group-hover:text-warning-100 group-focus:text-warning-100' => $color === 'warning' && $hasHoverAndFocusState,
    ]);

    $labelClasses = 'truncate';

    $iconClasses = \Illuminate\Support\Arr::toCssClasses([
        'mr-2 -ml-1 w-5 h-5 flex-shrink-0 rtl:ml-2 rtl:-mr-1',
        'group-hover:text-white group-focus:text-white' => $hasHoverAndFocusState,
        'text-primary-500' => $color === 'primary',
        'text-danger-500' => $color === 'danger',
        'text-gray-500' => $color === 'secondary',
        'text-success-500' => $color === 'success',
        'text-warning-500' => $color === 'warning',
    ]);
?>

<li <?php echo e($attributes->only(['class'])); ?>>
    <?php if($tag === 'button'): ?>
        <button
            type="<?php echo e($type); ?>"
            <?php echo e($attributes->except(['class'])->class([$buttonClasses])); ?>

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
<?php $component->withAttributes(['class' => $iconClasses]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3bf0a20793be3eca9a779778cf74145887b021b9)): ?>
<?php $component = $__componentOriginal3bf0a20793be3eca9a779778cf74145887b021b9; ?>
<?php unset($__componentOriginal3bf0a20793be3eca9a779778cf74145887b021b9); ?>
<?php endif; ?>
            <?php endif; ?>

            <span class="<?php echo e($labelClasses); ?>">
                <?php echo e($slot); ?>

            </span>

            <?php if($detail): ?>
                <span class="<?php echo e($detailClasses); ?>">
                    <?php echo e($detail); ?>

                </span>
            <?php endif; ?>
        </button>
    <?php elseif($tag === 'a'): ?>
        <a <?php echo e($attributes->except(['class'])->class([$buttonClasses])); ?>>
            <?php if($icon): ?>
                <?php if (isset($component)) { $__componentOriginal3bf0a20793be3eca9a779778cf74145887b021b9 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\DynamicComponent::class, ['component' => $icon] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('dynamic-component'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(Illuminate\View\DynamicComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => $iconClasses]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3bf0a20793be3eca9a779778cf74145887b021b9)): ?>
<?php $component = $__componentOriginal3bf0a20793be3eca9a779778cf74145887b021b9; ?>
<?php unset($__componentOriginal3bf0a20793be3eca9a779778cf74145887b021b9); ?>
<?php endif; ?>
            <?php endif; ?>

            <span class="<?php echo e($labelClasses); ?>">
                <?php echo e($slot); ?>

            </span>

            <?php if($detail): ?>
                <span class="<?php echo e($detailClasses); ?>">
                    <?php echo e($detail); ?>

                </span>
            <?php endif; ?>
        </a>
    <?php elseif($tag === 'form'): ?>
        <form <?php echo e($attributes->only(['action', 'method', 'wire:submit.prevent'])); ?>>
            <?php echo csrf_field(); ?>

            <button
                type="submit"
                <?php echo e($attributes->except(['action', 'class', 'method', 'wire:submit.prevent'])->class([$buttonClasses])); ?>

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
<?php $component->withAttributes(['class' => $iconClasses]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3bf0a20793be3eca9a779778cf74145887b021b9)): ?>
<?php $component = $__componentOriginal3bf0a20793be3eca9a779778cf74145887b021b9; ?>
<?php unset($__componentOriginal3bf0a20793be3eca9a779778cf74145887b021b9); ?>
<?php endif; ?>
                <?php endif; ?>

                <span class="<?php echo e($labelClasses); ?>">
                    <?php echo e($slot); ?>

                </span>

                <?php if($detail): ?>
                    <span class="<?php echo e($detailClasses); ?>">
                        <?php echo e($detail); ?>

                    </span>
                <?php endif; ?>
            </button>
        </form>
    <?php endif; ?>
</li>
<?php /**PATH /Users/mat/Projects/AStA/asta-ticket-refund/vendor/filament/support/resources/views/components/dropdown/item.blade.php ENDPATH**/ ?>