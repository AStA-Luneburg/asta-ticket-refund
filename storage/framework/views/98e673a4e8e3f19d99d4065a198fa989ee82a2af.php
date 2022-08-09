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
                        isHtmlAllowed: <?php
    if (is_object($isHtmlAllowed()) || is_array($isHtmlAllowed())) {
        echo "JSON.parse(atob('".base64_encode(json_encode($isHtmlAllowed()))."'))";
    } elseif (is_string($isHtmlAllowed())) {
        echo "'".str_replace("'", "\'", $isHtmlAllowed())."'";
    } else {
        echo json_encode($isHtmlAllowed());
    }
?>,
                        getOptionLabelUsing: async () => {
                            return await $wire.getSelectOptionLabel(<?php
    if (is_object($getStatePath()) || is_array($getStatePath())) {
        echo "JSON.parse(atob('".base64_encode(json_encode($getStatePath()))."'))";
    } elseif (is_string($getStatePath())) {
        echo "'".str_replace("'", "\'", $getStatePath())."'";
    } else {
        echo json_encode($getStatePath());
    }
?>)
                        },
                        getOptionLabelsUsing: async () => {
                            return await $wire.getSelectOptionLabels(<?php
    if (is_object($getStatePath()) || is_array($getStatePath())) {
        echo "JSON.parse(atob('".base64_encode(json_encode($getStatePath()))."'))";
    } elseif (is_string($getStatePath())) {
        echo "'".str_replace("'", "\'", $getStatePath())."'";
    } else {
        echo json_encode($getStatePath());
    }
?>)
                        },
                        getOptionsUsing: async () => {
                            return await $wire.getSelectOptions(<?php
    if (is_object($getStatePath()) || is_array($getStatePath())) {
        echo "JSON.parse(atob('".base64_encode(json_encode($getStatePath()))."'))";
    } elseif (is_string($getStatePath())) {
        echo "'".str_replace("'", "\'", $getStatePath())."'";
    } else {
        echo json_encode($getStatePath());
    }
?>)
                        },
                        getSearchResultsUsing: async (search) => {
                            return await $wire.getSelectSearchResults(<?php
    if (is_object($getStatePath()) || is_array($getStatePath())) {
        echo "JSON.parse(atob('".base64_encode(json_encode($getStatePath()))."'))";
    } elseif (is_string($getStatePath())) {
        echo "'".str_replace("'", "\'", $getStatePath())."'";
    } else {
        echo json_encode($getStatePath());
    }
?>, search)
                        },
                        isAutofocused: <?php
    if (is_object($isAutofocused()) || is_array($isAutofocused())) {
        echo "JSON.parse(atob('".base64_encode(json_encode($isAutofocused()))."'))";
    } elseif (is_string($isAutofocused())) {
        echo "'".str_replace("'", "\'", $isAutofocused())."'";
    } else {
        echo json_encode($isAutofocused());
    }
?>,
                        isMultiple: <?php
    if (is_object($isMultiple()) || is_array($isMultiple())) {
        echo "JSON.parse(atob('".base64_encode(json_encode($isMultiple()))."'))";
    } elseif (is_string($isMultiple())) {
        echo "'".str_replace("'", "\'", $isMultiple())."'";
    } else {
        echo json_encode($isMultiple());
    }
?>,
                        hasDynamicOptions: <?php
    if (is_object($hasDynamicOptions()) || is_array($hasDynamicOptions())) {
        echo "JSON.parse(atob('".base64_encode(json_encode($hasDynamicOptions()))."'))";
    } elseif (is_string($hasDynamicOptions())) {
        echo "'".str_replace("'", "\'", $hasDynamicOptions())."'";
    } else {
        echo json_encode($hasDynamicOptions());
    }
