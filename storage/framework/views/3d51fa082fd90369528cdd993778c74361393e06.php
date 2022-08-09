<aside
    x-data="{}"
    <?php if(config('filament.layout.sidebar.is_collapsible_on_desktop')): ?>
        x-cloak
        x-bind:class="$store.sidebar.isOpen ? 'translate-x-0 max-w-[20em] lg:max-w-[var(--sidebar-width)]' : '-translate-x-full lg:translate-x-0 lg:max-w-[5.4em] rtl:lg:-translate-x-0 rtl:translate-x-full'"
    <?php else: ?>
        x-cloak="-lg"
        x-bind:class="$store.sidebar.isOpen ? 'translate-x-0' : '-translate-x-full lg:translate-x-0 rtl:lg:-translate-x-0 rtl:translate-x-full'"
    <?php endif; ?>

    class="<?php echo \Illuminate\Support\Arr::toCssClasses([
        'fixed inset-y-0 left-0 rtl:left-auto rtl:right-0 z-20 flex flex-col h-screen overflow-hidden shadow-2xl transition-all bg-white filament-sidebar lg:border-r rtl:lg:border-r-0 rtl:lg:border-l w-[var(--sidebar-width)] lg:z-0',
        'lg:translate-x-0' => ! config('filament.layout.sidebar.is_collapsible_on_desktop'),
        'dark:bg-gray-800 dark:border-gray-700' => config('filament.dark_mode'),
    ]) ?>"
>
    <header class="<?php echo \Illuminate\Support\Arr::toCssClasses([
        'border-b h-[4rem] shrink-0 px-6 flex items-center filament-sidebar-header',
        'dark:border-gray-700' => config('filament.dark_mode'),
    ]) ?>">
        <a
            href="<?php echo e(config('filament.home_url')); ?>"
            class="block w-full"
            <?php if(config('filament.layout.sidebar.is_collapsible_on_desktop')): ?>
                x-show="$store.sidebar.isOpen"
                x-transition:enter="lg:transition delay-100"
                x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100"
            <?php endif; ?>
        >
            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'filament::components.brand','data' => []] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('filament::brand'); ?>
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
        </a>

        <?php if(config('filament.layout.sidebar.is_collapsible_on_desktop')): ?>
            <a
                class="block w-full text-center"
                href="<?php echo e(config('filament.home_url')); ?>"
                x-show="! $store.sidebar.isOpen"
                x-transition:enter="lg:transition delay-100"
                x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100"
            >
                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'filament::components.brand-icon','data' => []] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('filament::brand-icon'); ?>
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
            </a>
        <?php endif; ?>
    </header>

    <nav class="flex-1 py-6 overflow-y-auto filament-sidebar-nav">
        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'filament::components.layouts.app.sidebar.start','data' => []] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('filament::layouts.app.sidebar.start'); ?>
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
        <?php echo e(\Filament\Facades\Filament::renderHook('sidebar.start')); ?>


        <?php
            $navigation = \Filament\Facades\Filament::getNavigation();

            $collapsedNavigationGroupLabels = collect($navigation)
                ->filter(fn (\Filament\Navigation\NavigationGroup $group): bool => $group->isCollapsed())
                ->map(fn (\Filament\Navigation\NavigationGroup $group): string => $group->getLabel())
                ->values();
        ?>

        <script>
            if (localStorage.getItem('collapsedGroups') === null) {
                localStorage.setItem('collapsedGroups', JSON.stringify(<?php echo \Illuminate\Support\Js::from($collapsedNavigationGroupLabels)->toHtml() ?>))
            }
        </script>

        <ul class="px-6 space-y-6">
            <?php $__currentLoopData = $navigation; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'filament::components.layouts.app.sidebar.group','data' => ['label' => $group->getLabel(),'icon' => $group->getIcon(),'collapsible' => $group->isCollapsible()]] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('filament::layouts.app.sidebar.group'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($group->getLabel()),'icon' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($group->getIcon()),'collapsible' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($group->isCollapsible())]); ?>
                    <?php $__currentLoopData = $group->getItems(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'filament::components.layouts.app.sidebar.item','data' => ['active' => $item->isActive(),'icon' => $item->getIcon(),'url' => $item->getUrl(),'badge' => $item->getBadge(),'badgeColor' => $item->getBadgeColor(),'shouldOpenUrlInNewTab' => $item->shouldOpenUrlInNewTab()]] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('filament::layouts.app.sidebar.item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['active' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($item->isActive()),'icon' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($item->getIcon()),'url' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($item->getUrl()),'badge' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($item->getBadge()),'badgeColor' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($item->getBadgeColor()),'shouldOpenUrlInNewTab' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($item->shouldOpenUrlInNewTab())]); ?>
                            <?php echo e($item->getLabel()); ?>

                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

                <?php if(! $loop->last): ?>
                    <li>
                        <div class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                            'border-t -mr-6 rtl:-mr-auto rtl:-ml-6',
                            'dark:border-gray-700' => config('filament.dark_mode'),
                        ]) ?>"></div>
                    </li>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>

        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'filament::components.layouts.app.sidebar.end','data' => []] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('filament::layouts.app.sidebar.end'); ?>
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
        <?php echo e(\Filament\Facades\Filament::renderHook('sidebar.end')); ?>

    </nav>

    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'filament::components.layouts.app.sidebar.footer','data' => []] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('filament::layouts.app.sidebar.footer'); ?>
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
</aside>
<?php /**PATH /Users/mat/Projects/AStA/asta-ticket-refund/vendor/filament/filament/src/../resources/views/components/layouts/app/sidebar/index.blade.php ENDPATH**/ ?>