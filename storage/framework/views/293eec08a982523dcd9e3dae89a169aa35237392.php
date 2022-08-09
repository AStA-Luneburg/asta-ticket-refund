<?php if (isset($component)) { $__componentOriginal3bf0a20793be3eca9a779778cf74145887b021b9 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\DynamicComponent::class, ['component' => $getFieldWrapperView()] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('dynamic-component'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(Illuminate\View\DynamicComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => $getId(),'label' => $getLabel(),'label-sr-only' => $isLabelHidden(),'helper-text' => $getHelperText(),'hint' => $getHint(),'hint-icon' => $getHintIcon(),'required' => $isRequired(),'state-path' => $getStatePath()]); ?>
    <div
        x-data="keyValueFormComponent({
            state: $wire.<?php echo e($applyStateBindingModifiers('entangle(\'' . $getStatePath() . '\')')); ?>,
        })"
        <?php echo e($attributes->merge($getExtraAttributes())->class(['filament-forms-key-value-component'])); ?>

        <?php echo e($getExtraAlpineAttributeBag()); ?>

    >
        <div class="<?php echo \Illuminate\Support\Arr::toCssClasses([
            'border border-gray-300 divide-y shadow-sm bg-white rounded-xl overflow-hidden',
            'dark:bg-gray-700 dark:border-gray-600 dark:divide-gray-600' => config('forms.dark_mode'),
        ]) ?>">
            <table class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                'w-full text-left rtl:text-right divide-y table-auto',
                'dark:divide-gray-700' => config('forms.dark_mode'),
            ]) ?>">
                <thead>
                    <tr class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                        'bg-gray-50',
                        'dark:bg-gray-800/60' => config('forms.dark_mode'),
                    ]) ?>">
                        <th class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                            'px-4 py-2 whitespace-nowrap font-medium text-sm text-gray-600',
                            'dark:text-gray-300' => config('forms.dark_mode'),
                        ]) ?>" scope="col">
                            <?php echo e($getKeyLabel()); ?>

                        </th>

                        <th class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                            'px-4 py-2 whitespace-nowrap font-medium text-sm text-gray-600',
                            'dark:text-gray-300' => config('forms.dark_mode'),
                        ]) ?>" scope="col">
                            <?php echo e($getValueLabel()); ?>

                        </th>

                        <?php if($canDeleteRows() && $getDeleteButtonLabel() && $isEnabled()): ?>
                            <th class="w-12" scope="col" x-show="rows.length > 1">
                                <span class="sr-only">
                                    <?php echo e($getDeleteButtonLabel()); ?>

                                </span>
                            </th>
                        <?php endif; ?>
                    </tr>
                </thead>

                <tbody
                    x-ref="tableBody"
                    class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                        'divide-y whitespace-nowrap',
                        'dark:divide-gray-600' => config('forms.dark_mode'),
                    ]) ?>"
                >
                    <template x-for="(row, index) in rows" x-bind:key="index" x-ref="rowTemplate">
                        <tr class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                            'divide-x',
                            'dark:divide-gray-600' => config('forms.dark_mode'),
                        ]) ?>">
                            <td>
                                <input
                                    type="text"
                                    x-model="row.key"
                                    x-on:input.debounce.<?php echo e($getDebounce() ?? '500ms'); ?>="updateState"
                                    <?php echo ($placeholder = $getKeyPlaceholder()) ? "placeholder=\"{$placeholder}\"" : ''; ?>

                                    <?php if((! $canEditKeys()) || $isDisabled()): ?>
                                        disabled
                                    <?php endif; ?>
                                    class="w-full px-4 py-3 font-mono text-sm bg-transparent border-0 focus:ring-0"
                                >
                            </td>

                            <td class="whitespace-nowrap">
                                <input
                                    type="text"
                                    x-model="row.value"
                                    x-on:input.debounce.<?php echo e($getDebounce() ?? '500ms'); ?>="updateState"
                                    <?php echo ($placeholder = $getValuePlaceholder()) ? "placeholder=\"{$placeholder}\"" : ''; ?>

                                    <?php if((! $canEditValues()) || $isDisabled()): ?>
                                        disabled
                                    <?php endif; ?>
                                    class="w-full px-4 py-3 font-mono text-sm bg-transparent border-0 focus:ring-0"
                                >
                            </td>

                            <?php if($canDeleteRows() && $isEnabled()): ?>
                                <td x-show="rows.length > 1" class="whitespace-nowrap">
                                    <div class="flex items-center justify-center">
                                        <button
                                            x-on:click="deleteRow(index)"
                                            type="button"
                                            class="text-danger-600 hover:text-danger-700"
                                        >
                                            <?php if (isset($component)) { $__componentOriginalcd9972c8156dfa6e5fd36675ca7bf5f21b506e2e = $component; } ?>
<?php $component = $__env->getContainer()->make(BladeUI\Icons\Components\Svg::class, [] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('heroicon-o-trash'); ?>
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
                                    </div>
                                </td>
                            <?php endif; ?>
                        </tr>
                    </template>
                </tbody>
            </table>

            <?php if($canAddRows() && $isEnabled()): ?>
                <button
                    x-on:click="addRow"
                    type="button"
                    class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                        'w-full px-4 py-2 flex items-center space-x-1 rtl:space-x-reverse text-sm font-medium text-gray-800 hover:bg-gray-50 focus:bg-gray-50',
                        'dark:text-white dark:bg-gray-800/60 dark:hover:bg-gray-800/30' => config('forms.dark_mode'),
                    ]) ?>"
                >
                    <?php if (isset($component)) { $__componentOriginalcd9972c8156dfa6e5fd36675ca7bf5f21b506e2e = $component; } ?>
<?php $component = $__env->getContainer()->make(BladeUI\Icons\Components\Svg::class, [] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('heroicon-s-plus'); ?>
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

                    <span>
                        <?php echo e($getAddButtonLabel()); ?>

                    </span>
                </button>
            <?php endif; ?>
        </div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3bf0a20793be3eca9a779778cf74145887b021b9)): ?>
<?php $component = $__componentOriginal3bf0a20793be3eca9a779778cf74145887b021b9; ?>
<?php unset($__componentOriginal3bf0a20793be3eca9a779778cf74145887b021b9); ?>
<?php endif; ?>
<?php /**PATH /Users/mat/Projects/AStA/asta-ticket-refund/vendor/filament/forms/resources/views/components/key-value.blade.php ENDPATH**/ ?>