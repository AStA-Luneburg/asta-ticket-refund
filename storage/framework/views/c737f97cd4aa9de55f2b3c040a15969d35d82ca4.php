<?php
$element = $attributes->get('element') ?? 'article';
?>

<<?php echo e($element); ?> <?php echo e($attributes->merge(['class' => 'px-5 sm:px-6 lg:px-8 max-w-5xl mx-auto'])); ?>>
    <?php echo e($slot); ?>

    </<?php echo e($element); ?>>
<?php /**PATH /Users/mat/Projects/AStA/asta-ticket-refund/resources/views/components/content.blade.php ENDPATH**/ ?>