<div class="kanban-header">
    <button type="button" class="btn s-btn s-btn-light-blue create-task" id="create-task"
            data-bs-toggle="modal" data-bs-target="#createNewTaskModal">
        <i class="mdi mdi-plus-circle me-2"></i>
        NEW ISSUE
    </button>

{{--    <div class="sprint">--}}
{{--        <div class="d-flex">--}}
{{--            <div class="d-flex me-3 align-items-center">--}}
{{--                <i data-feather="clock" class="me-2"></i>--}}
{{--                <p class="m-0">Time remaining: <b>2 days</b>.</p>--}}
{{--            </div>--}}
{{--            <button type="button" class="btn btn-outline-dark">Complete sprint</button>--}}
{{--        </div>--}}
{{--    </div>--}}
</div>

<livewire:kanban::kanban-board-component :projectId="1" />
<livewire:kanban::kanban-board-modal-create-new-task />
<livewire:kanban::kanban-board-modal-view-task />
</div>
