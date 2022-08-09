<?php foreach($attributes->onlyProps([
    'notification',
]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps([
    'notification',
]); ?>
<?php foreach (array_filter(([
    'notification',
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<div
    <?php echo e($attributes->class('filament-notifications-notification pointer-events-auto')); ?>

    x-data="notificationComponent({
        $wire: $wire,
        notification: <?php echo e(\Illuminate\Support\Js::from($notification->toArray())); ?>,
    })"
    x-show="phase !== 'enter-start'"
    x-bind:class="{
        [$el.getAttribute('x-transition:leave')]: phase.startsWith('leave-'),
        [$el.getAttribute('x-transition:leave-start')]: phase === 'leave-start',
        [$el.getAttribute('x-transition:leave-end')]: phase === 'leave-end',
    }"
    wire:key="<?php echo e($this->id); ?>.notifications.<?php echo e($notification->getId()); ?>"
    dusk="filament.notifications.notification"
>
    <?php echo e($slot); ?>

</div>
<?php /**PATH /Users/mat/Projects/AStA/asta-ticket-refund/vendor/filament/notifications/src/../resources/views/components/notification.blade.php ENDPATH**/ ?>