?>,
                        hasDynamicSearchResults: <?php
    if (is_object($hasDynamicSearchResults()) || is_array($hasDynamicSearchResults())) {
        echo "JSON.parse(atob('".base64_encode(json_encode($hasDynamicSearchResults()))."'))";
    } elseif (is_string($hasDynamicSearchResults())) {
        echo "'".str_replace("'", "\'", $hasDynamicSearchResults())."'";
    } else {
        echo json_encode($hasDynamicSearchResults());
    }
?>,
                        loadingMessage: <?php
    if (is_object($getLoadingMessage()) || is_array($getLoadingMessage())) {
        echo "JSON.parse(atob('".base64_encode(json_encode($getLoadingMessage()))."'))";
    } elseif (is_string($getLoadingMessage())) {
        echo "'".str_replace("'", "\'", $getLoadingMessage())."'";
    } else {
        echo json_encode($getLoadingMessage());
    }
?>,
                        maxItems: <?php
    if (is_object($getMaxItems()) || is_array($getMaxItems())) {
        echo "JSON.parse(atob('".base64_encode(json_encode($getMaxItems()))."'))";
    } elseif (is_string($getMaxItems())) {
        echo "'".str_replace("'", "\'", $getMaxItems())."'";
    } else {
        echo json_encode($getMaxItems());
    }
?>,
                        noSearchResultsMessage: <?php
    if (is_object($getNoSearchResultsMessage()) || is_array($getNoSearchResultsMessage())) {
        echo "JSON.parse(atob('".base64_encode(json_encode($getNoSearchResultsMessage()))."'))";
    } elseif (is_string($getNoSearchResultsMessage())) {
        echo "'".str_replace("'", "\'", $getNoSearchResultsMessage())."'";
    } else {
        echo json_encode($getNoSearchResultsMessage());
    }
?>,
                        options: <?php
    if (is_object($getOptions()) || is_array($getOptions())) {
        echo "JSON.parse(atob('".base64_encode(json_encode($getOptions()))."'))";
    } elseif (is_string($getOptions())) {
        echo "'".str_replace("'", "\'", $getOptions())."'";
    } else {
        echo json_encode($getOptions());
    }
?>,
                        optionsLimit: <?php
    if (is_object($getOptionsLimit()) || is_array($getOptionsLimit())) {
        echo "JSON.parse(atob('".base64_encode(json_encode($getOptionsLimit()))."'))";
    } elseif (is_string($getOptionsLimit())) {
        echo "'".str_replace("'", "\'", $getOptionsLimit())."'";
    } else {
        echo json_encode($getOptionsLimit());
    }
?>,
                        placeholder: <?php
    if (is_object($getPlaceholder()) || is_array($getPlaceholder())) {
        echo "JSON.parse(atob('".base64_encode(json_encode($getPlaceholder()))."'))";
    } elseif (is_string($getPlaceholder())) {
        echo "'".str_replace("'", "\'", $getPlaceholder())."'";
    } else {
        echo json_encode($getPlaceholder());
    }
?>,
                        searchingMessage: <?php
    if (is_object($getSearchingMessage()) || is_array($getSearchingMessage())) {
        echo "JSON.parse(atob('".base64_encode(json_encode($getSearchingMessage()))."'))";
    } elseif (is_string($getSearchingMessage())) {
        echo "'".str_replace("'", "\'", $getSearchingMessage())."'";
    } else {
        echo json_encode($getSearchingMessage());
    }
?>,
                        searchPrompt: <?php
    if (is_object($getSearchPrompt()) || is_array($getSearchPrompt())) {
        echo "JSON.parse(atob('".base64_encode(json_encode($getSearchPrompt()))."'))";
    } elseif (is_string($getSearchPrompt())) {
        echo "'".str_replace("'", "\'", $getSearchPrompt())."'";
    } else {
        echo json_encode($getSearchPrompt());
    }
?>,
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
<?php /**PATH /Users/mat/Projects/AStA/asta-ticket-refund/vendor/filament/forms/src/../resources/views/components/select.blade.php ENDPATH**/ ?>