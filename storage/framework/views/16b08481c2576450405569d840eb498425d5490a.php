<form
    x-data="{ isUploadingFile: false }"
    x-on:submit="if (isUploadingFile) $event.preventDefault()"
    x-on:file-upload-started="isUploadingFile = true"
    x-on:file-upload-finished="isUploadingFile = false"
    <?php echo e($attributes->class('space-y-6 filament-form')); ?>

>
    <?php echo e($slot); ?>

</form>
<?php /**PATH /Users/mat/Projects/AStA/asta-ticket-refund/vendor/filament/filament/resources/views/components/form/index.blade.php ENDPATH**/ ?>