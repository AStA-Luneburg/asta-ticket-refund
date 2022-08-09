<?php if (isset($component)) { $__componentOriginal3bf0a20793be3eca9a779778cf74145887b021b9 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\DynamicComponent::class, ['component' => $getFieldWrapperView()] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('dynamic-component'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(Illuminate\View\DynamicComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => $getId(),'label' => $getLabel(),'label-sr-only' => $isLabelHidden(),'helper-text' => $getHelperText(),'hint' => $getHint(),'hint-icon' => $getHintIcon(),'required' => $isRequired(),'state-path' => $getStatePath()]); ?>
    <?php if($isInline()): ?>
         <?php $__env->slot('labelPrefix', null, []); ?> 
    <?php endif; ?>
            <input
                <?php echo $isAutofocused() ? 'autofocus' : null; ?>

                <?php echo $isDisabled() ? 'disabled' : null; ?>

                id="<?php echo e($getId()); ?>"
                type="checkbox"
                <?php echo e($applyStateBindingModifiers('wire:model')); ?>="<?php echo e($getStatePath()); ?>"
                dusk="filament.forms.<?php echo e($getStatePath()); ?>"
                <?php if(! $isConcealed()): ?>
                    <?php echo $isRequired() ? 'required' : null; ?>

                <?php endif; ?>
                <?php echo e($attributes
                        ->merge($getExtraAttributes())
                        ->merge($getExtraInputAttributeBag()->getAttributes())
                        ->class([
                            'text-primary-600 transition duration-75 rounded shadow-sm focus:border-primary-500 focus:ring-2 focus:ring-primary-500 disabled:opacity-70 filament-forms-checkbox-component',
                            'dark:bg-gray-700 dark:checked:bg-primary-500' => config('forms.dark_mode'),
                            'border-gray-300' => ! $errors->has($getStatePath()),
                            'dark:border-gray-600' => (! $errors->has($getStatePath())) && config('forms.dark_mode'),
                            'border-danger-300 ring-danger-500' => $errors->has($getStatePath()),
                        ])); ?>

            />
    <?php if($isInline()): ?>
         <?php $__env->endSlot(); ?>
    <?php endif; ?>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3bf0a20793be3eca9a779778cf74145887b021b9)): ?>
<?php $component = $__componentOriginal3bf0a20793be3eca9a779778cf74145887b021b9; ?>
<?php unset($__componentOriginal3bf0a20793be3eca9a779778cf74145887b021b9); ?>
<?php endif; ?>
<?php /**PATH /Users/mat/Projects/AStA/asta-ticket-refund/vendor/filament/forms/resources/views/components/checkbox.blade.php ENDPATH**/ ?>