<div class="tab-pane fade" id="backlog" role="tabpanel" aria-labelledby="backlog-tab">
    <div class="backlog-header d-flex justify-content-between">
        <div class="d-flex">
            <div>
                <button type="button" class="btn btn-primary create-task" id="create-backlog-task">New issue</button>
                <button type="button" class="btn btn-outline-primary create-task" id="select-backlog-tasks">Select issues</button>
            </div>
            <div class="d-flex align-items-center justify-content-center">
                <div class="pretty p-icon p-curve me-2 ms-4">
                    <input type="checkbox" />
                    <div class="state p-primary">
                        <i class="icon mdi mdi-check"></i>
                        <label></label>
                    </div>
                </div>
                <p class="m-0">Show all tasks</p>
            </div>
        </div>
        <div class="d-flex">
            <input type="text" placeholder="Search tasks..." class="form-control backlog-search">
            <button type="button" class="btn btn-outline-dark create-task w-100 h-100 ms-2" id="backlog-bulk-actions">Mass actions</button>
        </div>
    </div>

    <ul class="list-group">
        <li class="list-group-item d-flex justify-content-between align-items-start">
            <div class="pretty p-icon p-curve m-30 fs-20 backlog-checkbox-container">
                <input type="checkbox" class="backlog-checkbox" value="1" />
                <div class="state p-primary">
                    <i class="icon mdi mdi-check"></i>
                    <label></label>
                </div>
            </div>

            <div class="ms-2 me-auto">
                <span class="badge bg-secondary">CRP-12</span>
                <div class="fw-bold">Create kanban board feature</div>
                Some example task description can be right here.
            </div>
            <span class="badge bg-primary rounded-pill">Feature</span>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-start">
            <div class="pretty p-icon p-curve m-30 fs-20 backlog-checkbox-container">
                <input type="checkbox" class="backlog-checkbox" value="2" />
                <div class="state p-primary">
                    <i class="icon mdi mdi-check"></i>
                    <label></label>
                </div>
            </div>

            <div class="ms-2 me-auto">
                <span class="badge bg-secondary">CRP-32</span>
                <div class="fw-bold">Create kanban board feature</div>
                Cras justo odio
            </div>
            <span class="badge bg-danger rounded-pill">Bug</span>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-start">
            <div class="pretty p-icon p-curve m-30 fs-20 backlog-checkbox-container">
                <input type="checkbox" class="backlog-checkbox" value="3" />
                <div class="state p-primary">
                    <i class="icon mdi mdi-check"></i>
                    <label></label>
                </div>
            </div>

            <div class="ms-2 me-auto">
                <span class="badge bg-secondary">CRP-96</span>
                <div class="fw-bold">Create kanban board feature</div>
                Cras justo odio
            </div>
            <span class="badge bg-secondary rounded-pill">Uncategorized</span>
        </li>

        <li class="list-group-item d-flex justify-content-between align-items-start hide" id="single-task-skeleton">
            <div class="pretty p-icon p-curve m-30 fs-20 backlog-checkbox-container">
                <input type="checkbox" class="backlog-checkbox" value="3" />
                <div class="state p-primary">
                    <i class="icon mdi mdi-check"></i>
                    <label></label>
                </div>
            </div>

            <div class="ms-2 me-auto">
                <span class="badge bg-secondary">CRP-96</span>
                <div class="fw-bold">Create kanban board feature</div>
                Cras justo odio
            </div>
            <span class="badge bg-secondary rounded-pill">Uncategorized</span>
        </li>
    </ul>
</div>
