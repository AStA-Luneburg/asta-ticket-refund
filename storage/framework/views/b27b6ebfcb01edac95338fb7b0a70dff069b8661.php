<?php foreach($attributes->onlyProps([
    'active' => false,
    'badge' => null,
    'badgeColor' => null,
    'icon',
    'shouldOpenUrlInNewTab' => false,
    'url',
]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps([
    'active' => false,
    'badge' => null,
    'badgeColor' => null,
    'icon',
    'shouldOpenUrlInNewTab' => false,
    'url',
]); ?>
<?php foreach (array_filter(([
    'active' => false,
    'badge' => null,
    'badgeColor' => null,
    'icon',
    'shouldOpenUrlInNewTab' => false,
    'url',
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<li class="<?php echo \Illuminate\Support\Arr::toCssClasses(['filament-sidebar-item', 'filament-sidebar-item-active' => $active]) ?>">
    <a
        href="<?php echo e($url); ?>"
        <?php echo $shouldOpenUrlInNewTab ? 'target="_blank"' : ''; ?>

        x-on:click="window.matchMedia(`(max-width: 1024px)`).matches && $store.sidebar.close()"
        <?php if(config('filament.layout.sidebar.is_collapsible_on_desktop')): ?>
            x-data="{ tooltip: {} }"
            x-init="
                Alpine.effect(() => {
                    if (Alpine.store('sidebar').isOpen) {
                        tooltip = false
                    } else {
                        tooltip = {
                            content: <?php echo e(\Illuminate\Support\Js::from($slot->toHtml())); ?>,
                            theme: Alpine.store('theme') === 'light' ? 'dark' : 'light',
                            placement: document.dir === 'rtl' ? 'left' : 'right',
                        }
                    }
                })
            "
            x-tooltip.html="tooltip"
        <?php endif; ?>
        class="<?php echo \Illuminate\Support\Arr::toCssClasses([
            'flex items-center justify-center gap-3 px-3 py-2 rounded-lg font-medium transition',
            'hover:bg-gray-500/5 focus:bg-gray-500/5' => ! $active,
            'dark:text-gray-300 dark:hover:bg-gray-700' => (! $active) && config('filament.dark_mode'),
            'bg-primary-500 text-white' => $active,
        ]) ?>"
    >
        <?php if (isset($component)) { $__componentOriginal3bf0a20793be3eca9a779778cf74145887b021b9 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\DynamicComponent::class, ['component' => $icon] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('dynamic-component'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(Illuminate\View\DynamicComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'h-5 w-5 shrink-0']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3bf0a20793be3eca9a779778cf74145887b021b9)): ?>
<?php $component = $__componentOriginal3bf0a20793be3eca9a779778cf74145887b021b9; ?>
<?php unset($__componentOriginal3bf0a20793be3eca9a779778cf74145887b021b9); ?>
<?php endif; ?>

        <div class="flex flex-1"
            <?php if(config('filament.layout.sidebar.is_collapsible_on_desktop')): ?>
                x-data="{}"
                x-show="$store.sidebar.isOpen"
            <?php endif; ?>
        >
            <span>
                <?php echo e($slot); ?>

            </span>

            <?php if(filled($badge)): ?>
                <span
                    class="<?php echo \Illuminate\Support\Arr::toCssClasses(
                        array_merge(
                            [
                                'inline-flex items-center justify-center ml-auto rtl:ml-0 rtl:mr-auto min-h-4 px-2 py-0.5 text-xs font-medium tracking-tight rounded-xl whitespace-normal',
                                'text-white bg-white/20' => $active,
                            ],
                            match ($badgeColor) {
                                'danger' => [
                                    'text-danger-700 bg-danger-500/10' => ! $active,
                                    'dark:text-danger-500' => (! $active) && config('tables.dark_mode'),
                                ],
                                'secondary' => [
                                    'text-gray-700 bg-gray-500/10' => ! $active,
                                    'dark:text-gray-500' => (! $active) && config('tables.dark_mode'),
                                ],
                                'success' => [
                                    'text-success-700 bg-success-500/10' => ! $active,
                                    'dark:text-success-500' => (! $active) && config('tables.dark_mode'),
                                ],
                                'warning' => [
                                    'text-warning-700 bg-warning-500/10' => ! $active,
                                    'dark:text-warning-500' => (! $active) && config('filament.dark_mode'),
                                ],
                                'primary', null => [
                                    'text-primary-700 bg-primary-500/10' => ! $active,
                                    'dark:text-primary-500' => (! $active) && config('tables.dark_mode'),
                                ],
                                default => [
                                    $badgeColor => ! $active,
                                ],
                            },
                        )
                    ) ?>"
                >
                    <?php echo e($badge); ?>

                </span>
            <?php endif; ?>
        </div>
    </a>
</li>
<?php /**PATH /Users/mat/Projects/AStA/asta-ticket-refund/vendor/filament/filament/resources/views/components/layouts/app/sidebar/item.blade.php ENDPATH**/ ?>