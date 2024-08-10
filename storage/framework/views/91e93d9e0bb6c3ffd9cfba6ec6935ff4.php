<div class="tab-pane fade" id="sprints" role="tabpanel" aria-labelledby="sprints-tab">
    <div class="sprints-header d-flex justify-content-between">
        <button type="button" class="btn btn-primary create-task h-100" id="create-new-sprint">Create new sprint</button>
        <div class="d-flex">
            <select class="available-sprints" id="available-sprints">
                <option value="sprint1" disabled>Sprint 1 | Tasks: 24 | Completed</option>
                <option value="sprint2" selected>Sprint 2 | Tasks: 32 | Due 13.09.2024</option>
                <option value="sprint3">Sprint 3 | Tasks: 0 | Not started.</option>
            </select>
            <button type="button" class="btn btn-outline-danger ms-2">Change sprint</button>
        </div>
    </div>

    <ul class="list-group">
        <li class="list-group-item d-flex justify-content-between align-items-start">
            <div class="ms-2 me-auto">
                <span class="badge bg-secondary">Tasks: 34</span>
                <span class="badge bg-secondary">Completed</span>
                <div class="fw-bold">Sprint 1</div>
            </div>
            <div class="d-flex">
                <i class="mdi mdi-pencil remove-btn"></i>
                <i class="mdi mdi-delete remove-btn ms-2"></i>
            </div>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-start">
            <div class="ms-2 me-auto">
                <span class="badge bg-secondary">Tasks: 22</span>
                <span class="badge bg-primary">Current</span>
                <span class="badge bg-success">67% done</span>
                <div class="fw-bold">Sprint 2</div>
            </div>
            <div class="d-flex">
                <i class="mdi mdi-pencil remove-btn"></i>
                <i class="mdi mdi-delete remove-btn ms-2"></i>
            </div>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-start">
            <div class="ms-2 me-auto">
                <span class="badge bg-secondary">Tasks: 22</span>
                <span class="badge bg-secondary">Not started</span>
                <div class="fw-bold">Sprint 3</div>
            </div>
            <div class="d-flex">
                <i class="mdi mdi-pencil remove-btn"></i>
                <i class="mdi mdi-delete remove-btn ms-2"></i>
            </div>
        </li>
    </ul>
</div>
<?php /**PATH /var/www/html/modules/Web/Resources/Views/tabs/sprints/sprints.blade.php ENDPATH**/ ?>