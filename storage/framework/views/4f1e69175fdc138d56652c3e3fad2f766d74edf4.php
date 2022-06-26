<?php foreach($attributes->onlyProps(['title', 'subtitle' => null, 'color' => 'slate']) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps(['title', 'subtitle' => null, 'color' => 'slate']); ?>
<?php foreach (array_filter((['title', 'subtitle' => null, 'color' => 'slate']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>
<?php
$classes = '';
$border = '';
switch ($color) {
    case 'slate':
        $border = 'border-slate-200';
        $classes = 'border-slate-400 bg-slate-50 text-slate-900';
        break;

    case 'green':
        $border = 'border-green-200';
        $classes = 'border-green-400 bg-green-50 text-green-900';
        break;

    case 'red':
        $border = 'border-red-200';
        $classes = 'border-red-400 bg-red-50 text-red-900';
        break;
}
?>

<article
    <?php echo e($attributes->merge(['class' => $classes . ' border-2 rounded-lg px-4 py-3 mb-12 text-lg leading-relaxed shadow-lg'])); ?>>
    <header class="<?php echo e($border); ?> border-b-2 flex items-baseline justify-between gap-2 pb-1 mb-2">
        <h3 class="text-xl font-medium"><?php echo e($title); ?></h3>

        <?php if(isset($subtitle) && $subtitle !== null): ?>
            <span class="text-base text-right font-medium"><?php echo e($subtitle); ?></span>
        <?php endif; ?>
    </header>

    <?php echo e($slot); ?>

</article>
<?php /**PATH /Users/mat/Projects/AStA/asta-ticket-refund/resources/views/components/notification.blade.php ENDPATH**/ ?>