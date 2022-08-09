<?php
    use Filament\Tables\Filters\Layout;

    $actions = $getActions();
    $columns = $getColumns();
    $content = $getContent();
    $contentFooter = $getContentFooter();
    $header = $getHeader();
    $headerActions = $getHeaderActions();
    $heading = $getHeading();
    $isReorderable = $isReorderable();
    $isReordering = $isReordering();
    $isSearchVisible = $isSearchable();
    $isSelectionEnabled = $isSelectionEnabled();
    $isStriped = $isStriped();
    $hasFilters = $isFilterable();
    $hasFiltersPopover = $hasFilters && ($getFiltersLayout() === Layout::Popover);
    $hasFiltersAboveContent = $hasFilters && ($getFiltersLayout() === Layout::AboveContent);
    $isColumnToggleFormVisible = $hasToggleableColumns();

    $columnsCount = count($columns);
    if (count($actions) && (! $isReordering)) $columnsCount++;
    if ($isSelectionEnabled || $isReordering) $columnsCount++;

    $getHiddenClasses = function (\Filament\Tables\Columns\Column $column): ?string {
        if ($breakpoint = $column->getHiddenFrom()) {
            return match ($breakpoint) {
                'sm' => 'sm:hidden',
                'md' => 'md:hidden',
                'lg' => 'lg:hidden',
                'xl' => 'xl:hidden',
                '2xl' => '2xl:hidden',
            };
        }

        if ($breakpoint = $column->getVisibleFrom()) {
            return match ($breakpoint) {
                'sm' => 'hidden sm:table-cell',
                'md' => 'hidden md:table-cell',
                'lg' => 'hidden lg:table-cell',
                'xl' => 'hidden xl:table-cell',
                '2xl' => 'hidden 2xl:table-cell',
            };
        }

        return null;
    };
?>

<div
    x-data="{
        hasHeader: true,

        isLoading: false,

        selectedRecords: [],

        shouldCheckUniqueSelection: true,

        init: function () {
            $wire.on('deselectAllTableRecords', () => this.deselectAllRecords())

            $watch('selectedRecords', () => {
                if (! this.shouldCheckUniqueSelection) {
                    this.shouldCheckUniqueSelection = true

                    return
                }

                this.selectedRecords = [...new Set(this.selectedRecords)]

                this.shouldCheckUniqueSelection = false
            })
        },

        mountBulkAction: function (name) {
            $wire.mountTableBulkAction(name, this.selectedRecords)
        },

        toggleSelectRecordsOnPage: function () {
            let keys = this.getRecordsOnPage()

            if (this.areRecordsSelected(keys)) {
                this.deselectRecords(keys)

                return
            }

            this.selectRecords(keys)
        },

        getRecordsOnPage: function () {
            let keys = []

            for (checkbox of $el.getElementsByClassName('table-row-checkbox')) {
                keys.push(checkbox.value)
            }

            return keys
        },

        selectRecords: function (keys) {
            for (key of keys) {
                if (this.isRecordSelected(key)) {
                    continue
                }

                this.selectedRecords.push(key)
            }
        },

        deselectRecords: function (keys) {
            for (key of keys) {
                let index = this.selectedRecords.indexOf(key)

                if (index === -1) {
                    continue
                }

                this.selectedRecords.splice(index, 1)
            }
        },

        selectAllRecords: async function () {
            this.isLoading = true

            this.selectedRecords = (await $wire.getAllTableRecordKeys()).map((key) => key.toString())

            this.isLoading = false
        },

        deselectAllRecords: function () {
            this.selectedRecords = []
        },

        isRecordSelected: function (key) {
            return this.selectedRecords.includes(key)
        },

        areRecordsSelected: function (keys) {
            return keys.every(key => this.isRecordSelected(key))
        },

        // https://github.com/laravel/framework/blob/5299c22321c0f1ea8ff770b84a6c6469c4d6edec/src/Illuminate/Translation/MessageSelector.php#L15
        pluralize: function (text, number, variables) {
            function extract(segments, number) {
                for (const part of segments) {
                    const line = extractFromString(part, number)

                    if (line !== null) {
                        return line
                    }
                }
            }

            function extractFromString(part, number) {
                const matches = part.match(/^[\{\[]([^\[\]\{\}]*)[\}\]](.*)/s)

                if (matches === null || matches.length !== 3) {
                    return null
                }

                const condition = matches[1]

                const value = matches[2]

                if (condition.includes(',')) {
                    const [from, to] = condition.split(',', 2)

                    if (to === '*' && number >= from) {
                        return value
                    } else if (from === '*' && number <= to) {
                        return value
                    } else if (number >= from && number <= to) {
                        return value
                    }
                }

                return condition == number ? value : null
            }

            function ucfirst(string) {
                return string.toString().charAt(0).toUpperCase() + string.toString().slice(1)
            }

            function replace(line, replace) {
                if (replace.length === 0) {
                    return line
                }

                const shouldReplace = {}

                for (let [key, value] of Object.entries(replace)) {
                    shouldReplace[':' + ucfirst(key ?? '')] = ucfirst(value ?? '')
                    shouldReplace[':' + key.toUpperCase()] = value.toString().toUpperCase()
                    shouldReplace[':' + key] = value
                }

                Object.entries(shouldReplace).forEach(([key, value]) => {
                    line = line.replaceAll(key, value)
                })

                return line
            }

            function stripConditions(segments) {
                return segments.map(part => part.replace(/^[\{\[]([^\[\]\{\}]*)[\}\]]/, ''))
            }

            let segments = text.split('|')

            const value = extract(segments, number)

            if (value !== null && value !== undefined) {
                return replace(value.trim(), variables)
            }

            segments = stripConditions(segments)

            return replace(segments.length > 1 && number > 1 ? segments[1] : segments[0], variables)
        }
    }"
    class="filament-tables-component"
