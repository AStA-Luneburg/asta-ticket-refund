<?php foreach($attributes->onlyProps([
    'blocks',
    'createAfterItem' => null,
    'statePath',
]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps([
    'blocks',
    'createAfterItem' => null,
    'statePath',
]); ?>
<?php foreach (array_filter(([
    'blocks',
    'createAfterItem' => null,
    'statePath',
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<div
    x-ref="panel"
    x-transition
    x-cloak
    x-float.placement.bottom.flip.offset="{ offset: 8 }"
    <?php echo e($attributes->class([
        'absolute hidden z-20 w-52 filament-forms-builder-component-block-picker',
    ])); ?>

>
    <ul class="<?php echo \Illuminate\Support\Arr::toCssClasses([
        'py-1 space-y-1 bg-white shadow rounded-xl shadow-xl ring-1 ring-gray-900/10 overflow-hidden rounded-xl',
        'dark:bg-gray-700 dark:divide-gray-600 dark:ring-white/20' => config('forms.dark_mode'),
    ]) ?>">
        <?php $__currentLoopData = $blocks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $block): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'forms::components.dropdown.item','data' => ['wire:click' => 'dispatchFormEvent(\'builder::createItem\', \'' . $statePath . '\', \'' . $block->getName() . '\'' . ($createAfterItem ? ', \'' . $createAfterItem . '\'' : '') . ')','icon' => $block->getIcon()]] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms::dropdown.item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:click' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('dispatchFormEvent(\'builder::createItem\', \'' . $statePath . '\', \'' . $block->getName() . '\'' . ($createAfterItem ? ', \'' . $createAfterItem . '\'' : '') . ')'),'icon' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($block->getIcon())]); ?>
                <?php echo e($block->getLabel()); ?>

             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
</div>
<?php /**PATH /Users/mat/Projects/AStA/asta-ticket-refund/vendor/filament/forms/resources/views/components/builder/block-picker.blade.php ENDPATH**/ ?>