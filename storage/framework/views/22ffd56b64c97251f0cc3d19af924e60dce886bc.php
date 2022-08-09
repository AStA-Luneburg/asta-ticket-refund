<?php extract(collect($attributes->getAttributes())->mapWithKeys(function ($value, $key) { return [Illuminate\Support\Str::camel(str_replace([':', '.'], ' ', $key)) => $value]; })->all(), EXTR_SKIP); ?>
<?php foreach($attributes->onlyProps(['darkMode','form','tag','wire:click','href','target','type','color','keyBindings','tooltip','disabled','icon','size','labelSrOnly','dusk','class']) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps(['darkMode','form','tag','wire:click','href','target','type','color','keyBindings','tooltip','disabled','icon','size','labelSrOnly','dusk','class']); ?>
<?php foreach (array_filter((['darkMode','form','tag','wire:click','href','target','type','color','keyBindings','tooltip','disabled','icon','size','labelSrOnly','dusk','class']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>
<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'filament::components.dropdown.item','data' => ['darkMode' => $darkMode,'form' => $form,'tag' => $tag,'wire:click' => $wireClick,'href' => $href,'target' => $target,'type' => $type,'color' => $color,'keyBindings' => $keyBindings,'tooltip' => $tooltip,'disabled' => $disabled,'icon' => $icon,'size' => $size,'labelSrOnly' => $labelSrOnly,'dusk' => $dusk,'class' => $class]] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('filament::dropdown.item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['dark-mode' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($darkMode),'form' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($form),'tag' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($tag),'wire:click' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($wireClick),'href' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($href),'target' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($target),'type' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($type),'color' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($color),'key-bindings' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($keyBindings),'tooltip' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($tooltip),'disabled' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($disabled),'icon' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($icon),'size' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($size),'label-sr-only' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($labelSrOnly),'dusk' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($dusk),'class' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($class)]); ?>

<?php echo e($slot ?? ""); ?>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?><?php /**PATH /Users/mat/Projects/AStA/asta-ticket-refund/storage/framework/views/fdfc74155971ff667726a8f6b9b7097adf25baa8.blade.php ENDPATH**/ ?>