>
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'tables::components.container','data' => []] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('tables::container'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
        <div
            x-show="hasHeader = (<?php echo \Illuminate\Support\Js::from($renderHeader = ($header || $heading || ($headerActions && (! $isReordering)) || $isReorderable || $isSearchVisible || $hasFilters || $isColumnToggleFormVisible))->toHtml() ?> || selectedRecords.length)"
            <?php echo ! $renderHeader ? 'x-cloak' : null; ?>

        >
            <?php if($header): ?>
                <?php echo e($header); ?>

            <?php elseif($heading || ($headerActions && (! $isReordering))): ?>
                <div class="px-2 pt-2">
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'tables::components.header.index','data' => ['actions' => $isReordering ? [] : $headerActions,'class' => 'mb-2']] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('tables::header'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['actions' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($isReordering ? [] : $headerActions),'class' => 'mb-2']); ?>
                         <?php $__env->slot('heading', null, []); ?> 
                            <?php echo e($heading); ?>

                         <?php $__env->endSlot(); ?>

                         <?php $__env->slot('description', null, []); ?> 
                            <?php echo e($getDescription()); ?>

                         <?php $__env->endSlot(); ?>
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'tables::components.hr','data' => ['xShow' => \Illuminate\Support\Js::from($isReorderable || $isSearchVisible || $hasFilters || $isColumnToggleFormVisible) . ' || selectedRecords.length']] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('tables::hr'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['x-show' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(\Illuminate\Support\Js::from($isReorderable || $isSearchVisible || $hasFilters || $isColumnToggleFormVisible) . ' || selectedRecords.length')]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                </div>
            <?php endif; ?>

            <?php if($hasFiltersAboveContent): ?>
                <div class="px-2 pt-2">
                    <div class="p-4 mb-2">
                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'tables::components.filters.index','data' => ['form' => $getFiltersForm()]] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('tables::filters'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['form' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($getFiltersForm())]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                    </div>

                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'tables::components.hr','data' => ['xShow' => \Illuminate\Support\Js::from($isReorderable || $isSearchVisible || $isColumnToggleFormVisible) . ' || selectedRecords.length']] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('tables::hr'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['x-show' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(\Illuminate\Support\Js::from($isReorderable || $isSearchVisible || $isColumnToggleFormVisible) . ' || selectedRecords.length')]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                </div>
            <?php endif; ?>

            <div
                x-show="<?php echo \Illuminate\Support\Js::from($shouldRenderHeaderDiv = ($isReorderable || $isSearchVisible || $hasFiltersPopover || $isColumnToggleFormVisible))->toHtml() ?> || selectedRecords.length"
                <?php echo ! $shouldRenderHeaderDiv ? 'x-cloak' : null; ?>

                class="flex items-center justify-between p-2 h-14"
                x-bind:class="{
                    'gap-2': <?php echo \Illuminate\Support\Js::from($isReorderable)->toHtml() ?> || selectedRecords.length,
                }"
            >
                <div class="flex items-center gap-2">
                    <?php if($isReorderable): ?>
                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'tables::components.reorder.trigger','data' => ['enabled' => $isReordering]] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('tables::reorder.trigger'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['enabled' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($isReordering)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                    <?php endif; ?>

                    <?php if(! $isReordering): ?>
                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'tables::components.bulk-actions.index','data' => ['xShow' => 'selectedRecords.length','actions' => $getBulkActions()]] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('tables::bulk-actions'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['x-show' => 'selectedRecords.length','actions' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($getBulkActions())]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                    <?php endif; ?>
                </div>

                <?php if($isSearchVisible || $hasFiltersPopover || $isColumnToggleFormVisible): ?>
                    <div class="w-full flex items-center justify-end gap-2 md:max-w-md">
                        <?php if($isSearchVisible): ?>
                            <div class="flex-1">
                                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'tables::components.search-input','data' => []] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('tables::search-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                            </div>
                        <?php endif; ?>

                        <?php if($isColumnToggleFormVisible): ?>
                            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'tables::components.toggleable.index','data' => ['form' => $getColumnToggleForm(),'width' => $getColumnToggleFormWidth(),'class' => 'shrink-0']] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('tables::toggleable'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['form' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($getColumnToggleForm()),'width' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($getColumnToggleFormWidth()),'class' => 'shrink-0']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                        <?php endif; ?>

                        <?php if($hasFiltersPopover): ?>
                            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'tables::components.filters.popover','data' => ['form' => $getFiltersForm(),'width' => $getFiltersFormWidth(),'class' => 'shrink-0']] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('tables::filters.popover'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['form' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($getFiltersForm()),'width' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($getFiltersFormWidth()),'class' => 'shrink-0']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <div
            class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                'overflow-y-auto relative',
                'dark:border-gray-700' => config('tables.dark_mode'),
                'rounded-t-xl' => ! $renderHeader,
                'border-t' => $renderHeader,
            ]) ?>"
            x-bind:class="{
                'rounded-t-xl': ! hasHeader,
                'border-t': hasHeader,
            }"
        >
            <?php if(($records = $getRecords())->count()): ?>
                <?php if($content): ?>
                    <?php echo e($content->with(['records' => $records])); ?>

                <?php else: ?>
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'tables::components.table','data' => []] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('tables::table'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                         <?php $__env->slot('header', null, []); ?> 
                            <?php if($isReordering): ?>
                                <th></th>
                            <?php elseif($isSelectionEnabled): ?>
                                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'tables::components.checkbox-cell','data' => []] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('tables::checkbox-cell'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                     <?php $__env->slot('checkbox', null, ['x-on:click' => 'toggleSelectRecordsOnPage','x-bind:checked' => '
                                            if (areRecordsSelected(getRecordsOnPage())) {
                                                $el.checked = true

                                                return \'checked\'
                                            }

                                            $el.checked = false

                                            return null
                                        ']); ?>  <?php $__env->endSlot(); ?>
                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                            <?php endif; ?>

                            <?php $__currentLoopData = $columns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $column): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'tables::components.header-cell','data' => ['extraAttributes' => $column->getExtraHeaderAttributes(),'isSortColumn' => $getSortColumn() === $column->getName(),'name' => $column->getName(),'alignment' => $column->getAlignment(),'sortable' => $column->isSortable() && (! $isReordering),'sortDirection' => $getSortDirection(),'class' => $getHiddenClasses($column)]] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('tables::header-cell'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['extra-attributes' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($column->getExtraHeaderAttributes()),'is-sort-column' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($getSortColumn() === $column->getName()),'name' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($column->getName()),'alignment' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($column->getAlignment()),'sortable' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($column->isSortable() && (! $isReordering)),'sort-direction' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($getSortDirection()),'class' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($getHiddenClasses($column))]); ?>
                                    <?php echo e($column->getLabel()); ?>

                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            <?php if(count($actions) && (! $isReordering)): ?>
                                <th class="w-5"></th>
                            <?php endif; ?>
                         <?php $__env->endSlot(); ?>

                        <?php if($isReordering): ?>
                            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'tables::components.reorder.indicator','data' => ['colspan' => $columnsCount]] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('tables::reorder.indicator'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['colspan' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($columnsCount)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                        <?php elseif($isSelectionEnabled): ?>
                            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'tables::components.selection-indicator','data' => ['allRecordsCount' => $getAllRecordsCount(),'colspan' => $columnsCount,'xShow' => 'selectedRecords.length']] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('tables::selection-indicator'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['all-records-count' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($getAllRecordsCount()),'colspan' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($columnsCount),'x-show' => 'selectedRecords.length']); ?>
                                 <?php $__env->slot('selectedRecordsCount', null, []); ?> 
                                    <span x-text="selectedRecords.length"></span>
                                 <?php $__env->endSlot(); ?>
                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                        <?php endif; ?>

                        <?php $__currentLoopData = $records; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $record): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                                $recordKey = $getRecordKey($record);
                                $recordUrl = $getRecordUrl($record);
                            ?>

                            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'tables::components.row','data' => ['recordUrl' => $recordUrl,'wire:key' => $this->id . '.table.records.' . $recordKey,'wire:sortable.item' => $isReordering ? $recordKey : null,'wire:sortable.handle' => $isReordering,'striped' => $isStriped,'xBind:class' => '{
                                    \'bg-gray-50 '.e(config('tables.dark_mode') ? 'dark:bg-gray-500/10' : '').'\': isRecordSelected(\''.e($recordKey).'\'),
                                }','class' => \Illuminate\Support\Arr::toCssClasses([
                                    'group cursor-move' => $isReordering,
                                ])]] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('tables::row'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['record-url' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($recordUrl),'wire:key' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($this->id . '.table.records.' . $recordKey),'wire:sortable.item' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($isReordering ? $recordKey : null),'wire:sortable.handle' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($isReordering),'striped' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($isStriped),'x-bind:class' => '{
                                    \'bg-gray-50 '.e(config('tables.dark_mode') ? 'dark:bg-gray-500/10' : '').'\': isRecordSelected(\''.e($recordKey).'\'),
                                }','class' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(\Illuminate\Support\Arr::toCssClasses([
                                    'group cursor-move' => $isReordering,
                                ]))]); ?>
                                <?php if($isReordering): ?>
                                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'tables::components.reorder.cell','data' => []] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('tables::reorder.cell'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                                <?php elseif($isSelectionEnabled): ?>
                                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'tables::components.checkbox-cell','data' => []] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('tables::checkbox-cell'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                         <?php $__env->slot('checkbox', null, ['x-model' => 'selectedRecords','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($recordKey),'class' => 'table-row-checkbox']); ?>  <?php $__env->endSlot(); ?>
                                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                                <?php endif; ?>

                                <?php $__currentLoopData = $columns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $column): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php
                                        $column->record($record);
                                    ?>

                                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'tables::components.cell','data' => ['action' => $column->getAction(),'name' => $column->getName(),'alignment' => $column->getAlignment(),'record' => $record,'tooltip' => $column->getTooltip(),'recordAction' => $getRecordAction(),'recordUrl' => $recordUrl,'shouldOpenUrlInNewTab' => $column->shouldOpenUrlInNewTab(),'url' => $column->getUrl(),'isClickDisabled' => $column->isClickDisabled() || $isReordering,'class' => $getHiddenClasses($column),'wire:loading.remove.delay' => true,'wire:target' => ''.e(implode(',', \Filament\Tables\Table::LOADING_TARGETS)).'']] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('tables::cell'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['action' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($column->getAction()),'name' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($column->getName()),'alignment' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($column->getAlignment()),'record' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($record),'tooltip' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($column->getTooltip()),'record-action' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($getRecordAction()),'record-url' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($recordUrl),'should-open-url-in-new-tab' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($column->shouldOpenUrlInNewTab()),'url' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($column->getUrl()),'is-click-disabled' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($column->isClickDisabled() || $isReordering),'class' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($getHiddenClasses($column)),'wire:loading.remove.delay' => true,'wire:target' => ''.e(implode(',', \Filament\Tables\Table::LOADING_TARGETS)).'']); ?>
                                        <?php echo e($column); ?>

                                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                <?php if(count($actions) && (! $isReordering)): ?>
                                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'tables::components.actions-cell','data' => ['actions' => $actions,'record' => $record,'wire:loading.remove.delay' => true,'wire:target' => ''.e(implode(',', \Filament\Tables\Table::LOADING_TARGETS)).'']] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('tables::actions-cell'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['actions' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($actions),'record' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($record),'wire:loading.remove.delay' => true,'wire:target' => ''.e(implode(',', \Filament\Tables\Table::LOADING_TARGETS)).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                                <?php endif; ?>

                                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'tables::components.loading-cell','data' => ['colspan' => $columnsCount,'wire:loading.class.remove.delay' => 'hidden','class' => 'hidden','wire:target' => ''.e(implode(',', \Filament\Tables\Table::LOADING_TARGETS)).'']] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('tables::loading-cell'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['colspan' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($columnsCount),'wire:loading.class.remove.delay' => 'hidden','class' => 'hidden','wire:target' => ''.e(implode(',', \Filament\Tables\Table::LOADING_TARGETS)).'']); ?>
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
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        <?php if($contentFooter): ?>
                             <?php $__env->slot('footer', null, []); ?> 
                                <?php echo e($contentFooter->with(['columns' => $columns, 'records' => $records])); ?>

                             <?php $__env->endSlot(); ?>
                        <?php endif; ?>
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                <?php endif; ?>
            <?php else: ?>
                <?php if($emptyState = $getEmptyState()): ?>
                    <?php echo e($emptyState); ?>

                <?php else: ?>
                    <div class="flex items-center justify-center p-4">
                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'tables::components.empty-state.index','data' => ['icon' => $getEmptyStateIcon(),'actions' => $getEmptyStateActions()]] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('tables::empty-state'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($getEmptyStateIcon()),'actions' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($getEmptyStateActions())]); ?>
                             <?php $__env->slot('heading', null, []); ?> 
                                <?php echo e($getEmptyStateHeading()); ?>

                             <?php $__env->endSlot(); ?>

                             <?php $__env->slot('description', null, []); ?> 
                                <?php echo e($getEmptyStateDescription()); ?>

                             <?php $__env->endSlot(); ?>
                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
        </div>

        <?php if(
            $records instanceof \Illuminate\Contracts\Pagination\Paginator &&
            ((! $records instanceof \Illuminate\Contracts\Pagination\LengthAwarePaginator) || $records->total())
        ): ?>
            <div class="<?php echo \Illuminate\Support\Arr::toCssClasses([
                'p-2 border-t',
                'dark:border-gray-700' => config('tables.dark_mode'),
            ]) ?>">
                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'tables::components.pagination.index','data' => ['paginator' => $records,'recordsPerPageSelectOptions' => $getRecordsPerPageSelectOptions()]] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('tables::pagination'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['paginator' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($records),'records-per-page-select-options' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($getRecordsPerPageSelectOptions())]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
            </div>
        <?php endif; ?>
     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

    <form wire:submit.prevent="callMountedTableAction">
        <?php
            $action = $getMountedAction();
        ?>

        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'tables::components.modal.index','data' => ['id' => \Illuminate\Support\Str::of(static::class)->replace('\\', '\\\\') . '-table-action','wire:key' => $action ? $this->id . '.table' . ($getMountedActionRecordKey() ? '.records.' . $getMountedActionRecordKey() : null) . '.actions.' . $action->getName() . '.modal' : null,'visible' => filled($action),'width' => $action?->getModalWidth(),'displayClasses' => 'block']] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('tables::modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(\Illuminate\Support\Str::of(static::class)->replace('\\', '\\\\') . '-table-action'),'wire:key' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($action ? $this->id . '.table' . ($getMountedActionRecordKey() ? '.records.' . $getMountedActionRecordKey() : null) . '.actions.' . $action->getName() . '.modal' : null),'visible' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(filled($action)),'width' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($action?->getModalWidth()),'display-classes' => 'block']); ?>
            <?php if($action): ?>
                <?php if($action->isModalCentered()): ?>
                     <?php $__env->slot('heading', null, []); ?> 
                        <?php echo e($action->getModalHeading()); ?>

                     <?php $__env->endSlot(); ?>

                    <?php if($subheading = $action->getModalSubheading()): ?>
                         <?php $__env->slot('subheading', null, []); ?> 
                            <?php echo e($subheading); ?>

                         <?php $__env->endSlot(); ?>
                    <?php endif; ?>
                <?php else: ?>
                     <?php $__env->slot('header', null, []); ?> 
                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'tables::components.modal.heading','data' => []] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('tables::modal.heading'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                            <?php echo e($action->getModalHeading()); ?>

                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                     <?php $__env->endSlot(); ?>
                <?php endif; ?>

                <?php echo e($action->getModalContent()); ?>


                <?php if($action->hasFormSchema()): ?>
                    <?php echo e($getMountedActionForm()); ?>

                <?php endif; ?>

                <?php if(count($action->getModalActions())): ?>
                     <?php $__env->slot('footer', null, []); ?> 
                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'tables::components.modal.actions','data' => ['fullWidth' => $action->isModalCentered()]] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('tables::modal.actions'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['full-width' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($action->isModalCentered())]); ?>
                            <?php $__currentLoopData = $action->getModalActions(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $modalAction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php echo e($modalAction); ?>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                     <?php $__env->endSlot(); ?>
                <?php endif; ?>
            <?php endif; ?>
         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
    </form>

    <form wire:submit.prevent="callMountedTableBulkAction">
        <?php
            $action = $getMountedBulkAction();
        ?>

        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'tables::components.modal.index','data' => ['id' => \Illuminate\Support\Str::of(static::class)->replace('\\', '\\\\') . '-table-bulk-action','wire:key' => $action ? $this->id . '.table.bulk-actions.' . $action->getName() . '.modal' : null,'visible' => filled($action),'width' => $action?->getModalWidth(),'displayClasses' => 'block']] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('tables::modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(\Illuminate\Support\Str::of(static::class)->replace('\\', '\\\\') . '-table-bulk-action'),'wire:key' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($action ? $this->id . '.table.bulk-actions.' . $action->getName() . '.modal' : null),'visible' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(filled($action)),'width' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($action?->getModalWidth()),'display-classes' => 'block']); ?>
            <?php if($action): ?>
                <?php if($action->isModalCentered()): ?>
                     <?php $__env->slot('heading', null, []); ?> 
                        <?php echo e($action->getModalHeading()); ?>

                     <?php $__env->endSlot(); ?>

                    <?php if($subheading = $action->getModalSubheading()): ?>
                         <?php $__env->slot('subheading', null, []); ?> 
                            <?php echo e($subheading); ?>

                         <?php $__env->endSlot(); ?>
                    <?php endif; ?>
                <?php else: ?>
                     <?php $__env->slot('header', null, []); ?> 
                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'tables::components.modal.heading','data' => []] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('tables::modal.heading'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                            <?php echo e($action->getModalHeading()); ?>

                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                     <?php $__env->endSlot(); ?>
                <?php endif; ?>

                <?php echo e($action->getModalContent()); ?>


                <?php if($action->hasFormSchema()): ?>
                    <?php echo e($getMountedBulkActionForm()); ?>

                <?php endif; ?>

                <?php if(count($action->getModalActions())): ?>
                     <?php $__env->slot('footer', null, []); ?> 
                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'tables::components.modal.actions','data' => ['fullWidth' => $action->isModalCentered()]] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('tables::modal.actions'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['full-width' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($action->isModalCentered())]); ?>
                            <?php $__currentLoopData = $action->getModalActions(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $modalAction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php echo e($modalAction); ?>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                     <?php $__env->endSlot(); ?>
                <?php endif; ?>
            <?php endif; ?>
         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
    </form>

    <?php if(! $this instanceof \Filament\Tables\Contracts\RendersFormComponentActionModal): ?>
        <?php echo e($this->modal); ?>

    <?php endif; ?>
</div>
<?php /**PATH /Users/mat/Projects/AStA/asta-ticket-refund/vendor/filament/tables/resources/views/index.blade.php ENDPATH**/ ?>