<div
    x-data="{

        tab: null,

        init: function () {
            this.tab = this.getTabs()[<?php echo \Illuminate\Support\Js::from($getActiveTab())->toHtml() ?> - 1]
        },

        getTabs: function () {
            return JSON.parse(this.$refs.tabsData.value)
        },

    }"
    x-on:expand-concealing-component.window="
        if (getTabs().includes($event.detail.id)) {
            tab = $event.detail.id
            $el.scrollIntoView({ behavior: 'smooth', block: 'start' })
        }
    "
    x-cloak
    <?php echo $getId() ? "id=\"{$getId()}\"" : null; ?>

    <?php echo e($attributes->merge($getExtraAttributes())->class([
        'rounded-xl shadow-sm border border-gray-300 bg-white filament-forms-tabs-component',
        'dark:bg-gray-800 dark:border-gray-700' => config('forms.dark_mode'),
    ])); ?>

    <?php echo e($getExtraAlpineAttributeBag()); ?>

>
    <input
        type="hidden"
        value='<?php echo e(collect($getChildComponentContainer()->getComponents())
                ->filter(static fn (\Filament\Forms\Components\Tabs\Tab $tab): bool => ! $tab->isHidden())
                ->map(static fn (\Filament\Forms\Components\Tabs\Tab $tab) => $tab->getId())
                ->values()
                ->toJson()); ?>'
        x-ref="tabsData"
    />

    <div
        <?php echo $getLabel() ? 'aria-label="' . $getLabel() . '"' : null; ?>

        role="tablist"
        class="<?php echo \Illuminate\Support\Arr::toCssClasses([
            'rounded-t-xl flex overflow-y-auto bg-gray-100',
            'dark:bg-gray-700' => config('forms.dark_mode'),
        ]) ?>"
    >
        <?php $__currentLoopData = $getChildComponentContainer()->getComponents(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tab): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <button
                type="button"
                aria-controls="<?php echo e($tab->getId()); ?>"
                x-bind:aria-selected="tab === '<?php echo e($tab->getId()); ?>'"
                x-on:click="tab = '<?php echo e($tab->getId()); ?>'"
                role="tab"
                x-bind:tabindex="tab === '<?php echo e($tab->getId()); ?>' ? 0 : -1"
                class="flex items-center gap-2 shrink-0 p-3 text-sm font-medium"
                x-bind:class="{
                    'text-gray-500 <?php if(config('forms.dark_mode')): ?> dark:text-gray-400 <?php endif; ?>': tab !== '<?php echo e($tab->getId()); ?>',
                    'bg-white text-primary-600 <?php if(config('forms.dark_mode')): ?> dark:bg-gray-800 <?php endif; ?>': tab === '<?php echo e($tab->getId()); ?>',
                }"
            >
                <?php if($icon = $tab->getIcon()): ?>
                    <?php if (isset($component)) { $__componentOriginal3bf0a20793be3eca9a779778cf74145887b021b9 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\DynamicComponent::class, ['component' => $icon] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('dynamic-component'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(Illuminate\View\DynamicComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'h-5 w-5']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3bf0a20793be3eca9a779778cf74145887b021b9)): ?>
<?php $component = $__componentOriginal3bf0a20793be3eca9a779778cf74145887b021b9; ?>
<?php unset($__componentOriginal3bf0a20793be3eca9a779778cf74145887b021b9); ?>
<?php endif; ?>
                <?php endif; ?>

                <span><?php echo e($tab->getLabel()); ?></span>

                <?php if($badge = $tab->getBadge()): ?>
                    <span
                        class="inline-flex items-center justify-center ml-auto rtl:ml-0 rtl:mr-auto min-h-4 px-2 py-0.5 text-xs font-medium tracking-tight rounded-xl whitespace-normal"
                        x-bind:class="{
                            'bg-gray-200 <?php if(config('forms.dark_mode')): ?> dark:bg-gray-600 <?php endif; ?>': tab !== '<?php echo e($tab->getId()); ?>',
                            'bg-primary-500/10 font-medium': tab === '<?php echo e($tab->getId()); ?>',
                        }"
                    >
                        <?php echo e($badge); ?>

                    </span>
                <?php endif; ?>
            </button>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

    <?php $__currentLoopData = $getChildComponentContainer()->getComponents(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tab): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php echo e($tab); ?>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<?php /**PATH /Users/mat/Projects/AStA/asta-ticket-refund/vendor/filament/forms/resources/views/components/tabs.blade.php ENDPATH**/ ?>