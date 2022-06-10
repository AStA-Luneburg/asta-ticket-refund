<?php $__env->startSection('content'); ?>
    <h1><?php echo e(__('app.mails.submit-confirmation.title')); ?></h1>
    <p><?php echo e(__('app.mails.hello')); ?></p>
    <p><?php echo __('app.mails.submit-confirmation.message', ['name' => config('app.asta-name')]); ?></p>
    <p>
        <?php echo __('app.mails.submit-confirmation.support', ['email' => config('app.support-mail')]); ?>

    </p>
    <p><?php echo e(__('app.mails.your-team')); ?></p>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.mail', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/mat/Projects/AStA/asta-ticket-refund/resources/views/mails/submit-confirmation.blade.php ENDPATH**/ ?>