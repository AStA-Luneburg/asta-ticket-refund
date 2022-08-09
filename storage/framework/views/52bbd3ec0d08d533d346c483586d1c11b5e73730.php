<?php
    $affixLabelClasses = [
        'whitespace-nowrap group-focus-within:text-primary-500',
        'text-gray-400' => ! $errors->has($getStatePath()),
        'text-danger-400' => $errors->has($getStatePath()),
    ];
?>

<?php if (isset($component)) { $__componentOriginal3bf0a20793be3eca9a779778cf74145887b021b9 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\DynamicComponent::class, ['component' => $getFieldWrapperView()] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('dynamic-component'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(Illuminate\View\DynamicComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => $getId(),'label' => $getLabel(),'label-sr-only' => $isLabelHidden(),'helper-text' => $getHelperText(),'hint' => $getHint(),'hint-icon' => $getHintIcon(),'required' => $isRequired(),'state-path' => $getStatePath()]); ?>
    <div <?php echo e($attributes->merge($getExtraAttributes())->class(['flex items-center space-x-1 rtl:space-x-reverse group filament-forms-select-component'])); ?>>
        <?php if(($prefixAction = $getPrefixAction()) && (! $prefixAction->isHidden())): ?>
            <?php echo e($prefixAction); ?>

        <?php endif; ?>

        <?php if($icon = $getPrefixIcon()): ?>
            <?php if (isset($component)) { $__componentOriginal3bf0a20793be3eca9a779778cf74145887b021b9 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\DynamicComponent::class, ['component' => $icon] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('dynamic-component'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(Illuminate\View\DynamicComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-5 h-5']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3bf0a20793be3eca9a779778cf74145887b021b9)): ?>
<?php $component = $__componentOriginal3bf0a20793be3eca9a779778cf74145887b021b9; ?>
<?php unset($__componentOriginal3bf0a20793be3eca9a779778cf74145887b021b9); ?>
<?php endif; ?>
        <?php endif; ?>

        <?php if($label = $getPrefixLabel()): ?>
            <span class="<?php echo \Illuminate\Support\Arr::toCssClasses($affixLabelClasses) ?>">
                <?php echo e($label); ?>

            </span>
        <?php endif; ?>

        <div class="flex-1 min-w-0">
            <?php if (! ($isSearchable() || $isMultiple())): ?>
                <select
                    <?php echo $isAutofocused() ? 'autofocus' : null; ?>

                    <?php echo $isDisabled() ? 'disabled' : null; ?>

                    id="<?php echo e($getId()); ?>"
                    <?php echo e($applyStateBindingModifiers('wire:model')); ?>="<?php echo e($getStatePath()); ?>"
                    dusk="filament.forms.<?php echo e($getStatePath()); ?>"
                    <?php if(! $isConcealed()): ?>
                        <?php echo $isRequired() ? 'required' : null; ?>

                    <?php endif; ?>
                    <?php echo e($attributes->merge($getExtraInputAttributes())->merge($getExtraAttributes())->class([
                        'text-gray-900 block w-full transition duration-75 rounded-lg shadow-sm focus:border-primary-600 focus:ring-1 focus:ring-inset focus:ring-primary-600 disabled:opacity-70',
                        'dark:bg-gray-700 dark:text-white dark:focus:border-primary-600' => config('forms.dark_mode'),
                        'border-gray-300' => ! $errors->has($getStatePath()),
                        'dark:border-gray-600' => (! $errors->has($getStatePath())) && config('forms.dark_mode'),
                        'border-danger-600 ring-danger-600' => $errors->has($getStatePath()),
                    ])); ?>

                >
                    <?php if (! ($isPlaceholderSelectionDisabled())): ?>
                        <option value=""><?php echo e($getPlaceholder()); ?></option>
                    <?php endif; ?>

                    <?php $__currentLoopData = $getOptions(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option
                            value="<?php echo e($value); ?>"
                            <?php echo $isOptionDisabled($value, $label) ? 'disabled' : null; ?>

                        >
                            <?php echo e($label); ?>

                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            <?php else: ?>
                <div
                    x-data="selectFormComponent({
                        isHtmlAllowed: <?php echo \Illuminate\Support\Js::from($isHtmlAllowed())->toHtml() ?>,
                        getOptionLabelUsing: async () => {
                            return await $wire.getSelectOptionLabel(<?php echo \Illuminate\Support\Js::from($getStatePath())->toHtml() ?>)
                        },
                        getOptionLabelsUsing: async () => {
                            return await $wire.getSelectOptionLabels(<?php echo \Illuminate\Support\Js::from($getStatePath())->toHtml() ?>)
                        },
                        getOptionsUsing: async () => {
                            return await $wire.getSelectOptions(<?php echo \Illuminate\Support\Js::from($getStatePath())->toHtml() ?>)
                        },
                        getSearchResultsUsing: async (search) => {
                            return await $wire.getSelectSearchResults(<?php echo \Illuminate\Support\Js::from($getStatePath())->toHtml() ?>, search)
                        },
                        isAutofocused: <?php echo \Illuminate\Support\Js::from($isAutofocused())->toHtml() ?>,
                        isMultiple: <?php echo \Illuminate\Support\Js::from($isMultiple())->toHtml() ?>,
                        hasDynamicOptions: <?php echo \Illuminate\Support\Js::from($hasDynamicOptions())->toHtml() ?>,
                        hasDynamicSearchResults: <?php echo \Illuminate\Support\Js::from($hasDynamicSearchResults())->toHtml() ?>,
                        loadingMessage: <?php echo \Illuminate\Support\Js::from($getLoadingMessage())->toHtml() ?>,
                        maxItems: <?php echo \Illuminate\Support\Js::from($getMaxItems())->toHtml() ?>,
                        noSearchResultsMessage: <?php echo \Illuminate\Support\Js::from($getNoSearchResultsMessage())->toHtml() ?>,
                        options: <?php echo \Illuminate\Support\Js::from($getOptions())->toHtml() ?>,
                        optionsLimit: <?php echo \Illuminate\Support\Js::from($getOptionsLimit())->toHtml() ?>,
                        placeholder: <?php echo \Illuminate\Support\Js::from($getPlaceholder())->toHtml() ?>,
                        searchingMessage: <?php echo \Illuminate\Support\Js::from($getSearchingMessage())->toHtml() ?>,
                        searchPrompt: <?php echo \Illuminate\Support\Js::from($getSearchPrompt())->toHtml() ?>,
                        state: $wire.<?php echo e($applyStateBindingModifiers('entangle(\'' . $getStatePath() . '\')')); ?>,
                    })"
                    wire:ignore
                    <?php echo e($attributes->merge($getExtraAttributes())->merge($getExtraAlpineAttributes())); ?>

                >
                    <select
                        x-ref="input"
                        id="<?php echo e($getId()); ?>"
                        <?php echo $isDisabled() ? 'disabled' : null; ?>

                        <?php echo $isMultiple() ? 'multiple' : null; ?>

                        <?php echo e($getExtraInputAttributeBag()); ?>

                    ></select>
                </div>
            <?php endif; ?>
        </div>

        <?php if($label = $getSuffixLabel()): ?>
            <span class="<?php echo \Illuminate\Support\Arr::toCssClasses($affixLabelClasses) ?>">
                <?php echo e($label); ?>

            </span>
        <?php endif; ?>

        <?php if($icon = $getSuffixIcon()): ?>
            <?php if (isset($component)) { $__componentOriginal3bf0a20793be3eca9a779778cf74145887b021b9 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\DynamicComponent::class, ['component' => $icon] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('dynamic-component'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(Illuminate\View\DynamicComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-5 h-5']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3bf0a20793be3eca9a779778cf74145887b021b9)): ?>
<?php $component = $__componentOriginal3bf0a20793be3eca9a779778cf74145887b021b9; ?>
<?php unset($__componentOriginal3bf0a20793be3eca9a779778cf74145887b021b9); ?>
<?php endif; ?>
        <?php endif; ?>

        <?php if(($suffixAction = $getSuffixAction()) && (! $suffixAction->isHidden())): ?>
            <?php echo e($suffixAction); ?>

        <?php endif; ?>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3bf0a20793be3eca9a779778cf74145887b021b9)): ?>
<?php $component = $__componentOriginal3bf0a20793be3eca9a779778cf74145887b021b9; ?>
<?php unset($__componentOriginal3bf0a20793be3eca9a779778cf74145887b021b9); ?>
<?php endif; ?>
<?php /**PATH /Users/mat/Projects/AStA/asta-ticket-refund/vendor/filament/forms/resources/views/components/select.blade.php ENDPATH**/ ?>