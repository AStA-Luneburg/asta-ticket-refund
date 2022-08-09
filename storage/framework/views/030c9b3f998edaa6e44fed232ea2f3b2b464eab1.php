<?php
    $isRtl = __('filament::layout.direction') === 'rtl';
    $previousArrowIcon = $isRtl ? 'heroicon-o-chevron-right' : 'heroicon-o-chevron-left';
    $nextArrowIcon = $isRtl ? 'heroicon-o-chevron-left' : 'heroicon-o-chevron-right';
?>

<div
    x-data="{

        step: null,

        init: function () {
            this.step = this.getSteps()[<?php echo e($getStartStep()); ?> - 1]
        },

        nextStep: function () {
            let nextStepIndex = this.getStepIndex(this.step) + 1

            if (nextStepIndex >= this.getSteps().length) {
                return
            }

            this.step = this.getSteps()[nextStepIndex]

            this.scrollToTop()
        },

        previousStep: function () {
            let previousStepIndex = this.getStepIndex(this.step) - 1

            if (previousStepIndex < 0) {
                return
            }

            this.step = this.getSteps()[previousStepIndex]

            this.scrollToTop()
        },

        scrollToTop: function () {
            this.$el.scrollIntoView({ behavior: 'smooth', block: 'start' })
        },

        getStepIndex: function (step) {
            return this.getSteps().findIndex((indexedStep) => indexedStep === step)
        },

        getSteps: function () {
            return JSON.parse(this.$refs.stepsData.value)
        },

        isFirstStep: function () {
            return this.getStepIndex(this.step) <= 0
        },

        isLastStep: function () {
            return (this.getStepIndex(this.step) + 1) >= this.getSteps().length
        },

    }"
    x-on:next-wizard-step.window="if ($event.detail.statePath === '<?php echo e($getStatePath()); ?>') nextStep()"
    x-cloak
    <?php echo $getId() ? "id=\"{$getId()}\"" : null; ?>

    <?php echo e($attributes->merge($getExtraAttributes())->class(['grid gap-y-6 filament-forms-wizard-component'])); ?>

    <?php echo e($getExtraAlpineAttributeBag()); ?>

>
    <input
        type="hidden"
        value='<?php echo e(collect($getChildComponentContainer()->getComponents())
                ->filter(static fn (\Filament\Forms\Components\Wizard\Step $step): bool => ! $step->isHidden())
                ->map(static fn (\Filament\Forms\Components\Wizard\Step $step) => $step->getId())
                ->values()
                ->toJson()); ?>'
        x-ref="stepsData"
    />

    <ol
        <?php echo $getLabel() ? 'aria-label="' . $getLabel() . '"' : null; ?>

        role="list"
        class="<?php echo \Illuminate\Support\Arr::toCssClasses([
            'border border-gray-300 shadow-sm bg-white rounded-xl overflow-hidden divide-y divide-gray-300 md:flex md:divide-y-0',
            'dark:bg-gray-800 dark:border-gray-700 dark:divide-gray-700' => config('forms.dark_mode'),
        ]) ?>"
    >
        <?php $__currentLoopData = $getChildComponentContainer()->getComponents(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $step): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li class="group relative overflow-hidden md:flex-1">
                <button
                    type="button"
                    x-on:click="if (getStepIndex(step) > <?php echo e($loop->index); ?>) step = '<?php echo e($step->getId()); ?>'"
                    x-bind:aria-current="getStepIndex(step) === <?php echo e($loop->index); ?> ? 'step' : null"
                    x-bind:class="{
                        'cursor-not-allowed pointer-events-none': getStepIndex(step) <= <?php echo e($loop->index); ?>,
                    }"
                    role="step"
                    class="flex items-center h-full text-left w-full"
                >
                    <div
                        x-bind:class="{
                            'bg-primary-600': getStepIndex(step) === <?php echo e($loop->index); ?>,
                            'bg-transparent group-hover:bg-gray-200 <?php if(config('forms.dark_mode')): ?> dark:group-hover:bg-gray-600 <?php endif; ?>': getStepIndex(step) > <?php echo e($loop->index); ?>,
                        }"
                        class="absolute top-0 left-0 w-1 h-full md:w-full md:h-1 md:bottom-0 md:top-auto"
                        aria-hidden="true"
                    ></div>

                    <div class="px-5 py-4 flex gap-3 items-center text-sm font-medium">
                        <div class="flex-shrink-0">
                            <div
                                x-bind:class="{
                                    'bg-primary-600': getStepIndex(step) > <?php echo e($loop->index); ?>,
                                    'border-2': getStepIndex(step) <= <?php echo e($loop->index); ?>,
                                    'border-primary-600': getStepIndex(step) === <?php echo e($loop->index); ?>,
                                    'border-gray-300 <?php if(config('forms.dark_mode')): ?> dark:border-gray-500 <?php endif; ?>': getStepIndex(step) < <?php echo e($loop->index); ?>,
                                }"
                                class="w-10 h-10 flex items-center justify-center rounded-full"
                            >
                                <?php if (isset($component)) { $__componentOriginalcd9972c8156dfa6e5fd36675ca7bf5f21b506e2e = $component; } ?>
