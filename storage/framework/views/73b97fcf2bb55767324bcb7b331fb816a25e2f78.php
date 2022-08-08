<?php foreach($attributes->onlyProps([
    'activeManager',
    'managers',
    'ownerRecord',
    'pageClass',
]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps([
    'activeManager',
    'managers',
    'ownerRecord',
    'pageClass',
]); ?>
<?php foreach (array_filter(([
    'activeManager',
    'managers',
    'ownerRecord',
    'pageClass',
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<div class="space-y-2 filament-resources-relation-managers-container">
    <?php if(count($managers) > 1): ?>
        <div class="flex justify-center">
            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'filament::components.tabs.index','data' => []] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('filament::tabs'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                <?php $__currentLoopData = $managers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $managerKey => $manager): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <button
                        wire:click="$set('activeRelationManager', '<?php echo e($managerKey); ?>')"
                        <?php if($activeManager == $managerKey): ?>
                            aria-selected
                            tabindex="0"
                        <?php else: ?>
                            tabindex="-1"
                        <?php endif; ?>
                        role="tab"
                        type="button"
                        class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                            'flex whitespace-nowrap items-center h-8 px-5 font-medium rounded-lg whitespace-nowrap focus:outline-none focus:ring-2 focus:ring-primary-600 focus:ring-inset',
                            'hover:text-gray-800 focus:text-primary-600' => $activeManager != $managerKey,
                            'dark:text-gray-400 dark:hover:text-gray-300 dark:focus:text-gray-400' => ($activeManager != $managerKey) && config('filament.dark_mode'),
                            'text-primary-600 shadow bg-white' => $activeManager == $managerKey,
                            'dark:text-white dark:bg-primary-600' => ($activeManager == $managerKey) && config('filament.dark_mode'),
                        ]) ?>"
                    >
                        <?php echo e($manager instanceof \Filament\Resources\RelationManagers\RelationGroup ? $manager->getLabel() : $manager::getTitleForRecord($ownerRecord)); ?>

                    </button>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
        </div>
    <?php endif; ?>

    <?php if(filled($activeManager)): ?>
        <div
            <?php if(count($managers) > 1): ?>
                id="relationManager<?php echo e(ucfirst($activeManager)); ?>"
                role="tabpanel"
                tabindex="0"
            <?php endif; ?>
            class="space-y-4 focus:outline-none"
        >
            <?php if($managers[$activeManager] instanceof \Filament\Resources\RelationManagers\RelationGroup): ?>
                <?php $__currentLoopData = $managers[$activeManager]->getManagers(ownerRecord: $ownerRecord); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $groupedManager): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount(\Livewire\Livewire::getAlias($groupedManager, $groupedManager::getName()), ['ownerRecord' => $ownerRecord])->html();
} elseif ($_instance->childHasBeenRendered($groupedManager)) {
    $componentId = $_instance->getRenderedChildComponentId($groupedManager);
    $componentTag = $_instance->getRenderedChildComponentTagName($groupedManager);
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild($groupedManager);
} else {
    $response = \Livewire\Livewire::mount(\Livewire\Livewire::getAlias($groupedManager, $groupedManager::getName()), ['ownerRecord' => $ownerRecord]);
    $html = $response->html();
    $_instance->logRenderedChild($groupedManager, $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php else: ?>
                <?php
                    $manager = $managers[$activeManager];
                ?>

                <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount(\Livewire\Livewire::getAlias($manager, $manager::getName()), ['ownerRecord' => $ownerRecord, 'pageClass' => $pageClass])->html();
} elseif ($_instance->childHasBeenRendered($manager)) {
    $componentId = $_instance->getRenderedChildComponentId($manager);
    $componentTag = $_instance->getRenderedChildComponentTagName($manager);
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild($manager);
} else {
    $response = \Livewire\Livewire::mount(\Livewire\Livewire::getAlias($manager, $manager::getName()), ['ownerRecord' => $ownerRecord, 'pageClass' => $pageClass]);
    $html = $response->html();
    $_instance->logRenderedChild($manager, $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
            <?php endif; ?>
        </div>
    <?php endif; ?>
</div>
<?php /**PATH /Users/mat/Projects/AStA/asta-ticket-refund/vendor/filament/filament/src/../resources/views/components/resources/relation-managers/index.blade.php ENDPATH**/ ?>