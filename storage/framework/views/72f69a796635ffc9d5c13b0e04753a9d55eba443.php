<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'filament-support::components.grid','data' => ['default' => $getColumns('default'),'sm' => $getColumns('sm'),'md' => $getColumns('md'),'lg' => $getColumns('lg'),'xl' => $getColumns('xl'),'twoXl' => $getColumns('2xl'),'class' => 'gap-6 filament-forms-component-container']] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('filament-support::grid'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['default' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($getColumns('default')),'sm' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($getColumns('sm')),'md' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($getColumns('md')),'lg' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($getColumns('lg')),'xl' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($getColumns('xl')),'two-xl' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($getColumns('2xl')),'class' => 'gap-6 filament-forms-component-container']); ?>
    <?php $__currentLoopData = $getComponents(withHidden: true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $formComponent): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php
            /**
            * Instead of only rendering the hidden components, we should
            * render the `<div>` wrappers for all fields, regardless of
            * if they are hidden or not. This is to solve Livewire DOM
            * diffing issues.
            *
            * Additionally, any `<div>` elements that wrap hidden
            * components need to have `class="hidden"`, so that they
            * don't consume grid space.
            */
            $isVisible = ! $formComponent->isHidden();
        ?>

        <div
            <?php if($formComponent instanceof \Filament\Forms\Components\Field): ?>
                wire:key="<?php echo e($this->id); ?>.<?php echo e($formComponent->getStatePath()); ?>.<?php echo e($formComponent::class); ?>"
            <?php endif; ?>
            <?php if($isVisible): ?>
                class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                    ($maxWidth = $formComponent->getMaxWidth()) ? match ($maxWidth) {
                        'xs' => 'max-w-xs',
                        'sm' => 'max-w-sm',
                        'md' => 'max-w-md',
                        'lg' => 'max-w-lg',
                        'xl' => 'max-w-xl',
                        '2xl' => 'max-w-2xl',
                        '3xl' => 'max-w-3xl',
                        '4xl' => 'max-w-4xl',
                        '5xl' => 'max-w-5xl',
                        '6xl' => 'max-w-6xl',
                        '7xl' => 'max-w-7xl',
                        default => $maxWidth,
                    } : null,
                    ($defaultSpan = $formComponent->getColumnSpan('default')) ? match ($defaultSpan) {
                        1 => 'col-span-1',
                        2 => 'col-span-2',
                        3 => 'col-span-3',
                        4 => 'col-span-4',
                        5 => 'col-span-5',
                        6 => 'col-span-6',
                        7 => 'col-span-7',
                        8 => 'col-span-8',
                        9 => 'col-span-9',
                        10 => 'col-span-10',
                        11 => 'col-span-11',
                        12 => 'col-span-12',
                        'full' => 'col-span-full',
                        default => $defaultSpan,
                    } : null,
                    ($smSpan = $formComponent->getColumnSpan('sm')) ? match ($smSpan) {
                        1 => 'sm:col-span-1',
                        2 => 'sm:col-span-2',
                        3 => 'sm:col-span-3',
                        4 => 'sm:col-span-4',
                        5 => 'sm:col-span-5',
                        6 => 'sm:col-span-6',
                        7 => 'sm:col-span-7',
                        8 => 'sm:col-span-8',
                        9 => 'sm:col-span-9',
                        10 => 'sm:col-span-10',
                        11 => 'sm:col-span-11',
                        12 => 'sm:col-span-12',
                        'full' => 'sm:col-span-full',
                        default => $smSpan,
                    } : null,
                    ($mdSpan = $formComponent->getColumnSpan('md')) ? match ($mdSpan) {
                        1 => 'md:col-span-1',
                        2 => 'md:col-span-2',
                        3 => 'md:col-span-3',
                        4 => 'md:col-span-4',
                        5 => 'md:col-span-5',
                        6 => 'md:col-span-6',
                        7 => 'md:col-span-7',
                        8 => 'md:col-span-8',
                        9 => 'md:col-span-9',
                        10 => 'md:col-span-10',
                        11 => 'md:col-span-11',
                        12 => 'md:col-span-12',
                        'full' => 'md:col-span-full',
                        default => $mdSpan,
                    } : null,
                    ($lgSpan = $formComponent->getColumnSpan('lg')) ? match ($lgSpan) {
                        1 => 'lg:col-span-1',
                        2 => 'lg:col-span-2',
                        3 => 'lg:col-span-3',
                        4 => 'lg:col-span-4',
                        5 => 'lg:col-span-5',
                        6 => 'lg:col-span-6',
                        7 => 'lg:col-span-7',
                        8 => 'lg:col-span-8',
                        9 => 'lg:col-span-9',
                        10 => 'lg:col-span-10',
                        11 => 'lg:col-span-11',
                        12 => 'lg:col-span-12',
                        'full' => 'lg:col-span-full',
                        default => $lgSpan,
                    } : null,
                    ($xlSpan = $formComponent->getColumnSpan('xl')) ? match ($xlSpan) {
                        1 => 'xl:col-span-1',
                        2 => 'xl:col-span-2',
                        3 => 'xl:col-span-3',
                        4 => 'xl:col-span-4',
                        5 => 'xl:col-span-5',
                        6 => 'xl:col-span-6',
                        7 => 'xl:col-span-7',
                        8 => 'xl:col-span-8',
                        9 => 'xl:col-span-9',
                        10 => 'xl:col-span-10',
                        11 => 'xl:col-span-11',
                        12 => 'xl:col-span-12',
                        'full' => 'xl:col-span-full',
                        default => $xlSpan,
                    } : null,
                    ($twoXlSpan = $formComponent->getColumnSpan('2xl')) ? match ($twoXlSpan) {
                        1 => '2xl:col-span-1',
                        2 => '2xl:col-span-2',
                        3 => '2xl:col-span-3',
                        4 => '2xl:col-span-4',
                        5 => '2xl:col-span-5',
                        6 => '2xl:col-span-6',
                        7 => '2xl:col-span-7',
                        8 => '2xl:col-span-8',
                        9 => '2xl:col-span-9',
                        10 => '2xl:col-span-10',
                        11 => '2xl:col-span-11',
                        12 => '2xl:col-span-12',
                        'full' => '2xl:col-span-full',
                        default => $twoXlSpan,
                    } : null,
                ]) ?>"
            <?php else: ?>
                class="hidden"
            <?php endif; ?>
        >
            <?php if($isVisible): ?>
                <?php echo e($formComponent); ?>

            <?php endif; ?>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php /**PATH /Users/mat/Projects/AStA/asta-ticket-refund/vendor/filament/forms/resources/views/component-container.blade.php ENDPATH**/ ?>