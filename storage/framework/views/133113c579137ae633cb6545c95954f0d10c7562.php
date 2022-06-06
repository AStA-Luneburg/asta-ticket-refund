<?php $__env->startSection('content'); ?>
    <h1><?php echo e(__('app.mails.verification.title')); ?></h1>
    <p><?php echo e(__('app.mails.hello')); ?></p>
    <p><?php echo __('app.mails.verification.message', ['name' => config('app.asta-name')]); ?></p>

    <p><?php echo e(__('app.mails.verification.verification-button')); ?></p>
    <table role="presentation" border="0" cellpadding="0" cellspacing="0" class="btn btn-primary"
        style="margin-bottom: 40px;">
        <tbody>
            <tr>
                <td align="center">
                    <table role="presentation" border="0" cellpadding="0" cellspacing="0">
                        <tbody>
                            <tr>
                                <td>
                                    <a href="<?php echo e($link); ?>"
                                        target="_blank"><?php echo e(__('app.mails.verification.finish-verification')); ?></a>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>
    <p style="margin-bottom: 8px; font-size: 12px;">
        <?php echo e(__('app.mails.verification.verification-link')); ?></p>
    <p style="margin-bottom: 30px; word-break: break-all; font-size: 12px;">
        <a href="<?php echo e($link); ?>" target="_blank" style="text-align: center; color: #57697a;"><?php echo e($link); ?></a>
    </p>
    <p style="font-weight: 600;">
        <?php echo e(__('app.mails.verification.time-limit')); ?>

    </p>
    <p>
        <?php echo __('app.mails.verification.support', ['email' => config('app.support-mail')]); ?>

    </p>
    <p><?php echo e(__('app.mails.your-team')); ?></p>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.mail', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/mat/Projects/AStA/asta-ticket-refund/resources/views/mails/verification.blade.php ENDPATH**/ ?>