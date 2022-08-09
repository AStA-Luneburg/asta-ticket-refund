<div
    <?php if($isCollapsible()): ?>
        x-data="{ isCollapsed: <?php echo e($isCollapsed() ? 'true' : 'false'); ?> }"
        x-on:open-form-section.window="if ($event.detail.id == $el.id) isCollapsed = false"
        x-on:collapse-form-section.window="if ($event.detail.id == $el.id) isCollapsed = true"
        x-on:toggle-form-section.window="if ($event.detail.id == $el.id) isCollapsed = ! isCollapsed"
        x-on:expand-concealing-component.window="
            if ($event.detail.id === $el.id) {
                isCollapsed = false
                
                setTimeout(() => $el.scrollIntoView({ behavior: 'smooth', block: 'start', inline: 'start' }), 100)
            }
        "
    <?php endif; ?>
    id="<?php echo e($getId()); ?>"
    <?php echo e($attributes->merge($getExtraAttributes())->class([
        'bg-white rounded-xl border border-gray-300 filament-forms-section-component',
        'dark:border-gray-600 dark:bg-gray-800' => config('forms.dark_mode'),
    ])); ?>

    <?php echo e($getExtraAlpineAttributeBag()); ?>

>
    <div
        class="<?php echo \Illuminate\Support\Arr::toCssClasses([
            'flex items-center px-4 py-2 bg-gray-100 rtl:space-x-reverse overflow-hidden rounded-t-xl min-h-[56px] filament-forms-section-header-wrapper',
            'dark:bg-gray-900' => config('forms.dark_mode'),
        ]) ?>"
        <?php if($isCollapsible()): ?>
            x-bind:class="{ 'rounded-b-xl': isCollapsed }"
            x-on:click="
                isCollapsed = ! isCollapsed
                
                if (isCollapsed) {
                    return
                }
                
                setTimeout(
                    () => $el.scrollIntoView({ behavior: 'smooth', block: 'start', inline: 'start' }),
                    100,
                )
            "
        <?php endif; ?>
    >
        <div
            class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                'flex-1 filament-forms-section-header',
                'cursor-pointer' => $isCollapsible(),
            ]) ?>"
        >
            <h3 class="text-xl font-bold tracking-tight pointer-events-none">
                <?php echo e($getHeading()); ?>

            </h3>

            <?php if($description = $getDescription()): ?>
                <p class="text-gray-500 pointer-events-none">
                    <?php echo e($description); ?>

                </p>
            <?php endif; ?>
        </div>

        <?php if($isCollapsible()): ?>
            <button x-on:click.stop="isCollapsed = ! isCollapsed"
                x-bind:class="{
                    '-rotate-180': !isCollapsed,
                }" type="button"
                class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                    'flex items-center justify-center w-10 h-10 transform rounded-full text-primary-500 hover:bg-gray-500/5 focus:bg-primary-500/10 focus:outline-none',
                    '-rotate-180' => ! $isCollapsed(),
                ]) ?>"
            >
                <svg class="h-7 w-7" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
            </button>
        <?php endif; ?>
    </div>

    <div
        <?php if($isCollapsible()): ?>
            x-bind:class="{ 'invisible h-0 !m-0 overflow-y-hidden': isCollapsed }"
            x-bind:aria-expanded="(! isCollapsed).toString()"
            <?php if($isCollapsed()): ?> x-cloak <?php endif; ?>
        <?php endif; ?>
        class="filament-forms-section-content-wrapper"
    >
        <div class="p-6 filament-forms-section-content">
            <?php echo e($getChildComponentContainer()); ?>

        </div>
    </div>
</div>
<?php /**PATH /Users/mat/Projects/AStA/asta-ticket-refund/vendor/filament/forms/resources/views/components/section.blade.php ENDPATH**/ ?>