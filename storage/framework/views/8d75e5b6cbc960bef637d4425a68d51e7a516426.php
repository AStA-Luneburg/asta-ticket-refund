<div <?php echo e($attributes->merge($getExtraAttributes())->class(['px-4 py-3 filament-tables-image-column'])); ?>>
    <?php
        $height = $getHeight();
        $width = $getWidth() ?? ($isRounded() ? $height : null);
    ?>

    <div
        style="
            <?php echo $height !== null ? "height: {$height};" : null; ?>

            <?php echo $width !== null ? "width: {$width};" : null; ?>

        "
        class="<?php echo \Illuminate\Support\Arr::toCssClasses(['rounded-full overflow-hidden' => $isRounded()]) ?>"
    >
        <?php if($path = $getImagePath()): ?>
            <img
                src="<?php echo e($path); ?>"
                style="
                    <?php echo $height !== null ? "height: {$height};" : null; ?>

                    <?php echo $width !== null ? "width: {$width};" : null; ?>

                "
                class="<?php echo \Illuminate\Support\Arr::toCssClasses(['object-cover object-center' => $isRounded()]) ?>"
                <?php echo e($getExtraImgAttributeBag()); ?>

            >
       <?php endif; ?>
    </div>
</div>
<?php /**PATH /Users/mat/Projects/AStA/asta-ticket-refund/vendor/filament/tables/resources/views/columns/image-column.blade.php ENDPATH**/ ?>