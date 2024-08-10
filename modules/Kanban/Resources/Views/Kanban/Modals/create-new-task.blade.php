<div wire:ignore.self wire:key="createNewTaskModal" class="modal fade" id="createNewTaskModal" tabindex="-1" aria-labelledby="createNewTaskModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form wire:submit="submit">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create new issue</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <p>Project</p>
                            <div wire:ignore>
                                <select id="selectProjects" class="select2">
                                    @foreach($projects as $project)
                                        <option value="{{ $project->getKey() }}">{{ $project->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <p>Priority</p>
                            <div wire:ignore>
                                <select id="selectPriority" class="select2">
                                    @foreach($taskPriorities as $priority)
                                        <option value="{{ $priority->getKey() }}">{{ $priority->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <p>Assignee</p>
                            <div wire:ignore>
                                <select id="selectAssignee" class="select2">
                                    @foreach($users as $user)
                                        <option value="{{ $user->getKey() }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <p>Issue type</p>
                            <div wire:ignore>
                                <select id="selectIssueTypes" class="select2">
                                    @foreach($issueTypes as $issue)
                                        <option value="{{ $issue->getKey() }}">{{ $issue->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <p>Summary</p>
                    <input wire:model="issueTitle" type="text" class="form-control fs-11 @error('issueTitle') is-invalid @enderror">
                    @error('issueTitle')
                        <div class="invalid-feedback d-flex">
                            {{ $errors->first('issueTitle') }}
                        </div>
                    @enderror
                    <p>Description</p>
                    <div wire:ignore>
                        <div id="taskDescription" style="height: 200px"></div>
                    </div>
                    @error('taskDescription')
                    <div class="invalid-feedback d-flex">
                        {{ $errors->first('taskDescription') }}
                    </div>
                    @enderror
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Create issue</button>
                </div>
            </form>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        document.addEventListener('livewire:initialized', function () {

            // TODO: refactor by Single Responsibility Principle.
            class CreateNewTaskModal {
                quill;

                boot() {
                    this.loadSelect2Fields();
                    this.fixSelect2BugWhenClickClosedModal();
                    this.loadWisywingEditor();
                    this.loadNotifier();
                    this.addEventForShowModal();
                    this.openModalListener();
                    this.hideModalListener();
                    this.clickCardListener();
                    this.openViewModalListener();
                }

                loadWisywingEditor() {
                    const toolbarOptions = [
                        [
                            'bold', 'italic', 'underline', 'strike', 'blockquote',
                            'code-block', 'link', 'image', 'video', {'list': 'ordered'},
                            'clean'
                        ],
                    ];

                    this.quill = new Quill('#taskDescription', {
                        modules: {
                            toolbar: toolbarOptions
                        },
                        theme: 'snow',
                        placeholder: 'Describe your task here...',
                    });

                    const self = this;

                    this.quill.on('text-change', function () {
                        const content = self.quill.root.innerHTML;

                        @this.set('taskDescription', content);
                    });
                }

                loadSelect2Fields() {
                    $select2('#selectProjects', '#createNewTaskModal', @this, 'projectId');
                    $select2('#selectIssueTypes', '#createNewTaskModal', @this, 'issueTypeId');
                    $select2('#selectAssignee', '#createNewTaskModal', @this, 'assigneeId');
                    $select2('#selectPriority', '#createNewTaskModal', @this, 'priorityId');
                }

                destroySelect2Fields() {
                    $destroySelect2([
                        '#selectProjects', '#selectIssueTypes',
                        '#selectAssignee', '#selectPriority'
                    ]);
                }

                fixSelect2BugWhenClickClosedModal() {
                    $(document).on('click', '.select2', function(e) {
                        e.stopPropagation();
                    });
                }

                loadNotifier() {
                    @this.on('kanban::notify-issue-created', (data) => {
                        const notifyMessage = data[0].message;
                        const isSuccess = data[0].isSuccess;

                        if(isSuccess) {
                            $toastSuccess(notifyMessage);
                        } else {
                            $toastDanger(notifyMessage);
                        }

                        $('#createNewTaskModal').modal('hide');

                        $wireGetComponent('#kanban-board')
                            .dispatch('kanban::refresh-board');
                    });
                }

                addEventForShowModal() {
                    @this.on('kanban::create-task-modal-show-modal', () => {
                        @this.set('mode', 'update');

                        $('#createNewTaskModal').modal('show');
                    });
                }

                openModalListener() {
                    $('#createNewTaskModal').on('show.bs.modal', () => {
                        $('#selectProjects').val(@this.get('projectId'));
                        $('#selectIssueTypes').val(@this.get('issueTypeId'));
                        $('#selectAssignee').val(@this.get('assigneeId'));
                        $('#selectPriority').val(@this.get('priorityId'));

                        const deltaContent = this.quill.clipboard.convert({html: @this.get('taskDescription')});

                        this.quill.setContents(deltaContent)

                        this.destroySelect2Fields();
                        this.loadSelect2Fields();
                    });
                }

                hideModalListener() {
                    $('#createNewTaskModal').on('hide.bs.modal', () => {
                        @this.dispatch('kanban::card-preload-data');

                        this.quill.setText('\n'); // clear

                        @this.set('mode', 'create');
                    })
                }

                clickCardListener() {
                    document.querySelectorAll('#kanban-board .card').forEach((cardNode) => {
                        cardNode.addEventListener('click', (event) => {
                            const el = event.target.closest('.card');
                            const viewTaskComponent = $wireGetComponent('#viewTaskModal');

                            viewTaskComponent.dispatch('kanban::view-task-modal-fill-component-data', [el.dataset.taskId]);
                        });
                    })
                }

                openViewModalListener()
                {
                    @this.on('kanban::view-task-modal-show-modal', () => {
                        $('#viewTaskModal').modal('show');
                    });
                }
            }

            const taskModal = new CreateNewTaskModal;
            taskModal.boot();
        });
    </script>
@endpush
