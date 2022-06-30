<?php
$primary = $attributes->get('element');
?>

<?php if($attributes->get('element') === 'link'): ?>
    <a <?php echo e($attributes->merge(['class' => 'btn'])); ?>>
        <?php echo e($slot); ?>

    </a>
<?php else: ?>
    <button <?php echo e($attributes->merge(['type' => 'submit', 'class' => 'btn'])); ?>>
        <?php echo e($slot); ?>

    </button>
<?php endif; ?>
<?php /**PATH /Users/mat/Projects/AStA/asta-ticket-refund/resources/views/components/button.blade.php ENDPATH**/ ?>