<?php if (isset($component)) { $__componentOriginal3bf0a20793be3eca9a779778cf74145887b021b9 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\DynamicComponent::class, ['component' => $getFieldWrapperView()] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('dynamic-component'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(Illuminate\View\DynamicComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => $getId(),'label' => $getLabel(),'label-sr-only' => $isLabelHidden(),'helper-text' => $getHelperText(),'hint' => $getHint(),'hint-icon' => $getHintIcon(),'required' => $isRequired(),'state-path' => $getStatePath()]); ?>
    <div
        x-data="tagsInputFormComponent({
            state: $wire.<?php echo e($applyStateBindingModifiers('entangle(\'' . $getStatePath() . '\')')); ?>,
        })"
        id="<?php echo e($getId()); ?>"
        <?php echo e($attributes->merge($getExtraAttributes())->class(['filament-forms-tags-input-component'])); ?>

        <?php echo e($getExtraAlpineAttributeBag()); ?>

    >
        <div
            x-show="state.length || <?php echo e($isDisabled() ? 'false' : 'true'); ?>"
            class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                'block w-full transition duration-75 divide-y rounded-lg shadow-sm border overflow-hidden focus-within:border-primary-600 focus-within:ring-1 focus-within:ring-primary-600',
                'dark:divide-gray-600' => config('forms.dark_mode'),
                'border-gray-300' => ! $errors->has($getStatePath()),
                'dark:border-gray-600' => (! $errors->has($getStatePath())) && config('forms.dark_mode'),
                'border-danger-600 ring-danger-600' => $errors->has($getStatePath()),
            ]) ?>"
        >
            <?php if (! ($isDisabled())): ?>
                <div>
                    <input
                        autocomplete="off"
                        <?php echo $isAutofocused() ? 'autofocus' : null; ?>

                        id="<?php echo e($getId()); ?>"
                        list="<?php echo e($getId()); ?>-suggestions"
                        <?php echo $getPlaceholder() ? 'placeholder="' . $getPlaceholder() . '"' : null; ?>

                        type="text"
                        dusk="filament.forms.<?php echo e($getStatePath()); ?>"
                        x-on:keydown.enter.stop.prevent="createTag()"
                        x-on:keydown.,.stop.prevent="createTag()"
                        x-on:blur="createTag()"
                        x-model="newTag"
                        <?php echo e($getExtraInputAttributeBag()->class([
                            'webkit-calendar-picker-indicator:opacity-0 block w-full border-0',
                            'dark:bg-gray-700 dark:text-gray-200 dark:placeholder-gray-400' => config('forms.dark_mode'),
                        ])); ?>

                    />

                    <datalist id="<?php echo e($getId()); ?>-suggestions">
                        <?php $__currentLoopData = $getSuggestions(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $suggestion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <template x-if="! state.includes('<?php echo e($suggestion); ?>')" x-bind:key="'<?php echo e($suggestion); ?>'">
                                <option value="<?php echo e($suggestion); ?>" />
                            </template>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </datalist>
                </div>
            <?php endif; ?>

            <div
                x-show="state.length"
                x-cloak
                class="overflow-hidden relative w-full p-2"
            >
                <div class="flex flex-wrap gap-1">
                    <template class="hidden" x-for="tag in state" x-bind:key="tag">
                        <button
                            <?php if (! ($isDisabled())): ?>
                                x-on:click="deleteTag(tag)"
                            <?php endif; ?>
                            type="button"
                            x-bind:dusk="'filament.forms.<?php echo e($getStatePath()); ?>' + '.tag.' + tag + '.delete'"
                            class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                                'inline-flex items-center justify-center min-h-6 px-2 py-0.5 text-sm font-medium tracking-tight text-primary-700 rounded-xl bg-primary-500/10 space-x-1 rtl:space-x-reverse',
                                'dark:text-primary-500' => config('forms.dark_mode'),
                                'cursor-default' => $isDisabled(),
                            ]) ?>"
                        >
                            <span class="text-left" x-text="tag"></span>

                            <?php if (! ($isDisabled())): ?>
                                <?php if (isset($component)) { $__componentOriginalcd9972c8156dfa6e5fd36675ca7bf5f21b506e2e = $component; } ?>
<?php $component = $__env->getContainer()->make(BladeUI\Icons\Components\Svg::class, [] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('heroicon-s-x'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(BladeUI\Icons\Components\Svg::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-3 h-3 shrink-0']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalcd9972c8156dfa6e5fd36675ca7bf5f21b506e2e)): ?>
<?php $component = $__componentOriginalcd9972c8156dfa6e5fd36675ca7bf5f21b506e2e; ?>
<?php unset($__componentOriginalcd9972c8156dfa6e5fd36675ca7bf5f21b506e2e); ?>
<?php endif; ?>
                            <?php endif; ?>
                        </button>
                    </template>
                </div>
            </div>
        </div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3bf0a20793be3eca9a779778cf74145887b021b9)): ?>
<?php $component = $__componentOriginal3bf0a20793be3eca9a779778cf74145887b021b9; ?>
<?php unset($__componentOriginal3bf0a20793be3eca9a779778cf74145887b021b9); ?>
<?php endif; ?>
<?php /**PATH /Users/mat/Projects/AStA/asta-ticket-refund/vendor/filament/forms/resources/views/components/tags-input.blade.php ENDPATH**/ ?>