<?php foreach($attributes->onlyProps([
    'collapsible' => true,
    'icon' => null,
    'label' => null,
]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps([
    'collapsible' => true,
    'icon' => null,
    'label' => null,
]); ?>
<?php foreach (array_filter(([
    'collapsible' => true,
    'icon' => null,
    'label' => null,
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<li x-data="{ label: <?php echo e(\Illuminate\Support\Js::from($label)); ?> }" class="filament-sidebar-group">
    <?php if($label): ?>
        <button
            <?php if($collapsible): ?>
                x-on:click.prevent="$store.sidebar.toggleCollapsedGroup(label)"
            <?php endif; ?>
            <?php if(config('filament.layout.sidebar.is_collapsible_on_desktop')): ?>
                x-show="$store.sidebar.isOpen"
            <?php endif; ?>
            class="flex items-center justify-between w-full"
        >
            <div class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                'flex items-center gap-4 text-gray-600',
                'dark:text-gray-300' => config('filament.dark_mode'),
            ]) ?>">
                <?php if($icon): ?>
                    <?php if (isset($component)) { $__componentOriginal3bf0a20793be3eca9a779778cf74145887b021b9 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\DynamicComponent::class, ['component' => $icon] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('dynamic-component'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(Illuminate\View\DynamicComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'ml-1 w-3 h-3 flex-shrink-0']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3bf0a20793be3eca9a779778cf74145887b021b9)): ?>
<?php $component = $__componentOriginal3bf0a20793be3eca9a779778cf74145887b021b9; ?>
<?php unset($__componentOriginal3bf0a20793be3eca9a779778cf74145887b021b9); ?>
<?php endif; ?>
                <?php endif; ?>

                <p class="flex-1 font-bold uppercase text-xs tracking-wider">
                    <?php echo e($label); ?>

                </p>
            </div>

            <?php if($collapsible): ?>
                <?php if (isset($component)) { $__componentOriginalcd9972c8156dfa6e5fd36675ca7bf5f21b506e2e = $component; } ?>
<?php $component = $__env->getContainer()->make(BladeUI\Icons\Components\Svg::class, [] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('heroicon-o-chevron-down'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(BladeUI\Icons\Components\Svg::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(\Illuminate\Support\Arr::toCssClasses([
                    'w-3 h-3 text-gray-600 transition-all',
                    'dark:text-gray-300' => config('filament.dark_mode'),
                ])),'x-bind:class' => '$store.sidebar.groupIsCollapsed(label) || \'-rotate-180\'','x-cloak' => true]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalcd9972c8156dfa6e5fd36675ca7bf5f21b506e2e)): ?>
<?php $component = $__componentOriginalcd9972c8156dfa6e5fd36675ca7bf5f21b506e2e; ?>
<?php unset($__componentOriginalcd9972c8156dfa6e5fd36675ca7bf5f21b506e2e); ?>
<?php endif; ?>
            <?php endif; ?>
        </button>
    <?php endif; ?>

    <ul
        x-show="! ($store.sidebar.groupIsCollapsed(label) && <?php echo e(config('filament.layout.sidebar.is_collapsible_on_desktop') ? '$store.sidebar.isOpen' : 'true'); ?>)"
        x-collapse.duration.200ms
        class="<?php echo \Illuminate\Support\Arr::toCssClasses([
            'text-sm space-y-1 -mx-3',
            'mt-2' => $label,
        ]) ?>"
    >
        <?php echo e($slot); ?>

    </ul>
</li>
<?php /**PATH /Users/mat/Projects/AStA/asta-ticket-refund/vendor/filament/filament/src/../resources/views/components/layouts/app/sidebar/group.blade.php ENDPATH**/ ?>