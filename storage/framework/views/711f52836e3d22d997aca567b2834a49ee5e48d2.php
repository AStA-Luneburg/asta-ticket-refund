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
            <button
                x-data="{ state: $wire.<?php echo e($applyStateBindingModifiers('entangle(\'' . $getStatePath() . '\')')); ?> }"
                role="switch"
                aria-checked="false"
                x-bind:aria-checked="state.toString()"
                x-on:click="state = ! state"
                x-bind:class="{
                    'bg-primary-600': state,
                    'bg-gray-200 <?php if(config('forms.dark_mode')): ?> dark:bg-white/10 <?php endif; ?>': ! state,
                }"
                <?php echo $isAutofocused() ? 'autofocus' : null; ?>

                <?php echo $isDisabled() ? 'disabled' : null; ?>

                id="<?php echo e($getId()); ?>"
                dusk="filament.forms.<?php echo e($getStatePath()); ?>"
                type="button"
                <?php echo e($attributes->merge($getExtraAttributes())->class([
                    'relative inline-flex shrink-0 h-6 w-11 border-2 border-transparent rounded-full cursor-pointer transition-colors ease-in-out duration-200 focus:outline-none focus:border-primary-500 focus:ring-2 focus:ring-primary-500 disabled:opacity-70 disabled:cursor-not-allowed disabled:pointer-events-none filament-forms-toggle-component',
                    'border-gray-300' => ! $errors->has($getStatePath()),
                    'border-danger-300 ring-danger-500' => $errors->has($getStatePath()),
                ])); ?>

                <?php echo e($getExtraAlpineAttributeBag()); ?>

            >
                <span
                    class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                        'pointer-events-none relative inline-block h-5 w-5 rounded-full bg-white shadow transform ring-0 ease-in-out transition duration-200',
                    ]) ?>"
                    :class="{
                        'translate-x-5 rtl:-translate-x-5': state,
                        'translate-x-0': ! state,
                    }"
                >
                    <span
                        class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                            'absolute inset-0 h-full w-full flex items-center justify-center transition-opacity',
                        ]) ?>"
                        aria-hidden="true"
                        :class="{
                            'opacity-0 ease-out duration-100': state,
                            'opacity-100 ease-in duration-200': ! state,
                        }"
                    >
                        <?php if($hasOffIcon()): ?>
                            <?php if (isset($component)) { $__componentOriginal3bf0a20793be3eca9a779778cf74145887b021b9 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\DynamicComponent::class, ['component' => $getOffIcon()] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('dynamic-component'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(Illuminate\View\DynamicComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'h-3 w-3 text-gray-400']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3bf0a20793be3eca9a779778cf74145887b021b9)): ?>
<?php $component = $__componentOriginal3bf0a20793be3eca9a779778cf74145887b021b9; ?>
<?php unset($__componentOriginal3bf0a20793be3eca9a779778cf74145887b021b9); ?>
<?php endif; ?>
                        <?php endif; ?>
                    </span>

                    <span
                        class="absolute inset-0 h-full w-full flex items-center justify-center transition-opacity"
                        aria-hidden="true"
                        :class="{
                            'opacity-100 ease-in duration-200': state,
                            'opacity-0 ease-out duration-100': ! state,
                        }"
                    >
                        <?php if($hasOnIcon()): ?>
                            <?php if (isset($component)) { $__componentOriginal3bf0a20793be3eca9a779778cf74145887b021b9 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\DynamicComponent::class, ['component' => $getOnIcon()] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('dynamic-component'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(Illuminate\View\DynamicComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['x-cloak' => true,'class' => 'h-3 w-3 text-primary-600']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3bf0a20793be3eca9a779778cf74145887b021b9)): ?>
<?php $component = $__componentOriginal3bf0a20793be3eca9a779778cf74145887b021b9; ?>
<?php unset($__componentOriginal3bf0a20793be3eca9a779778cf74145887b021b9); ?>
<?php endif; ?>
                        <?php endif; ?>
                    </span>
                </span>
            </button>
    <?php if($isInline()): ?>
         <?php $__env->endSlot(); ?>
    <?php endif; ?>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3bf0a20793be3eca9a779778cf74145887b021b9)): ?>
<?php $component = $__componentOriginal3bf0a20793be3eca9a779778cf74145887b021b9; ?>
<?php unset($__componentOriginal3bf0a20793be3eca9a779778cf74145887b021b9); ?>
<?php endif; ?>
<?php /**PATH /Users/mat/Projects/AStA/asta-ticket-refund/vendor/filament/forms/resources/views/components/toggle.blade.php ENDPATH**/ ?>