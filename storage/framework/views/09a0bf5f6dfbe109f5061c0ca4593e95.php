<div class="kanban-header">
    <button type="button" class="btn s-btn s-btn-light-blue create-task" id="create-task"
            data-bs-toggle="modal" data-bs-target="#createNewTaskModal">
        <i class="mdi mdi-plus-circle me-2"></i>
        NEW ISSUE
    </button>










</div>

<?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('kanban::kanban-board-component', ['projectId' => 1]);

$__html = app('livewire')->mount($__name, $__params, 'lw-3685003128-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
<?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('kanban::kanban-board-modal-create-new-task', []);

$__html = app('livewire')->mount($__name, $__params, 'lw-3685003128-1', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
<?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('kanban::kanban-board-modal-view-task', []);

$__html = app('livewire')->mount($__name, $__params, 'lw-3685003128-2', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
</div>
<?php /**PATH D:\OSPanel\domains\kanban\modules/Web\Resources/Views/tabs/kanban/kanban.blade.php ENDPATH**/ ?>