<?php $component = $__env->getContainer()->make(BladeUI\Icons\Components\Svg::class, [] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('heroicon-o-check'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(BladeUI\Icons\Components\Svg::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['x-show' => 'getStepIndex(step) > '.e($loop->index).'','x-cloak' => true,'class' => 'w-5 h-5 text-white']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalcd9972c8156dfa6e5fd36675ca7bf5f21b506e2e)): ?>
<?php $component = $__componentOriginalcd9972c8156dfa6e5fd36675ca7bf5f21b506e2e; ?>
<?php unset($__componentOriginalcd9972c8156dfa6e5fd36675ca7bf5f21b506e2e); ?>
<?php endif; ?>

                                <?php if($step->getIcon()): ?>
                                    <?php if (isset($component)) { $__componentOriginal3bf0a20793be3eca9a779778cf74145887b021b9 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\DynamicComponent::class, ['component' => $step->getIcon()] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('dynamic-component'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(Illuminate\View\DynamicComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['x-show' => 'getStepIndex(step) <= '.e($loop->index).'','x-cloak' => true,'x-bind:class' => '{
                                            \'text-gray-500 @if (config(\'forms.dark_mode\')) dark:text-gray-400 @endif\': getStepIndex(step) !== '.e($loop->index).',
                                            \'text-primary-600\': getStepIndex(step) === '.e($loop->index).',
                                        }','class' => 'w-5 h-5']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3bf0a20793be3eca9a779778cf74145887b021b9)): ?>
<?php $component = $__componentOriginal3bf0a20793be3eca9a779778cf74145887b021b9; ?>
<?php unset($__componentOriginal3bf0a20793be3eca9a779778cf74145887b021b9); ?>
<?php endif; ?>
                                <?php else: ?>
                                    <span
                                        x-show="getStepIndex(step) <= <?php echo e($loop->index); ?>"
                                        x-bind:class="{
                                            'text-gray-500 <?php if(config('forms.dark_mode')): ?> dark:text-gray-400 <?php endif; ?>': getStepIndex(step) !== <?php echo e($loop->index); ?>,
                                            'text-primary-600': getStepIndex(step) === <?php echo e($loop->index); ?>,
                                        }"
                                    >
                                        <?php echo e(str_pad($loop->index + 1, 2, '0', STR_PAD_LEFT)); ?>

                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="flex flex-col items-start justify-center">
                            <div class="text-sm font-semibold tracking-wide uppercase">
                                <?php echo e($step->getLabel()); ?>

                            </div>

                            <?php if(filled($description = $step->getDescription())): ?>
                                <div class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                                    'text-sm leading-4 font-medium text-gray-500',
                                    'dark:text-gray-400' => config('forms.dark_mode'),
                                ]) ?>">
                                    <?php echo e($description); ?>

                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </button>

                <?php if(! $loop->first): ?>
                    <div class="hidden absolute top-0 left-0 w-3 inset-0 md:block" aria-hidden="true">
                        <svg class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                            'h-full w-full text-gray-300 rtl:rotate-180',
                            'dark:text-gray-700' => config('forms.dark_mode'),
                        ]) ?>" viewBox="0 0 12 82" fill="none" preserveAspectRatio="none">
                            <path d="M0.5 0V31L10.5 41L0.5 51V82" stroke="currentcolor" vector-effect="non-scaling-stroke" />
                        </svg>
                    </div>
                <?php endif; ?>
            </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ol>

    <div>
        <?php $__currentLoopData = $getChildComponentContainer()->getComponents(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $step): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php echo e($step); ?>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

    <div class="flex items-center justify-between">
        <div>
            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'forms::components.button','data' => ['icon' => $previousArrowIcon,'xShow' => '! isFirstStep()','xCloak' => true,'xOn:click' => 'previousStep','color' => 'secondary','size' => 'sm']] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms::button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($previousArrowIcon),'x-show' => '! isFirstStep()','x-cloak' => true,'x-on:click' => 'previousStep','color' => 'secondary','size' => 'sm']); ?>
                <?php echo e(__('forms::components.wizard.buttons.previous_step.label')); ?>

             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

            <div x-show="isFirstStep()">
                <?php echo e($getCancelAction()); ?>

            </div>
        </div>

        <div>
            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'forms::components.button','data' => ['icon' => $nextArrowIcon,'iconPosition' => 'after','xShow' => '! isLastStep()','xCloak' => true,'xOn:click' => '$wire.dispatchFormEvent(\'wizard::nextStep\', \''.e($getStatePath()).'\', getStepIndex(step))','wire:loading.class.delay' => 'opacity-70 cursor-wait','size' => 'sm']] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms::button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($nextArrowIcon),'icon-position' => 'after','x-show' => '! isLastStep()','x-cloak' => true,'x-on:click' => '$wire.dispatchFormEvent(\'wizard::nextStep\', \''.e($getStatePath()).'\', getStepIndex(step))','wire:loading.class.delay' => 'opacity-70 cursor-wait','size' => 'sm']); ?>
                <?php echo e(__('forms::components.wizard.buttons.next_step.label')); ?>

             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

            <div x-show="isLastStep()">
                <?php echo e($getSubmitAction()); ?>

            </div>
        </div>
    </div>
</div>
<?php /**PATH /Users/mat/Projects/AStA/asta-ticket-refund/vendor/filament/forms/resources/views/components/wizard.blade.php ENDPATH**/ ?>