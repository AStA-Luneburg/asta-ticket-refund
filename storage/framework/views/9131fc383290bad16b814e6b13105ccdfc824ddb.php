<?php if (isset($component)) { $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\AppLayout::class, [] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(App\View\Components\AppLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.page-title','data' => ['subtitle' => __('app.email-verification'),'step' => 'verification']] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('page-title'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['subtitle' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('app.email-verification')),'step' => 'verification']); ?>
        <?php echo e(__('app.check-mail')); ?>

     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.content','data' => []] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('content'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
        <?php if(App::getLocale() === 'de'): ?>
            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.notification','data' => ['color' => 'slate','title' => 'Überlastung der Leuphana-Server','subtitle' => '01.07.22 13:15']] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('notification'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['color' => 'slate','title' => 'Überlastung der Leuphana-Server','subtitle' => '01.07.22 13:15']); ?>
                <p class="mb-4">
                    Derzeit versuchen viele Studierende, ihre Rückerstattungsanträge zu stellen.
                </p>
                <p class="mb-4">
                    Leider hat der Mailserver der Leuphana angefangen, unsere E-Mails zu drosseln, sodass es bis zu 30-45 Minuten dauern kann, bis diese ankommen. Wir sind in Kontakt mit dem MIZ, aber die Drosselung unseres Servers wurde noch nicht aufgehoben.
                </p>
                <p class="mb-0 font-semibold"> 
                    Bitte warte noch ein wenig, bis die Bestätigungsmail eintrifft. Wenn sie nach einer Stunde immer noch nicht eingetroffen ist, versuche es bitte erneut. :)
                </p>
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
        <?php else: ?>
            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.notification','data' => ['color' => 'slate','title' => 'Throttling by Leuphana\'s servers','subtitle' => '01.07.22 13:15']] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('notification'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['color' => 'slate','title' => 'Throttling by Leuphana\'s servers','subtitle' => '01.07.22 13:15']); ?>
                <p class="mb-4">
                    Currently there are a lot of students trying to submit their refund requests.
                </p>
                <p class="mb-4">
                    Unfortunately, the Leuphana mail server is starting to throttle our mails, so they can take up to 30-45 minutes to arrive. We’re in contact with Leuphana’s IT-Support, however, they have not stopped blocking our server.
                </p>
                <p class="mb-0 font-semibold"> 
                    Please wait a little bit longer until the verification mail arrives. If it still has not arrived after an hour, please try again. :)
                </p>
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
        <?php endif; ?>

        <p class="text-xl mb-4">
            <?php echo __('app.mail-check.text-1', ['email' => $email]); ?>

        </p>
        <p class="text-xl mb-4">
            <?php echo e(__('app.mail-check.text-2')); ?>

        </p>
        <p class="text-xl mb-16">
            <?php echo __('app.mail-check.text-3', ['support-mail' => config('app.support-mail')]); ?>

        </p>



        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.bottom-nav','data' => []] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('bottom-nav'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.button','data' => ['element' => 'link','href' => route('verify', ['reset_email' => 1])]] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['element' => 'link','href' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('verify', ['reset_email' => 1]))]); ?>
                <?php echo e(__('app.back')); ?>

             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

            <form action="<?php echo e(route('verify')); ?>" method="post" class="w-full flex flex-col sm:flex-row items-center gap-5 sm:w-auto">
                <?php echo csrf_field(); ?>
                <input id="email" type="hidden" name="email" value="<?php echo e($email); ?>" />
                <input id="privacy-check" type="hidden" name="privacy-check" value="on" />
                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.button','data' => ['type' => 'submit','class' => 'btn btn-primary','id' => 'resend-button','disabled' => true]] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'submit','class' => 'btn btn-primary','id' => 'resend-button','disabled' => true]); ?>
                    <?php echo e(__('app.resend-verification')); ?>

                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                <span class="text-slate-600" id="cooldown-seconds">
                    in 
                    <span>5</span> 
                    <?php if(App::getLocale() === 'de'): ?>
                        Sekunden
                    <?php else: ?>
                        seconds
                    <?php endif; ?>
                </span>
            </form>

            <script type="text/javascript">
                var cooldown = document.querySelector('#cooldown-seconds');
                var cooldownCounter = cooldown.querySelector('span');
                var resendButton = document.querySelector('#resend-button');
                var counter = 20;

                cooldownCounter.textContent = counter;

                setInterval(function () {
                    if (counter <= 1) {
                        resendButton.disabled = false;
                        cooldown.remove();
                    } else {
                        counter--;
                        cooldownCounter.textContent = counter;
                    }
                }, 1000);
            </script>
         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da)): ?>
<?php $component = $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da; ?>
<?php unset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da); ?>
<?php endif; ?>
<?php /**PATH /Users/mat/Projects/AStA/asta-ticket-refund/resources/views/check-mail.blade.php ENDPATH**/ ?>