<footer class="pt-6 pb-12 bg-slate-200 shadow-inner">
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.content','data' => ['class' => 'flex flex-col gap-2 md:flex-row md:gap-10 mb-8']] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('content'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'flex flex-col gap-2 md:flex-row md:gap-10 mb-8']); ?>
        <figure class="flex justify-center">
            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.application-logo','data' => ['class' => 'w-64 md:w-48 text-slate-400 fill-current']] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('application-logo'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-64 md:w-48 text-slate-400 fill-current']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
        </figure>
        <p class="pt-4 min-w-lg flex-1 text-slate-500 text-sm font-medium">
            <?php echo config('app.footer-address'); ?>

        </p>
        <div class="pt-4 text-base flex-1 flex-shrink-0">
            <ul class="flex flex-col gap-2">
                <li><a href="<?php echo e(config('app.impressum-url')); ?>"
                        class="text-slate-600 hover:text-slate-800 font-medium"><?php echo e(__('app.footer.imprint')); ?></a></li>
                <li><a href="<?php echo e(config('app.privacy-url')); ?>"
                        class="text-slate-600 hover:text-slate-800 font-medium"><?php echo e(__('app.footer.privacy-policy')); ?></a>
                </li>
                <li><a href="<?php echo e(config('app.faq-url')); ?>"
                        class="text-slate-600 hover:text-slate-800 font-medium"><?php echo e(__('app.footer.faq')); ?></a></li>
            </ul>
        </div>
     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.content','data' => ['class' => 'flex gap-10 text-sm text-slate-500 py-4 hidden md:block']] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('content'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'flex gap-10 text-sm text-slate-500 py-4 hidden md:block']); ?>
        <p class="md:px-4"><?php echo __('app.footer.powered-by', ['homepage' => config('app.homepage-url'), 'university' => config('app.university-full')]); ?></p>
     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
</footer>
<?php /**PATH /Users/mat/Projects/AStA/asta-ticket-refund/resources/views/layouts/footer.blade.php ENDPATH**/ ?>