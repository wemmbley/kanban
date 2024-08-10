<div class="kanban" id="kanban-board">
    @foreach($this->kanbanData as $stageId => $stageData)
        <div class="column" id="stage-{{ \Str::kebab( $stageData['name'] ) }}" data-stage-id="{{ $stageId }}">
            <div class="d-flex titleContainer">
                <p class="title">{{ $stageData['name'] }}</p>
                <p class="title column-task-counter">{{ $stageData['tasksCount'] }}</p>
            </div>
            <div class="body">
                @foreach($stageData['tasks'] as $task)
                    @include('kanban::kanban.single-task', ['task' => $task])
                @endforeach
            </div>
        </div>
    @endforeach
</div>

@push('scripts')
    <script>
        //
        // Prepare available stage for manipulations.
        //
        const availableStages = [
            @foreach($this->project->stages as $stage)

                document.querySelector('#stage-{{ \Str::kebab( $stage->name ) }}'),

            @endforeach
        ];

        document.addEventListener('livewire:initialized', function() {
            //
            // Custom kanban 'column-scrolled-to-bottom' event.
            //
            availableStages.forEach((column) => {
                column.addEventListener('scroll', function(e) {
                    const element = e.currentTarget;

                    if (Math.abs(element.scrollHeight - element.scrollTop - element.clientHeight) < 1) {
                        document.dispatchEvent(new CustomEvent('kanban:column-scrolled-to-bottom', {
                            detail: {
                                data: {
                                    id: element.closest('.column').dataset.stageId,
                                },
                            }
                        }));
                    }
                });
            })

            //
            // Dragula.
            //
            const dragulaContainers = [];

            availableStages.forEach((stage) => {
                const stageContainer = stage.querySelector('.body');

                dragulaContainers.push(stageContainer);
            });

            dragula(dragulaContainers)
                .on('drop', (cardNode, target, source, sibling) => {
                    const sourceStageId = source.closest('.column').dataset.stageId;
                    const targetStageId = target.closest('.column').dataset.stageId;
                    const taskId = cardNode.dataset.taskId;
                    const siblingTaskId = sibling.dataset.taskId;

                    @this.dispatch('kanban::task-moved', [taskId, sourceStageId, targetStageId, siblingTaskId]);
                });

            //
            // Lazy load cards.
            //
            document.addEventListener('kanban:column-scrolled-to-bottom', (data) => {
                const stageId = data.detail.data.id;

                @this.dispatch('kanban::load-more-tasks', [stageId]);
            });

            //
            // Context menu.
            //
            const editIcon = '<svg class="feather feather-edit" fill="none" height="13" stroke="currentColor" stroke-linecap="round" style="margin-right: 7px" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" width="13" xmlns="http://www.w3.org/2000/svg"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>';
            const deleteIcon = `<svg viewBox="0 0 24 24" width="13" height="13" stroke="currentColor" stroke-width="2.5" fill="none" style="margin-right: 7px" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg>`;

            const menuItems = [
                {
                    content: `${editIcon}Edit`,
                    events: {
                        click: (e) => {
                            document.dispatchEvent(new CustomEvent('kanban:card-context-clicked-button-edit', {
                                detail: {
                                    data: {
                                        event: e,
                                        card: kanbanCardContextMenu.clickedTarget,
                                    },
                                }
                            }));
                        }
                    }
                },
                {
                    content: `${deleteIcon}Remove`,
                    divider: 'top',
                    events: {
                        click: (e) => {
                            document.dispatchEvent(new CustomEvent('kanban:card-context-clicked-button-remove', {
                                detail: {
                                    data: {
                                        event: e,
                                        card: kanbanCardContextMenu.clickedTarget,
                                    },
                                }
                            }));
                        }
                    }
                }
            ];

            const kanbanCardContextMenu = new ContextMenu({
                target: '#kanban-board .card',
                mode: 'light',
                menuItems
            });

            kanbanCardContextMenu.init();

            //
            // Context events.
            //
            document.addEventListener('kanban:card-context-clicked-button-edit', (data) => {
                const card = data.detail.data.card;
                const cardId = card.dataset.taskId;

                $wireGetComponent('#createNewTaskModal')
                    .dispatch('kanban::card-context-menu-click-edit', [cardId]);
            })

            document.addEventListener('kanban:card-context-clicked-button-remove', (data) => {
                // todo: sure modal

                const card = data.detail.data.card;
                const cardId = card.dataset.taskId;

                $wireGetComponent('#createNewTaskModal')
                    .dispatch('kanban::card-context-menu-click-remove', [cardId]);
            })
        });
    </script>
@endpush
