<?php if (isset($component)) { $__componentOriginal3bf0a20793be3eca9a779778cf74145887b021b9 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\DynamicComponent::class, ['component' => $getFieldWrapperView()] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('dynamic-component'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(Illuminate\View\DynamicComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => $getId(),'label' => $getLabel(),'label-sr-only' => $isLabelHidden(),'helper-text' => $getHelperText(),'hint' => $getHint(),'hint-icon' => $getHintIcon(),'required' => $isRequired(),'state-path' => $getStatePath()]); ?>
    <?php
        $containers = $getChildComponentContainers();

        $isCollapsible = $isCollapsible();
        $isCloneable = $isCloneable();
        $isItemCreationDisabled = $isItemCreationDisabled();
        $isItemDeletionDisabled = $isItemDeletionDisabled();
        $isItemMovementDisabled = $isItemMovementDisabled();
        $hasItemLabels = $hasItemLabels();
    ?>

    <?php if((count($containers) > 1) && $isCollapsible): ?>
        <div class="space-x-2 rtl:space-x-reverse" x-data="{}">
            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'forms::components.link','data' => ['xOn:click' => '$dispatch(\'repeater-collapse\', \''.e($getStatePath()).'\')','tag' => 'button','size' => 'sm']] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms::link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['x-on:click' => '$dispatch(\'repeater-collapse\', \''.e($getStatePath()).'\')','tag' => 'button','size' => 'sm']); ?>
                <?php echo e(__('forms::components.repeater.buttons.collapse_all.label')); ?>

             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'forms::components.link','data' => ['xOn:click' => '$dispatch(\'repeater-expand\', \''.e($getStatePath()).'\')','tag' => 'button','size' => 'sm']] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms::link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['x-on:click' => '$dispatch(\'repeater-expand\', \''.e($getStatePath()).'\')','tag' => 'button','size' => 'sm']); ?>
                <?php echo e(__('forms::components.repeater.buttons.expand_all.label')); ?>

             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
        </div>
    <?php endif; ?>

    <div <?php echo e($attributes->merge($getExtraAttributes())->class([
        'space-y-6 rounded-xl filament-forms-repeater-component',
        'bg-gray-50 p-6' => $isInset(),
        'dark:bg-gray-500/10' => $isInset() && config('forms.dark_mode'),
    ])); ?>>
        <?php if(count($containers)): ?>
            <ul>
                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'filament-support::components.grid','data' => ['default' => $getGridColumns('default'),'sm' => $getGridColumns('sm'),'md' => $getGridColumns('md'),'lg' => $getGridColumns('lg'),'xl' => $getGridColumns('xl'),'twoXl' => $getGridColumns('2xl'),'wire:sortable' => true,'wire:end.stop' => 'dispatchFormEvent(\'repeater::moveItems\', \''.e($getStatePath()).'\', $event.target.sortable.toArray())','class' => 'gap-6']] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('filament-support::grid'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['default' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($getGridColumns('default')),'sm' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($getGridColumns('sm')),'md' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($getGridColumns('md')),'lg' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($getGridColumns('lg')),'xl' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($getGridColumns('xl')),'two-xl' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($getGridColumns('2xl')),'wire:sortable' => true,'wire:end.stop' => 'dispatchFormEvent(\'repeater::moveItems\', \''.e($getStatePath()).'\', $event.target.sortable.toArray())','class' => 'gap-6']); ?>
                    <?php $__currentLoopData = $containers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $uuid => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li
                            x-data="{ isCollapsed: <?php echo \Illuminate\Support\Js::from($isCollapsed())->toHtml() ?> }"
                            x-on:repeater-collapse.window="$event.detail === '<?php echo e($getStatePath()); ?>' && (isCollapsed = true)"
                            x-on:repeater-expand.window="$event.detail === '<?php echo e($getStatePath()); ?>' && (isCollapsed = false)"
                            wire:key="<?php echo e($this->id); ?>.<?php echo e($item->getStatePath()); ?>.item"
                            wire:sortable.item="<?php echo e($uuid); ?>"
                            class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                                'bg-white border border-gray-300 shadow-sm rounded-xl relative',
                                'dark:bg-gray-800 dark:border-gray-600' => config('forms.dark_mode'),
                            ]) ?>"
                        >
                            <?php if((! $isItemMovementDisabled) || (! $isItemDeletionDisabled) || $isCloneable || $isCollapsible || $hasItemLabels): ?>
                                <header class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                                    'flex items-center h-10 overflow-hidden border-b bg-gray-50 rounded-t-xl',
                                    'dark:bg-gray-800 dark:border-gray-700' => config('forms.dark_mode'),
                                ]) ?>">
                                    <?php if (! ($isItemMovementDisabled)): ?>
                                        <button
                                            wire:sortable.handle
                                            wire:keydown.prevent.arrow-up="dispatchFormEvent('repeater::moveItemUp', '<?php echo e($getStatePath()); ?>', '<?php echo e($uuid); ?>')"
                                            wire:keydown.prevent.arrow-down="dispatchFormEvent('repeater::moveItemDown', '<?php echo e($getStatePath()); ?>', '<?php echo e($uuid); ?>')"
                                            type="button"
                                            class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                                                'flex items-center justify-center flex-none w-10 h-10 text-gray-400 border-r transition hover:text-gray-300',
                                                'dark:text-gray-400 dark:border-gray-700 dark:hover:text-gray-500' => config('forms.dark_mode'),
                                            ]) ?>"
                                        >
                                            <span class="sr-only">
                                                <?php echo e(__('forms::components.repeater.buttons.move_item_down.label')); ?>

                                            </span>

                                            <?php if (isset($component)) { $__componentOriginalcd9972c8156dfa6e5fd36675ca7bf5f21b506e2e = $component; } ?>
