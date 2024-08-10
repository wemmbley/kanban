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
                                    <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($project->getKey()); ?>"><?php echo e($project->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                                </select>
                            </div>
                            <p>Priority</p>
                            <div wire:ignore>
                                <select id="selectPriority" class="select2">
                                    <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $taskPriorities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $priority): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($priority->getKey()); ?>"><?php echo e($priority->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <p>Assignee</p>
                            <div wire:ignore>
                                <select id="selectAssignee" class="select2">
                                    <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($user->getKey()); ?>"><?php echo e($user->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                                </select>
                            </div>
                            <p>Issue type</p>
                            <div wire:ignore>
                                <select id="selectIssueTypes" class="select2">
                                    <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $issueTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $issue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($issue->getKey()); ?>"><?php echo e($issue->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                                </select>
                            </div>
                        </div>
                    </div>
                    <p>Summary</p>
                    <input wire:model="issueTitle" type="text" class="form-control fs-11 <?php $__errorArgs = ['issueTitle'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                    <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['issueTitle'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="invalid-feedback d-flex">
                            <?php echo e($errors->first('issueTitle')); ?>

                        </div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
                    <p>Description</p>
                    <div wire:ignore>
                        <div id="taskDescription" style="height: 200px"></div>
                    </div>
                    <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['taskDescription'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="invalid-feedback d-flex">
                        <?php echo e($errors->first('taskDescription')); ?>

                    </div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Create issue</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php $__env->startPush('scripts'); ?>
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

                        window.Livewire.find('<?php echo e($_instance->getId()); ?>').set('taskDescription', content);
                    });
                }

                loadSelect2Fields() {
                    $select2('#selectProjects', '#createNewTaskModal', window.Livewire.find('<?php echo e($_instance->getId()); ?>'), 'projectId');
                    $select2('#selectIssueTypes', '#createNewTaskModal', window.Livewire.find('<?php echo e($_instance->getId()); ?>'), 'issueTypeId');
                    $select2('#selectAssignee', '#createNewTaskModal', window.Livewire.find('<?php echo e($_instance->getId()); ?>'), 'assigneeId');
                    $select2('#selectPriority', '#createNewTaskModal', window.Livewire.find('<?php echo e($_instance->getId()); ?>'), 'priorityId');
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
                    window.Livewire.find('<?php echo e($_instance->getId()); ?>').on('kanban::notify-issue-created', (data) => {
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
                    window.Livewire.find('<?php echo e($_instance->getId()); ?>').on('kanban::create-task-modal-show-modal', () => {
                        window.Livewire.find('<?php echo e($_instance->getId()); ?>').set('mode', 'update');

                        $('#createNewTaskModal').modal('show');
                    });
                }

                openModalListener() {
                    $('#createNewTaskModal').on('show.bs.modal', () => {
                        $('#selectProjects').val(window.Livewire.find('<?php echo e($_instance->getId()); ?>').get('projectId'));
                        $('#selectIssueTypes').val(window.Livewire.find('<?php echo e($_instance->getId()); ?>').get('issueTypeId'));
                        $('#selectAssignee').val(window.Livewire.find('<?php echo e($_instance->getId()); ?>').get('assigneeId'));
                        $('#selectPriority').val(window.Livewire.find('<?php echo e($_instance->getId()); ?>').get('priorityId'));

                        const deltaContent = this.quill.clipboard.convert({html: window.Livewire.find('<?php echo e($_instance->getId()); ?>').get('taskDescription')});

                        this.quill.setContents(deltaContent)

                        this.destroySelect2Fields();
                        this.loadSelect2Fields();
                    });
                }

                hideModalListener() {
                    $('#createNewTaskModal').on('hide.bs.modal', () => {
                        window.Livewire.find('<?php echo e($_instance->getId()); ?>').dispatch('kanban::card-preload-data');

                        this.quill.setText('\n'); // clear

                        window.Livewire.find('<?php echo e($_instance->getId()); ?>').set('mode', 'create');
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
                    window.Livewire.find('<?php echo e($_instance->getId()); ?>').on('kanban::view-task-modal-show-modal', () => {
                        $('#viewTaskModal').modal('show');
                    });
                }
            }

            const taskModal = new CreateNewTaskModal;
            taskModal.boot();
        });
    </script>
<?php $__env->stopPush(); ?>
<?php /**PATH /var/www/html/modules/Kanban/Resources/Views/kanban/modals/create-new-task.blade.php ENDPATH**/ ?>