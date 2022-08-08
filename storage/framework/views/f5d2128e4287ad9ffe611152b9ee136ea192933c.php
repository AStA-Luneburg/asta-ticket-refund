<div
    class="<?php echo \Illuminate\Support\Arr::toCssClasses([
        'filament-notifications pointer-events-none fixed inset-4 z-50 mx-auto flex justify-end gap-3',
        match (config('notifications.layout.alignment.horizontal')) {
            'left' => 'items-start',
            'center' => 'items-center',
            'right' => 'items-end',
        },
        match (config('notifications.layout.alignment.vertical')) {
            'top' => 'flex-col-reverse',
            'bottom' => 'flex-col',
        },
    ]) ?>"
    role="status"
>
    <?php $__currentLoopData = $notifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php echo e($notification); ?>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<?php /**PATH /Users/mat/Projects/AStA/asta-ticket-refund/vendor/filament/notifications/src/../resources/views/notifications.blade.php ENDPATH**/ ?>