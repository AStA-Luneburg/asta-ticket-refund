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
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.page-title','data' => ['subtitle' => config('app.asta-name'),'step' => 'welcome']] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('page-title'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['subtitle' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(config('app.asta-name')),'step' => 'welcome']); ?>
        <?php echo e(__('app.9-euro-ticket-refund')); ?>

     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.content','data' => ['class' => 'text-xl  text-asta-blue-900 mb-10 leading-relaxed']] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('content'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'text-xl  text-asta-blue-900 mb-10 leading-relaxed']); ?>
        <?php if(App::getLocale() === 'de'): ?>
            <p class="mb-5">
                <strong>Liebe Studierende</strong>,
            </p>
            <p class="mb-5">
                Für euer Semesterticket, das ihr für den Busverkehr im Landkreis Lüneburg und die Nahverkehrszüge in Niedersachsen und Bremen nutzen könnt, habt ihr im Sommersemester 2022 157,67 € bezahlt.
            </p>
            <p class="mb-5">
                Mit der Einführung des sogenannten 9-Euro-Tickets wurde euer Semesterticket für die Monate Juni, Juli und August obsolet.
                Für diese Monate zahlen wir den Bus- und Bahnunternehmen folglich nur 9 Euro pro Student*in und Monat.
            </p>
            <p class="mb-5">
                Doch was heißt das konkret für euch?
            </p>
            <p class="mb-5">
                <strong>Ihr bekommt daher 51,84 € eures Semesterbeitrages für das Sommersemester 2022 zurück!</strong>
            </p>
            <p class="mb-5">
                Da wir eure Kontoverbindungen nicht vorliegen haben, können wir diesen Beitrag nicht automatisch an alle Studierende überweisen.
            </p>
            <p class="mb-5">
                <strong>Daher muss jede*r Student*in die Erstattung der 51,84 € über diese Website beantragen.</strong>
            </p>
            <p class="mb-5">
                Antragsberechtigt sind alle Studierenden, die im Sommersemester 2022 ihren Semesterbeitrag gezahlt haben.<br>
                <i>Ausgenommen: Studierende der Professional School und Studierende, die eine Rückerstattung auf anderem Wege erhalten haben.</i>
            </p>
            <p class="mb-5">
                Die Möglichkeit der Rückerstattung steht allen antragsberechtigten Studierenden bis zum 31. Dezember 2025 zur Verfügung. Wir bitten euch, die Antragstellung möglichst schnell vorzunehmen.
            </p>
            <p class="mb-20">
                Mit besten Grüßen aus dem AStA,<br>
                <strong>Deine AStA-Sprecher*innen</strong>
            </p>
        <?php else: ?>
            <p class="mb-5">
                <strong>Dear students</strong>,
            </p>
            <p class="mb-5">
                For your semester ticket, which you can use for bus transport in the district of Lüneburg and local trains in Lower Saxony and Bremen, you paid 157,67 € in the summer semester 2022.
            </p>
            <p class="mb-5">
                With the introduction of the so-called 9-Euro-Ticket, your semester ticket became obsolete for the months of June, July and August.
                For these months, we will therefore only pay the bus and train companies €9 per student per month.
            </p>
            <p class="mb-5">
                But what does that mean for you?
            </p>
            <p class="mb-5">
                <strong>You will get back 51,84 € of your semester fee for the summer semester 2022!</strong>
            </p>
            <p class="mb-5">
                Since we do not have your bank account details, we cannot automatically transfer this fee to all students.
            </p>
            <p class="mb-5">
                <strong>Therefore, each student has to apply for the refund of the 51,84 € via this website.</strong>
            </p>
            <p class="mb-5">
                All students who have paid their semester fee in the summer semester 2022 are eligible to apply.<br>
                <i>Excluded: Professional School students and students who have received a refund through other means.</i>
            </p>
            <p class="mb-5">
                The refund option is available to all eligible students until December 31, 2025. We ask that you apply as soon as possible.
            </p>
            <p class="mb-20">
                With best regards from the AStA,<br>
                <strong>Your AStA spokespersons</strong>
            </p>
        <?php endif; ?>
        
        <h2 class=" text-3xl text-center font-semibold mb-20">
            <?php echo e(__('app.welcome.how-does-it-work')); ?>

        </h2>

        <div class="flex flex-col gap-20 ">
            <section class="flex gap-10 lg:gap-16 ml-14 xl:ml-0">
                <div>
                    <h3 class="text-2xl pb-2 font-medium mb-2 border-b border-slate-300 relative ">
                        <strong class="absolute left-0 -ml-14 text-5xl text-slate-300">1.</strong>
                        <?php echo e(__('app.welcome.step-1.title', ['university' => config('app.university')])); ?>

                    </h3>
                    <p class="leading-relaxed">
                        <?php echo e(__('app.welcome.step-1.text', ['university' => config('app.university')])); ?></p>
                </div>
                <figure class="hidden md:block pt-4 opacity-70"><img src="<?php echo e(url('/img/verification.svg')); ?>"
                        class="max-w-[300px]">
                </figure>

            </section>

            <section class="flex gap-24 lg:gap-32 ml-14 xl:ml-0">
                <div>
                    <h3 class="text-2xl pb-2 font-medium mb-2 border-b border-slate-300 relative">
                        <strong class="absolute left-0 -ml-14 text-5xl text-slate-300">2.</strong>
                        <?php echo e(__('app.welcome.step-2.title')); ?>

                    </h3>
                    <p class="mb-4"><?php echo e(__('app.welcome.step-2.text-1')); ?></p>
                    <p class=""><?php echo e(__('app.welcome.step-2.text-2')); ?></p>
                </div>
                <figure class="hidden md:block pt-4 opacity-70"><img src="<?php echo e(url('/img/banking.svg')); ?>"
                        class="max-w-[240px]">
                </figure>

            </section>

            <section class="flex gap-20 lg:gap-28 ml-14 xl:ml-0">
                <div>
                    <h3 class="text-2xl pb-2 font-medium mb-2 border-b border-slate-300 relative">
                        <strong class="absolute left-0 -ml-14 text-5xl text-slate-300">3.</strong>
                        <?php echo e(__('app.welcome.step-3.title')); ?>

                    </h3>
                    <p class="mb-4"><?php echo e(__('app.welcome.step-3.text')); ?></p>
                </div>
                <figure class="hidden md:block pt-8 opacity-70"><img src="<?php echo e(url('/img/waiting.svg')); ?>"
                        class="max-w-[250px]">
                </figure>

            </section>
        </div>

        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.bottom-nav','data' => ['class' => '!justify-end mt-20']] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('bottom-nav'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => '!justify-end mt-20']); ?>
            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.button','data' => ['element' => 'link','href' => route('verify'),'class' => 'bg-red-500 btn-primary self-end']] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['element' => 'link','href' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('verify')),'class' => 'bg-red-500 btn-primary self-end']); ?>
                <?php echo e(__('app.continue')); ?>

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
<?php /**PATH /Users/mat/Projects/AStA/asta-ticket-refund/resources/views/welcome.blade.php ENDPATH**/ ?>