<?php $component = $__env->getContainer()->make(BladeUI\Icons\Components\Svg::class, [] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('heroicon-s-switch-vertical'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(BladeUI\Icons\Components\Svg::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-4 h-4']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalcd9972c8156dfa6e5fd36675ca7bf5f21b506e2e)): ?>
<?php $component = $__componentOriginalcd9972c8156dfa6e5fd36675ca7bf5f21b506e2e; ?>
<?php unset($__componentOriginalcd9972c8156dfa6e5fd36675ca7bf5f21b506e2e); ?>
<?php endif; ?>
                                        </button>
                                    <?php endif; ?>

                                    <p class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                                        'flex-none px-4 text-xs font-medium text-gray-600 truncate',
                                        'dark:text-gray-400' => config('forms.dark_mode'),
                                    ]) ?>">
                                        <?php echo e($getItemLabel($uuid)); ?>

                                    </p>

                                    <div class="flex-1"></div>

                                    <ul class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                                        'flex divide-x rtl:divide-x-reverse',
                                        'dark:divide-gray-700' => config('forms.dark_mode'),
                                    ]) ?>">
                                        <?php if($isCloneable): ?>
                                            <li>
                                                <button
                                                    wire:click="dispatchFormEvent('repeater::cloneItem', '<?php echo e($getStatePath()); ?>', '<?php echo e($uuid); ?>')"
                                                    type="button"
                                                    class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                                                        'flex items-center justify-center flex-none w-10 h-10 text-gray-400 transition hover:text-gray-300',
                                                        'dark:text-gray-400 dark:border-gray-700 dark:hover:text-gray-500' => config('forms.dark_mode'),
                                                    ]) ?>"
                                                >
                                                    <span class="sr-only">
                                                        <?php echo e(__('forms::components.repeater.buttons.clone_item.label')); ?>

                                                    </span>

                                                    <?php if (isset($component)) { $__componentOriginalcd9972c8156dfa6e5fd36675ca7bf5f21b506e2e = $component; } ?>
