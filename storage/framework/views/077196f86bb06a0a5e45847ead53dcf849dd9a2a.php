<?php
    $user = \Filament\Facades\Filament::auth()->user();
?>

<div
    x-data="{
        mode: null,

        theme: null,

        init: function () {
            this.theme = localStorage.getItem('theme') || (this.isSystemDark() ? 'dark' : 'light')
            this.mode = localStorage.getItem('theme') ? 'manual' : 'auto'

            window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', (event) => {
                if (this.mode === 'manual') return

                if (event.matches && (! document.documentElement.classList.contains('dark'))) {
                    this.theme = 'dark'

                    document.documentElement.classList.add('dark')
                } else if ((! event.matches) && document.documentElement.classList.contains('dark')) {
                    this.theme = 'light'

                    document.documentElement.classList.remove('dark')
                }
            })

            $watch('theme', () => {
                if (this.mode === 'auto') return

                localStorage.setItem('theme', this.theme)

                if (this.theme === 'dark' && (! document.documentElement.classList.contains('dark'))) {
                    document.documentElement.classList.add('dark')
                } else if (this.theme === 'light' && document.documentElement.classList.contains('dark')) {
                    document.documentElement.classList.remove('dark')
                }

                $dispatch('dark-mode-toggled', this.theme)
            })
        },

        isSystemDark: function () {
            return window.matchMedia('(prefers-color-scheme: dark)').matches
        },
    }"
    <?php echo e($attributes->class(['relative'])); ?>

>
    <button
        x-on:click="$refs.panel.toggle"
        class="block flex-shrink-0"
    >
        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'filament::components.user-avatar','data' => ['user' => $user]] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('filament::user-avatar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['user' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($user)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
    </button>

    <div
        x-ref="panel"
        x-float.placement.bottom-end.offset="{ offset: 8 }"
        x-transition:enter="transition"
        x-transition:enter-start="-translate-y-1 opacity-0"
        x-transition:enter-end="translate-y-0 opacity-100"
        x-transition:leave="transition"
        x-transition:leave-start="translate-y-0 opacity-100"
        x-transition:leave-end="-translate-y-1 opacity-0"
        x-cloak
        class="absolute z-10 hidden shadow-xl rounded-xl w-52 top-full"
    >
        <ul class="<?php echo \Illuminate\Support\Arr::toCssClasses([
            'py-1 space-y-1 overflow-hidden bg-white shadow rounded-xl',
            'dark:border-gray-600 dark:bg-gray-700' => config('filament.dark_mode'),
        ]) ?>">
            <?php
                $items = \Filament\Facades\Filament::getUserMenuItems();
                $accountItem = $items['account'] ?? null;
                $logoutItem = $items['logout'] ?? null;
            ?>

            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'filament::components.dropdown.item','data' => ['color' => $accountItem?->getColor() ?? 'secondary','icon' => $accountItem?->getIcon() ?? 'heroicon-s-user-circle','href' => $accountItem?->getUrl(),'tag' => 'a']] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('filament::dropdown.item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['color' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($accountItem?->getColor() ?? 'secondary'),'icon' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($accountItem?->getIcon() ?? 'heroicon-s-user-circle'),'href' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($accountItem?->getUrl()),'tag' => 'a']); ?>
                <?php echo e($accountItem?->getLabel() ?? \Filament\Facades\Filament::getUserName($user)); ?>

             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

            <div>
                <?php if(config('filament.dark_mode')): ?>
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'filament::components.dropdown.item','data' => ['icon' => 'heroicon-s-moon','xShow' => 'theme === \'dark\'','xOn:click' => 'mode = \'manual\'; theme = \'light\'']] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('filament::dropdown.item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'heroicon-s-moon','x-show' => 'theme === \'dark\'','x-on:click' => 'mode = \'manual\'; theme = \'light\'']); ?>
                        <?php echo e(__('filament::layout.buttons.light_mode.label')); ?>

                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'filament::components.dropdown.item','data' => ['icon' => 'heroicon-s-sun','xShow' => 'theme === \'light\'','xOn:click' => 'mode = \'manual\'; theme = \'dark\'']] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('filament::dropdown.item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => 'heroicon-s-sun','x-show' => 'theme === \'light\'','x-on:click' => 'mode = \'manual\'; theme = \'dark\'']); ?>
                        <?php echo e(__('filament::layout.buttons.dark_mode.label')); ?>

                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                <?php endif; ?>
            </div>

            <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($key !== 'account' && $key !== 'logout'): ?>
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'filament::components.dropdown.item','data' => ['color' => $item->getColor() ?? 'secondary','icon' => $item->getIcon(),'href' => $item->getUrl(),'tag' => 'a']] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('filament::dropdown.item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['color' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($item->getColor() ?? 'secondary'),'icon' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($item->getIcon()),'href' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($item->getUrl()),'tag' => 'a']); ?>
                        <?php echo e($item->getLabel()); ?>

                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'filament::components.dropdown.item','data' => ['color' => $logoutItem?->getColor() ?? 'secondary','icon' => $logoutItem?->getIcon() ?? 'heroicon-s-logout','action' => $logoutItem?->getUrl() ?? route('filament.auth.logout'),'method' => 'post','tag' => 'form']] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('filament::dropdown.item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['color' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($logoutItem?->getColor() ?? 'secondary'),'icon' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($logoutItem?->getIcon() ?? 'heroicon-s-logout'),'action' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($logoutItem?->getUrl() ?? route('filament.auth.logout')),'method' => 'post','tag' => 'form']); ?>
                <?php echo e($logoutItem?->getLabel() ?? __('filament::layout.buttons.logout.label')); ?>

             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
        </ul>
    </div>
</div>
<?php /**PATH /Users/mat/Projects/AStA/asta-ticket-refund/vendor/filament/filament/src/../resources/views/components/layouts/app/topbar/user-menu.blade.php ENDPATH**/ ?>