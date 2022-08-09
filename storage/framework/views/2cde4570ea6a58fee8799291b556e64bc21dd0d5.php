<div
    aria-labelledby="<?php echo e($getId()); ?>"
    id="<?php echo e($getId()); ?>"
    role="tabpanel"
    tabindex="0"
    x-bind:class="{ 'invisible h-0 p-0 overflow-y-hidden': tab !== '<?php echo e($getId()); ?>', 'p-6': tab === '<?php echo e($getId()); ?>' }"
    <?php echo e($attributes->merge($getExtraAttributes())->class(['focus:outline-none filament-forms-tabs-component-tab'])); ?>

>
    <?php echo e($getChildComponentContainer()); ?>

</div>
<?php /**PATH /Users/mat/Projects/AStA/asta-ticket-refund/vendor/filament/forms/resources/views/components/tabs/tab.blade.php ENDPATH**/ ?>