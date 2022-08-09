<?php foreach($attributes->onlyProps([
    'action',
    'component',
]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps([
    'action',
    'component',
]); ?>
<?php foreach (array_filter(([
    'action',
    'component',
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<?php
    $wireClickAction = null;

    if ($action->getEvent()) {
        $emitArguments = collect([$action->getEvent()])
            ->merge($action->getEventData())
            ->map(fn (mixed $value) => \Illuminate\Support\Js::from($value)->toHtml())
            ->implode(', ');

        $wireClickAction = "\$emit($emitArguments)";
    }
?>

<?php if (isset($component)) { $__componentOriginal3bf0a20793be3eca9a779778cf74145887b021b9 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\DynamicComponent::class, ['component' => $component] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('dynamic-component'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(Illuminate\View\DynamicComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['dark-mode' => config('notifications.dark_mode'),'attributes' => \Filament\Support\prepare_inherited_attributes($attributes)->merge($action->getExtraAttributes()),'tag' => $action->getUrl() ? 'a' : 'button','wire:click' => $action->isEnabled() ? $wireClickAction : null,'x-on:click' => $action->isEnabled() && $action->shouldCloseNotification() ? 'close' : null,'href' => $action->isEnabled() ? $action->getUrl() : null,'target' => $action->shouldOpenUrlInNewTab() ? '_blank' : null,'disabled' => $action->isDisabled(),'color' => $action->getColor(),'icon' => $icon ?? $action->getIcon(),'size' => $action->getSize() ?? 'sm']); ?>
    <?php echo e($slot); ?>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3bf0a20793be3eca9a779778cf74145887b021b9)): ?>
<?php $component = $__componentOriginal3bf0a20793be3eca9a779778cf74145887b021b9; ?>
<?php unset($__componentOriginal3bf0a20793be3eca9a779778cf74145887b021b9); ?>
<?php endif; ?>
<?php /**PATH /Users/mat/Projects/AStA/asta-ticket-refund/vendor/filament/notifications/resources/views/components/actions/action.blade.php ENDPATH**/ ?>