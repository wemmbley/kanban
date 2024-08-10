<?php

namespace Modules\Kanban\Livewire;

use Livewire\Attributes\On;
use Livewire\Component;
use Modules\Kanban\Models\Project;
use Modules\Kanban\Models\Stage;
use Modules\Kanban\Models\Task;

class KanbanBoardComponent extends Component
{
    // Component data

    public $projectId;

    // Mounted data

    public Project $project;

    public array $kanbanData;

    // Component methods

    public function mount()
    {
        $this->project = Project::findOrFail($this->projectId);
        $this->kanbanData = $this->loadKanbanData();
    }

    public function render()
    {
        return view('kanban::kanban.kanban');
    }

    // Events

    #[On('kanban::refresh-board')]
    public function refreshKanbanBoard(): void
    {
        $this->kanbanData = $this->loadKanbanData();
    }

    #[On('kanban::load-more-tasks')]
    public function loadMoreTasks(int $stageId): void
    {
        $stageTasksCount = $this->kanbanData[$stageId]['tasks']->count();

        $newTasks = Stage::findOrFail($stageId)->tasks()->limit(6)->offset($stageTasksCount)->get();

        $this->kanbanData[$stageId]['tasks'] = $newTasks->merge($this->kanbanData[$stageId]['tasks']);
    }

    #[On('kanban::task-moved')]
    public function taskMoved(
        int $taskId,
        int $sourceStageId,
        int $targetStageId,
        int $siblingTaskId
    ): void {
        $this->reorderTasks($taskId, $siblingTaskId);
        $this->moveTaskToNewStage($taskId, $targetStageId);
        $this->refreshKanbanBoard();
    }

    // Custom methods

    private function loadKanbanData(): array
    {
        $kanbanData = [];

        foreach($this->project->stages as $stage) {
            $kanbanData[$stage->getKey()]['name'] = $stage->name;
            $kanbanData[$stage->getKey()]['tasks'] = $stage->tasks()->orderBy('created_at', 'desc')->limit(6)->get();
            $kanbanData[$stage->getKey()]['tasksCount'] = $stage->tasks()->count();
        }

        return $kanbanData;
    }

    private function reorderTasks(int $sourceStageId, int $targetStageId): void
    {
        // Task just changed his order in column.
        if($sourceStageId === $targetStageId) {
            // TODO: future functionality: make possible user reorder own tasks.

            return;
        }
    }

    private function moveTaskToNewStage($taskId, $targetStageId): void
    {
        $task = Task::findOrFail($taskId);
        $task->stage_id = $targetStageId;
        $task->save();
    }
}
