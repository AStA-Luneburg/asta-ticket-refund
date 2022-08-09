<?php foreach($attributes->onlyProps([
    'id',
    'label' => null,
    'labelPrefix' => null,
    'labelSrOnly' => false,
    'labelSuffix' => null,
    'helperText' => null,
    'hint' => null,
    'hintIcon' => null,
    'required' => false,
    'statePath',
]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps([
    'id',
    'label' => null,
    'labelPrefix' => null,
    'labelSrOnly' => false,
    'labelSuffix' => null,
    'helperText' => null,
    'hint' => null,
    'hintIcon' => null,
    'required' => false,
    'statePath',
]); ?>
<?php foreach (array_filter(([
    'id',
    'label' => null,
    'labelPrefix' => null,
    'labelSrOnly' => false,
    'labelSuffix' => null,
    'helperText' => null,
    'hint' => null,
    'hintIcon' => null,
    'required' => false,
    'statePath',
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<div <?php echo e($attributes->class(['filament-forms-field-wrapper'])); ?>>
    <?php if($label && $labelSrOnly): ?>
        <label for="<?php echo e($id); ?>" class="sr-only">
            <?php echo e($label); ?>

        </label>
    <?php endif; ?>

    <div class="grid gap-2 sm:grid-cols-3 sm:gap-4 sm:items-start">
        <?php if(($label && (! $labelSrOnly)) || $labelPrefix || $labelSuffix || $hint): ?>
            <div class="flex items-center justify-between gap-2 sm:gap-1 sm:items-start sm:flex-col sm:pt-2">
                <?php if($label && (! $labelSrOnly)): ?>
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'forms::components.field-wrapper.label','data' => ['for' => $id,'error' => $errors->has($statePath),'prefix' => $labelPrefix,'required' => $required,'suffix' => $labelSuffix]] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms::field-wrapper.label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['for' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($id),'error' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->has($statePath)),'prefix' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($labelPrefix),'required' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($required),'suffix' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($labelSuffix)]); ?>
                        <?php echo e($label); ?>

                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                <?php elseif($labelPrefix): ?>
                    <?php echo e($labelPrefix); ?>

                <?php elseif($labelSuffix): ?>
                    <?php echo e($labelSuffix); ?>

                <?php endif; ?>

                <?php if($hint || $hintIcon): ?>
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'forms::components.field-wrapper.hint','data' => ['icon' => $hintIcon]] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms::field-wrapper.hint'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($hintIcon)]); ?>
                        <?php echo e(filled($hint) ? ($hint instanceof \Illuminate\Support\HtmlString ? $hint : \Illuminate\Support\Str::of($hint)->markdown()->sanitizeHtml()->toHtmlString()) : null); ?>

                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                <?php endif; ?>
            </div>
        <?php endif; ?>

        <div class="space-y-2 sm:space-y-1 sm:col-span-2">
            <?php echo e($slot); ?>


            <?php if($errors->has($statePath)): ?>
                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'forms::components.field-wrapper.error-message','data' => []] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms::field-wrapper.error-message'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                    <?php echo e($errors->first($statePath)); ?>

                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
            <?php endif; ?>

            <?php if($helperText): ?>
                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'forms::components.field-wrapper.helper-text','data' => []] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms::field-wrapper.helper-text'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                    <?php echo e($helperText instanceof \Illuminate\Support\HtmlString ? $helperText : \Illuminate\Support\Str::of($helperText)->markdown()->sanitizeHtml()->toHtmlString()); ?>

                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php /**PATH /Users/mat/Projects/AStA/asta-ticket-refund/vendor/filament/forms/resources/views/components/field-wrapper/inline.blade.php ENDPATH**/ ?>