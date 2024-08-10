<div wire:ignore.self wire:key="viewTaskModal" class="modal fade" id="viewTaskModal" tabindex="-1"
     aria-labelledby="createNewTaskModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ $task?->name }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-9">
                        <p>Description</p>
                        <div class="task-description">
                            {!! $task?->description !!}
                        </div>
                        <div class="task-comments">
                            <p>Comments:</p>
                            <div class="new-comment">
                                <div wire:ignore class="mb-2">
                                    <div id="taskNewComment" style="height: 120px"></div>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <button type="button" class="btn s-btn s-btn-light-blue create-task">
                                        <i class="mdi mdi-comment pe-2"></i>
                                        Add comment
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 border-left-1">
                        <div class="task-sidebar">
                            <p class="m-0 pb-2 text-black-50">Time tracked: <b>1d 2h</b></p>
                            <div class="d-grid gap-2">
                                <button type="button" class="btn s-btn s-btn-light-blue create-task">
                                    <i class="mdi mdi-clock-time-eight pe-2"></i>
                                    Log work
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        document.addEventListener('livewire:initialized', () => {
            @this.on('kanban::view-task-modal-show-modal', () => {
                $('#viewTaskModal').modal('show');
            });

            const toolbarOptions = [
                [
                    'bold', 'italic', 'underline', 'strike', 'blockquote',
                    'code-block', 'link', 'image', 'video', {'list': 'ordered'},
                    'clean'
                ],
            ];

            const newCommentRichEditor = new Quill('#taskNewComment', {
                modules: {
                    toolbar: toolbarOptions
                },
                theme: 'snow',
                placeholder: 'Make your awesome comment here...',
            });

            newCommentRichEditor.on('text-change', function () {
                const content = newCommentRichEditor.root.innerHTML;

                @this.set('commentText', content);
            });
        });
    </script>
@endpush
