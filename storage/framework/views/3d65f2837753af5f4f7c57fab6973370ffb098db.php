<?php foreach($attributes->onlyProps([
    'data' => [],
    'widgets' => [],
]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps([
    'data' => [],
    'widgets' => [],
]); ?>
<?php foreach (array_filter(([
    'data' => [],
    'widgets' => [],
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<div <?php echo e($attributes->class(['grid grid-cols-1 gap-4 lg:grid-cols-2 lg:gap-8 mb-6 filament-widgets-container'])); ?>>
    <?php $__currentLoopData = $widgets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $widget): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if($widget::canView()): ?>
            <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount(\Livewire\Livewire::getAlias($widget), $data)->html();
} elseif ($_instance->childHasBeenRendered($widget)) {
    $componentId = $_instance->getRenderedChildComponentId($widget);
    $componentTag = $_instance->getRenderedChildComponentTagName($widget);
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild($widget);
} else {
    $response = \Livewire\Livewire::mount(\Livewire\Livewire::getAlias($widget), $data);
    $html = $response->html();
    $_instance->logRenderedChild($widget, $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<?php /**PATH /Users/mat/Projects/AStA/asta-ticket-refund/vendor/filament/filament/src/../resources/views/components/widgets.blade.php ENDPATH**/ ?>