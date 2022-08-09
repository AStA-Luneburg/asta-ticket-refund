<?php foreach($attributes->onlyProps([
    'label',
    'results',
]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps([
    'label',
    'results',
]); ?>
<?php foreach (array_filter(([
    'label',
    'results',
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<ul <?php echo e($attributes->class([
    'divide-y filament-global-search-result-group',
    'dark:divide-gray-700' => config('filament.dark_mode'),
])); ?>>
    <li class="sticky top-0 z-10">
        <header class="<?php echo \Illuminate\Support\Arr::toCssClasses([
            'px-6 py-2 bg-gray-50/80 backdrop-blur-xl backdrop-saturate-150',
            'dark:bg-gray-700' => config('filament.dark_mode'),
        ]) ?>">
            <p class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                'text-xs font-bold tracking-wider text-gray-500 uppercase',
                'dark:text-gray-400' => config('filament.dark_mode'),
            ]) ?>">
                <?php echo e($label); ?>

            </p>
        </header>
    </li>

    <?php $__currentLoopData = $results; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $result): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'filament::components.global-search.result','data' => ['details' => $result->details,'title' => $result->title,'url' => $result->url]] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('filament::global-search.result'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['details' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($result->details),'title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($result->title),'url' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($result->url)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ul>
<?php /**PATH /Users/mat/Projects/AStA/asta-ticket-refund/vendor/filament/filament/src/../resources/views/components/global-search/result-group.blade.php ENDPATH**/ ?>