<?php $component = $__env->getContainer()->make(BladeUI\Icons\Components\Svg::class, [] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('heroicon-s-duplicate'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(BladeUI\Icons\Components\Svg::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-4 h-4']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalcd9972c8156dfa6e5fd36675ca7bf5f21b506e2e)): ?>
<?php $component = $__componentOriginalcd9972c8156dfa6e5fd36675ca7bf5f21b506e2e; ?>
<?php unset($__componentOriginalcd9972c8156dfa6e5fd36675ca7bf5f21b506e2e); ?>
<?php endif; ?>
                                                </button>
                                            </li>
                                        <?php endif; ?>

                                        <?php if (! ($isItemDeletionDisabled)): ?>
                                            <li>
                                                <button
                                                    wire:click="dispatchFormEvent('repeater::deleteItem', '<?php echo e($getStatePath()); ?>', '<?php echo e($uuid); ?>')"
                                                    type="button"
                                                    class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                                                        'flex items-center justify-center flex-none w-10 h-10 text-danger-600 transition hover:text-danger-500',
                                                        'dark:text-danger-500 dark:hover:text-danger-400' => config('forms.dark_mode'),
                                                    ]) ?>"
                                                >
                                                    <span class="sr-only">
                                                        <?php echo e(__('forms::components.repeater.buttons.delete_item.label')); ?>

                                                    </span>

                                                    <?php if (isset($component)) { $__componentOriginalcd9972c8156dfa6e5fd36675ca7bf5f21b506e2e = $component; } ?>
<?php $component = $__env->getContainer()->make(BladeUI\Icons\Components\Svg::class, [] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('heroicon-s-trash'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(BladeUI\Icons\Components\Svg::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-4 h-4']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalcd9972c8156dfa6e5fd36675ca7bf5f21b506e2e)): ?>
<?php $component = $__componentOriginalcd9972c8156dfa6e5fd36675ca7bf5f21b506e2e; ?>
<?php unset($__componentOriginalcd9972c8156dfa6e5fd36675ca7bf5f21b506e2e); ?>
<?php endif; ?>
                                                </button>
                                            </li>
                                        <?php endif; ?>

                                        <?php if($isCollapsible): ?>
                                            <li>
                                                <button
                                                    x-on:click="isCollapsed = ! isCollapsed"
                                                    type="button"
                                                    class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                                                        'flex items-center justify-center flex-none w-10 h-10 text-gray-400 transition hover:text-gray-300',
                                                        'dark:text-gray-400 dark:hover:text-gray-500' => config('forms.dark_mode'),
                                                    ]) ?>"
                                                >
                                                    <?php if (isset($component)) { $__componentOriginalcd9972c8156dfa6e5fd36675ca7bf5f21b506e2e = $component; } ?>
<?php $component = $__env->getContainer()->make(BladeUI\Icons\Components\Svg::class, [] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('heroicon-s-minus-sm'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(BladeUI\Icons\Components\Svg::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-4 h-4','x-show' => '! isCollapsed']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalcd9972c8156dfa6e5fd36675ca7bf5f21b506e2e)): ?>
<?php $component = $__componentOriginalcd9972c8156dfa6e5fd36675ca7bf5f21b506e2e; ?>
<?php unset($__componentOriginalcd9972c8156dfa6e5fd36675ca7bf5f21b506e2e); ?>
<?php endif; ?>

                                                    <span class="sr-only" x-show="! isCollapsed">
                                                        <?php echo e(__('forms::components.repeater.buttons.collapse_item.label')); ?>

                                                    </span>

                                                    <?php if (isset($component)) { $__componentOriginalcd9972c8156dfa6e5fd36675ca7bf5f21b506e2e = $component; } ?>
<?php $component = $__env->getContainer()->make(BladeUI\Icons\Components\Svg::class, [] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('heroicon-s-plus-sm'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(BladeUI\Icons\Components\Svg::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-4 h-4','x-show' => 'isCollapsed','x-cloak' => true]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalcd9972c8156dfa6e5fd36675ca7bf5f21b506e2e)): ?>
<?php $component = $__componentOriginalcd9972c8156dfa6e5fd36675ca7bf5f21b506e2e; ?>
<?php unset($__componentOriginalcd9972c8156dfa6e5fd36675ca7bf5f21b506e2e); ?>
<?php endif; ?>

                                                    <span class="sr-only" x-show="isCollapsed" x-cloak>
                                                        <?php echo e(__('forms::components.repeater.buttons.expand_item.label')); ?>

                                                    </span>
                                                </button>
                                            </li>
                                        <?php endif; ?>
                                    </ul>
                                </header>
                            <?php endif; ?>

                            <div class="p-6" x-show="! isCollapsed">
                                <?php echo e($item); ?>

                            </div>

                            <div class="p-2 text-xs text-center text-gray-400" x-show="isCollapsed" x-cloak>
                                <?php echo e(__('forms::components.repeater.collapsed')); ?>

                            </div>
                        </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
            </ul>
        <?php endif; ?>

        <?php if(! $isItemCreationDisabled): ?>
            <div class="relative flex justify-center">
                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'forms::components.button','data' => ['wire:click' => 'dispatchFormEvent(\'repeater::createItem\', \'' . $getStatePath() . '\')','size' => 'sm','type' => 'button']] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms::button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:click' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('dispatchFormEvent(\'repeater::createItem\', \'' . $getStatePath() . '\')'),'size' => 'sm','type' => 'button']); ?>
                    <?php echo e($getCreateItemButtonLabel()); ?>

                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
            </div>
        <?php endif; ?>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3bf0a20793be3eca9a779778cf74145887b021b9)): ?>
<?php $component = $__componentOriginal3bf0a20793be3eca9a779778cf74145887b021b9; ?>
<?php unset($__componentOriginal3bf0a20793be3eca9a779778cf74145887b021b9); ?>
<?php endif; ?>
<?php /**PATH /Users/mat/Projects/AStA/asta-ticket-refund/vendor/filament/forms/resources/views/components/repeater.blade.php ENDPATH**/ ?>