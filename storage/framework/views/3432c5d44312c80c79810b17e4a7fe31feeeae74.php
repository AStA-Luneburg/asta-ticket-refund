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
        $isItemCreationDisabled = $isItemCreationDisabled();
        $isItemDeletionDisabled = $isItemDeletionDisabled();
        $isItemMovementDisabled = $isItemMovementDisabled();
    ?>

    <?php if((count($containers) > 1) && $isCollapsible): ?>
        <div class="space-x-2 rtl:space-x-reverse" x-data="{}">
            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'forms::components.link','data' => ['xOn:click' => '$dispatch(\'builder-collapse\', \''.e($getStatePath()).'\')','tag' => 'button','size' => 'sm']] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms::link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['x-on:click' => '$dispatch(\'builder-collapse\', \''.e($getStatePath()).'\')','tag' => 'button','size' => 'sm']); ?>
                <?php echo e(__('forms::components.builder.buttons.collapse_all.label')); ?>

             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'forms::components.link','data' => ['xOn:click' => '$dispatch(\'builder-expand\', \''.e($getStatePath()).'\')','tag' => 'button','size' => 'sm']] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms::link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['x-on:click' => '$dispatch(\'builder-expand\', \''.e($getStatePath()).'\')','tag' => 'button','size' => 'sm']); ?>
                <?php echo e(__('forms::components.builder.buttons.expand_all.label')); ?>

             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
        </div>
    <?php endif; ?>

    <div <?php echo e($attributes->merge($getExtraAttributes())->class([
        'space-y-6 rounded-xl filament-forms-builder-component',
        'bg-gray-50 p-6' => $isInset(),
        'dark:bg-gray-500/10' => $isInset() && config('forms.dark_mode'),
    ])); ?>>
        <?php if(count($containers)): ?>
            <ul
                class="space-y-12"
                wire:sortable
                wire:end.stop="dispatchFormEvent('builder::moveItems', '<?php echo e($getStatePath()); ?>', $event.target.sortable.toArray())"
            >
                <?php
                    $hasBlockLabels = $hasBlockLabels();
                    $hasBlockNumbers = $hasBlockNumbers();
                ?>

                <?php $__currentLoopData = $containers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $uuid => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li
                        x-data="{
                            isCreateButtonVisible: false,
                            isCollapsed: <?php echo \Illuminate\Support\Js::from($isCollapsed())->toHtml() ?>,
                        }"
                        x-on:builder-collapse.window="$event.detail === '<?php echo e($getStatePath()); ?>' && (isCollapsed = true)"
                        x-on:builder-expand.window="$event.detail === '<?php echo e($getStatePath()); ?>' && (isCollapsed = false)"
                        x-on:click="isCreateButtonVisible = true"
                        x-on:mouseenter="isCreateButtonVisible = true"
                        x-on:click.away="isCreateButtonVisible = false"
                        x-on:mouseleave="isCreateButtonVisible = false"
                        wire:key="<?php echo e($this->id); ?>.<?php echo e($item->getStatePath()); ?>.item"
                        wire:sortable.item="<?php echo e($uuid); ?>"
                        class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                            'bg-white border border-gray-300 shadow-sm rounded-xl relative',
                            'dark:bg-gray-800 dark:border-gray-600' => config('forms.dark_mode'),
                        ]) ?>"
                    >
                        <?php if((! $isItemMovementDisabled) || $hasBlockLabels || (! $isItemDeletionDisabled) || $isCollapsible): ?>
                            <header class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                                'flex items-center h-10 overflow-hidden border-b bg-gray-50 rounded-t-xl',
                                'dark:bg-gray-800 dark:border-gray-700' => config('forms.dark_mode'),
                            ]) ?>">
                                <?php if (! ($isItemMovementDisabled)): ?>
                                    <button
                                        wire:sortable.handle
                                        wire:keydown.prevent.arrow-up="dispatchFormEvent('builder::moveItemUp', '<?php echo e($getStatePath()); ?>', '<?php echo e($uuid); ?>')"
                                        wire:keydown.prevent.arrow-down="dispatchFormEvent('builder::moveItemDown', '<?php echo e($getStatePath()); ?>', '<?php echo e($uuid); ?>')"
                                        type="button"
                                        class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                                            'flex items-center justify-center flex-none w-10 h-10 text-gray-400 border-r rtl:border-l rtl:border-r-0 transition hover:text-gray-300',
                                            'dark:text-gray-400 dark:border-gray-700 dark:hover:text-gray-500' => config('forms.dark_mode'),
                                        ]) ?>"
                                    >
                                        <span class="sr-only">
                                            <?php echo e(__('forms::components.builder.buttons.move_item_down.label')); ?>

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

                                <?php if($hasBlockLabels): ?>
                                    <p class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                                        'flex-none px-4 text-xs font-medium text-gray-600 truncate',
                                        'dark:text-gray-400' => config('forms.dark_mode'),
                                    ]) ?>">
                                        <?php
                                            $block = $item->getParentComponent();

                                            $block->labelState($item->getRawState());
                                        ?>

                                        <?php echo e($item->getParentComponent()->getLabel()); ?>


                                        <?php
                                            $block->labelState(null);
                                        ?>

                                        <?php if($hasBlockNumbers): ?>
                                            <small class="font-mono"><?php echo e($loop->iteration); ?></small>
                                        <?php endif; ?>
                                    </p>
                                <?php endif; ?>

                                <div class="flex-1"></div>

                                <ul class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                                    'flex divide-x rtl:divide-x-reverse',
                                    'dark:divide-gray-700' => config('forms.dark_mode'),
                                ]) ?>">
                                    <?php if (! ($isItemDeletionDisabled)): ?>
                                        <li>
                                            <button
                                                wire:click="dispatchFormEvent('builder::deleteItem', '<?php echo e($getStatePath()); ?>', '<?php echo e($uuid); ?>')"
                                                type="button"
                                                class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                                                    'flex items-center justify-center flex-none w-10 h-10 text-danger-600 transition hover:text-danger-500',
                                                    'dark:text-danger-500 dark:hover:text-danger-400' => config('forms.dark_mode'),
                                                ]) ?>"
                                            >
                                                <span class="sr-only">
                                                    <?php echo e(__('forms::components.builder.buttons.delete_item.label')); ?>

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
                                                x-on:click="isCollapsed = !isCollapsed"
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
                                                    <?php echo e(__('forms::components.builder.buttons.collapse_item.label')); ?>

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
                                                    <?php echo e(__('forms::components.builder.buttons.expand_item.label')); ?>

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
                            <?php echo e(__('forms::components.builder.collapsed')); ?>

                        </div>

                        <?php if((! $loop->last) && (! $isItemCreationDisabled) && (! $isItemMovementDisabled)): ?>
                            <div
                                x-show="isCreateButtonVisible"
                                x-transition
                                class="absolute inset-x-0 bottom-0 z-10 flex items-center justify-center h-12 -mb-12"
                            >
                                <div x-data class="relative flex justify-center">
                                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'forms::components.icon-button','data' => ['label' => $getCreateItemBetweenButtonLabel(),'icon' => 'heroicon-o-plus','xOn:click' => '$refs.panel.toggle','type' => 'button']] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms::icon-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($getCreateItemBetweenButtonLabel()),'icon' => 'heroicon-o-plus','x-on:click' => '$refs.panel.toggle','type' => 'button']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

                                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'forms::components.builder.block-picker','data' => ['blocks' => $getBlocks(),'createAfterItem' => $uuid,'statePath' => $getStatePath(),'class' => 'py-2']] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms::builder.block-picker'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['blocks' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($getBlocks()),'create-after-item' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($uuid),'state-path' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($getStatePath()),'class' => 'py-2']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                                </div>
                            </div>
                        <?php endif; ?>
                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        <?php endif; ?>

        <?php if(! $isItemCreationDisabled): ?>
            <div x-data class="relative flex justify-center">
                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'forms::components.button','data' => ['size' => 'sm','xOn:click' => '$refs.panel.toggle','type' => 'button']] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms::button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['size' => 'sm','x-on:click' => '$refs.panel.toggle','type' => 'button']); ?>
                    <?php echo e($getCreateItemButtonLabel()); ?>

                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'forms::components.builder.block-picker','data' => ['blocks' => $getBlocks(),'statePath' => $getStatePath()]] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms::builder.block-picker'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['blocks' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($getBlocks()),'state-path' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($getStatePath())]); ?>
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
<?php /**PATH /Users/mat/Projects/AStA/asta-ticket-refund/vendor/filament/forms/resources/views/components/builder.blade.php ENDPATH**/ ?>