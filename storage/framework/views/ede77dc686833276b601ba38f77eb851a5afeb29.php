<input
    id="<?php echo e($getId()); ?>"
    <?php echo $isRequired() ? 'required' : null; ?>

    type="hidden"
    <?php echo e($applyStateBindingModifiers('wire:model')); ?>="<?php echo e($getStatePath()); ?>"
    <?php echo e($attributes->merge($getExtraAttributes())->class(['filament-forms-hidden-component'])); ?>

    dusk="filament.forms.<?php echo e($getStatePath()); ?>"
/>
<?php /**PATH /Users/mat/Projects/AStA/asta-ticket-refund/vendor/filament/forms/resources/views/components/hidden.blade.php ENDPATH**/ ?>