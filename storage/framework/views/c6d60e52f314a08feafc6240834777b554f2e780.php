<?php foreach($attributes->onlyProps([
    'actions',
    'color' => null,
    'darkMode' => false,
    'icon' => 'heroicon-o-dots-vertical',
    'label' => __('filament-support::actions/group.trigger.label'),
    'tooltip' => null,
]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps([
    'actions',
    'color' => null,
    'darkMode' => false,
    'icon' => 'heroicon-o-dots-vertical',
    'label' => __('filament-support::actions/group.trigger.label'),
    'tooltip' => null,
]); ?>
<?php foreach (array_filter(([
    'actions',
    'color' => null,
    'darkMode' => false,
    'icon' => 'heroicon-o-dots-vertical',
    'label' => __('filament-support::actions/group.trigger.label'),
    'tooltip' => null,
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<div x-data <?php echo e($attributes->class(['relative'])); ?>>
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'filament-support::components.icon-button','data' => ['xOn:click' => '$refs.panel.toggle','color' => $color,'darkMode' => $darkMode,'icon' => $icon,'tooltip' => $tooltip,'class' => '-my-2']] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('filament-support::icon-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['x-on:click' => '$refs.panel.toggle','color' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($color),'dark-mode' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($darkMode),'icon' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($icon),'tooltip' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($tooltip),'class' => '-my-2']); ?>
         <?php $__env->slot('label', null, []); ?> 
            <?php echo e($label); ?>

         <?php $__env->endSlot(); ?>
     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

    <div
        x-ref="panel"
        x-transition
        x-cloak
        x-float.placement.bottom-end.flip.offset.shift.teleport="{ offset: 8 }"
        class="<?php echo \Illuminate\Support\Arr::toCssClasses([
            'absolute hidden z-20 shadow-xl ring-1 ring-gray-900/10 overflow-hidden rounded-xl w-52 filament-action-group-dropdown',
            'dark:ring-white/20' => $darkMode,
        ]) ?>"
    >
        <ul class="<?php echo \Illuminate\Support\Arr::toCssClasses([
            'py-1 space-y-1 bg-white shadow rounded-xl',
            'dark:bg-gray-700 dark:divide-gray-600' => $darkMode,
        ]) ?>">
            <?php $__currentLoopData = $actions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $action): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if(! $action->isHidden()): ?>
                    <?php echo e($action); ?>

                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
</div>
<?php /**PATH /Users/mat/Projects/AStA/asta-ticket-refund/vendor/filament/support/resources/views/components/actions/group.blade.php ENDPATH**/ ?>