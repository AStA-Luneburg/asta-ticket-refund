<?php foreach($attributes->onlyProps([
    'paginator',
    'recordsPerPageSelectOptions',
]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps([
    'paginator',
    'recordsPerPageSelectOptions',
]); ?>
<?php foreach (array_filter(([
    'paginator',
    'recordsPerPageSelectOptions',
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<?php
    $isSimple = ! $paginator instanceof \Illuminate\Pagination\LengthAwarePaginator;
    $isRtl = __('filament::layout.direction') === 'rtl';
    $previousArrowIcon = $isRtl ? 'heroicon-o-chevron-right' : 'heroicon-o-chevron-left';
    $nextArrowIcon = $isRtl ? 'heroicon-o-chevron-left' : 'heroicon-o-chevron-right';
?>

<nav
    role="navigation"
    aria-label="<?php echo e(__('tables::table.pagination.label')); ?>"
    class="flex items-center justify-between filament-tables-pagination"
>
    <div class="flex justify-between items-center flex-1 lg:hidden">
        <div class="w-10">
            <?php if($paginator->hasPages() && (! $paginator->onFirstPage())): ?>
                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'tables::components.icon-button','data' => ['wire:click' => 'previousPage(\'' . $paginator->getPageName() . '\')','rel' => 'prev','icon' => $previousArrowIcon,'label' => __('tables::table.pagination.buttons.previous.label')]] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('tables::icon-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:click' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('previousPage(\'' . $paginator->getPageName() . '\')'),'rel' => 'prev','icon' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($previousArrowIcon),'label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('tables::table.pagination.buttons.previous.label'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
            <?php endif; ?>
        </div>

        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'tables::components.pagination.records-per-page-selector','data' => ['options' => $recordsPerPageSelectOptions]] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('tables::pagination.records-per-page-selector'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['options' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($recordsPerPageSelectOptions)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

        <div class="w-10">
            <?php if($paginator->hasPages() && $paginator->hasMorePages()): ?>
                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'tables::components.icon-button','data' => ['wire:click' => 'nextPage(\'' . $paginator->getPageName() . '\')','rel' => 'next','icon' => $nextArrowIcon,'label' => __('tables::table.pagination.buttons.next.label')]] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('tables::icon-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:click' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('nextPage(\'' . $paginator->getPageName() . '\')'),'rel' => 'next','icon' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($nextArrowIcon),'label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('tables::table.pagination.buttons.next.label'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
            <?php endif; ?>
        </div>
    </div>

    <div class="hidden flex-1 items-center lg:grid grid-cols-3">
        <div class="flex items-center">
            <?php if($isSimple): ?>
                <?php if(! $paginator->onFirstPage()): ?>
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'tables::components.button','data' => ['wire:click' => 'previousPage(\'' . $paginator->getPageName() . '\')','icon' => $previousArrowIcon,'rel' => 'prev','size' => 'sm','color' => 'secondary']] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('tables::button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:click' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('previousPage(\'' . $paginator->getPageName() . '\')'),'icon' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($previousArrowIcon),'rel' => 'prev','size' => 'sm','color' => 'secondary']); ?>
                        <?php echo e(__('tables::table.pagination.buttons.previous.label')); ?>

                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                <?php endif; ?>
            <?php else: ?>
                <div class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                    'pl-2 text-sm font-medium',
                    'dark:text-white' => config('tables.dark_mode'),
                ]) ?>">
                    <?php if($paginator->total() > 1): ?>
                        <?php echo e(__('tables::table.pagination.overview', [
                            'first' => $paginator->firstItem(),
                            'last' => $paginator->lastItem(),
                            'total' => $paginator->total(),
                        ])); ?>

                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </div>

        <div class="flex items-center justify-center">
            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'tables::components.pagination.records-per-page-selector','data' => ['options' => $recordsPerPageSelectOptions]] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('tables::pagination.records-per-page-selector'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['options' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($recordsPerPageSelectOptions)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
        </div>

        <div class="flex items-center justify-end">
            <?php if($isSimple): ?>
                <?php if($paginator->hasMorePages()): ?>
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'tables::components.button','data' => ['wire:click' => 'nextPage(\'' . $paginator->getPageName() . '\')','icon' => $nextArrowIcon,'iconPosition' => 'after','rel' => 'next','size' => 'sm','color' => 'secondary']] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('tables::button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:click' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('nextPage(\'' . $paginator->getPageName() . '\')'),'icon' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($nextArrowIcon),'icon-position' => 'after','rel' => 'next','size' => 'sm','color' => 'secondary']); ?>
                        <?php echo e(__('tables::table.pagination.buttons.next.label')); ?>

                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                <?php endif; ?>
            <?php else: ?>
                <?php if($paginator->hasPages()): ?>
                    <div class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                        'py-3 border rounded-lg',
                        'dark:border-gray-600' => config('tables.dark_mode'),
                    ]) ?>">
                        <ol class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                            'flex items-center text-sm text-gray-500 divide-x rtl:divide-x-reverse divide-gray-300',
                            'dark:text-gray-400 dark:divide-gray-600' => config('tables.dark_mode'),
                        ]) ?>">
                            <?php if(! $paginator->onFirstPage()): ?>
                                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'tables::components.pagination.item','data' => ['wire:click' => 'previousPage(\'' . $paginator->getPageName() . '\')','icon' => 'heroicon-s-chevron-left','ariaLabel' => ''.e(__('tables::table.pagination.buttons.previous.label')).'','rel' => 'prev']] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('tables::pagination.item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:click' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('previousPage(\'' . $paginator->getPageName() . '\')'),'icon' => 'heroicon-s-chevron-left','aria-label' => ''.e(__('tables::table.pagination.buttons.previous.label')).'','rel' => 'prev']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                            <?php endif; ?>

                            <?php $__currentLoopData = $paginator->render()->offsetGet('elements'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if(is_string($element)): ?>
                                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'tables::components.pagination.item','data' => ['label' => $element,'disabled' => true]] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('tables::pagination.item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($element),'disabled' => true]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                                <?php endif; ?>

                                <?php if(is_array($element)): ?>
                                    <?php $__currentLoopData = $element; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page => $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'tables::components.pagination.item','data' => ['wire:click' => 'gotoPage(' . $page . ', \'' . $paginator->getPageName() . '\')','label' => $page,'ariaLabel' => __('tables::table.pagination.buttons.go_to_page.label', ['page' => $page]),'active' => $page === $paginator->currentPage(),'wire:key' => $this->id . '.table.pagination.' . $paginator->getPageName() . '.' . $page]] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('tables::pagination.item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:click' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('gotoPage(' . $page . ', \'' . $paginator->getPageName() . '\')'),'label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($page),'aria-label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('tables::table.pagination.buttons.go_to_page.label', ['page' => $page])),'active' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($page === $paginator->currentPage()),'wire:key' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($this->id . '.table.pagination.' . $paginator->getPageName() . '.' . $page)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            <?php if($paginator->hasMorePages()): ?>
                                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'tables::components.pagination.item','data' => ['wire:click' => 'nextPage(\'' . $paginator->getPageName() . '\')','icon' => 'heroicon-s-chevron-right','ariaLabel' => ''.e(__('tables::table.pagination.buttons.next.label')).'','rel' => 'next']] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('tables::pagination.item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:click' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('nextPage(\'' . $paginator->getPageName() . '\')'),'icon' => 'heroicon-s-chevron-right','aria-label' => ''.e(__('tables::table.pagination.buttons.next.label')).'','rel' => 'next']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                            <?php endif; ?>
                        </ol>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
        </div>
    </div>
</nav>
<?php /**PATH /Users/mat/Projects/AStA/asta-ticket-refund/vendor/filament/tables/resources/views/components/pagination/index.blade.php ENDPATH**/ ?>