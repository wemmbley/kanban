<?php

namespace Modules\Kanban\Livewire\Modals;

use Illuminate\Support\Facades\Log;
use Livewire\Attributes\On;
use Livewire\Component;
use Modules\Auth\Models\User;
use Modules\Kanban\Models\Project;
use Modules\Kanban\Models\Task;
use Modules\Kanban\Models\TaskPriority;
use Modules\Kanban\Models\TaskType;

// TODO: rename to TaskModalComponent
// TODO: refactor code
class CreateTaskModalComponent extends Component
{
    // Computed properties.

    public $projects;

    public $issueTypes;

    public $taskPriorities;

    public $users;

    // Form inputs.

    public $projectId;

    public $assigneeId;

    public $priorityId;

    public $issueTypeId;

    public $issueTitle;

    public $taskDescription;

    // Custom properties.

    public $mode = 'create'; // or update

    public $taskId;

    // Validation.

    private array $rules = [
        'issueTitle' => 'string|required|min:3',
        'taskDescription' => 'string|required|min:3',
    ];

    // Default methods.

    public function mount()
    {
        // Mount data for modal.
        // FIXME: refactor in future, make select2 ajax requests. Cause users count may be >10k.
        $this->projects = Project::all();
        $this->issueTypes = TaskType::all();
        $this->taskPriorities = TaskPriority::all();
        // FIXME: make field depends on selected project. Similar reason with projects.
        $this->users = User::all();

        $this->preloadComponentData();
    }

    public function render()
    {
        return view('kanban::kanban.modals.create-new-task');
    }

    public function submit()
    {
        $this->validate($this->rules);

        $isSuccess = false;

        try {
            match($this->mode) {
                'create' => $this->createIssueFromFilledData(),
                'update' => $this->updateIssueFromFilledData(),
            };

            $notifyMessage = 'Issue was created successfully.';

            $isSuccess = true;
        } catch (\Throwable $e) {
            $notifyMessage = 'Something went wrong.';

            $this->handleException($e);
        }

        $this->dispatch('kanban::notify-issue-created', [
            'isSuccess' => $isSuccess,
            'message' => $notifyMessage,
        ]);
    }

    // Events.

    #[On('kanban::card-context-menu-click-edit')]
    public function cardContextMenuEdit(int $cardId): void
    {
        $task = Task::findOrFail($cardId);

        $this->taskId = $task->getKey();
        $this->issueTitle = $task->name;
        $this->taskDescription = $task->description;
        $this->priorityId = $task->priority_id;
        $this->projectId = $task->project_id;
        $this->assigneeId = $task->assignee_id;
        $this->issueTypeId = $task->type_id;
        $this->mode = 'update';

        $this->dispatch('kanban::create-task-modal-show-modal');
    }

    #[On('kanban::card-context-menu-click-remove')]
    public function cardContextMenuRemove(int $cardId): void
    {

    }

    #[On('kanban::card-preload-data')]
    public function preloadComponentData(): void
    {
        $this->projectId = $this->projects->first()->getKey();
        $this->assigneeId = $this->users->first()->getKey();
        $this->priorityId = $this->taskPriorities->first()->getKey();
        $this->issueTypeId = $this->issueTypes->first()->getKey();
        $this->taskDescription = '';
        $this->issueTitle = '';
    }

    // Custom methods

    private function createIssueFromFilledData(): void
    {
        Task::create($this->getFilledTaskData());
    }

    private function updateIssueFromFilledData(): void
    {
        Task::find($this->taskId)->update($this->getFilledTaskData());

        $this->mode = 'create';
    }

    private function getFilledTaskData(): array
    {
        return [
            'name' => $this->issueTitle,
            'description' => $this->taskDescription,
            'priority_id' => $this->priorityId,
            'reporter_id' => auth()->user()->getAuthIdentifier(),
            'assignee_id' => $this->assigneeId,
            'project_id' => $this->projectId,
            'type_id' => $this->issueTypeId,
        ];
    }

    private function handleException(\Throwable $e): void
    {
        if(config('app.debug')) {
            throw new \Exception($e);
        }

        Log::error(sprintf('%s: %s', $e->getFile(), $e->getMessage()));
    }
}
