<?php foreach($attributes->onlyProps([
    'enabled' => false,
]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps([
    'enabled' => false,
]); ?>
<?php foreach (array_filter(([
    'enabled' => false,
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'tables::components.icon-button','data' => ['wire:click' => 'toggleTableReordering','icon' => $enabled ? 'heroicon-o-check' : 'heroicon-o-selector','label' => $enabled ? __('tables::table.buttons.disable_reordering.label') : __('tables::table.buttons.enable_reordering.label'),'attributes' => $attributes->class(['filament-tables-reordering-trigger'])]] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('tables::icon-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:click' => 'toggleTableReordering','icon' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($enabled ? 'heroicon-o-check' : 'heroicon-o-selector'),'label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($enabled ? __('tables::table.buttons.disable_reordering.label') : __('tables::table.buttons.enable_reordering.label')),'attributes' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($attributes->class(['filament-tables-reordering-trigger']))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php /**PATH /Users/mat/Projects/AStA/asta-ticket-refund/vendor/filament/tables/resources/views/components/reorder/trigger.blade.php ENDPATH**/ ?>