<?php

namespace Modules\Kanban\Livewire\Modals;

use Livewire\Attributes\On;
use Livewire\Component;
use Modules\Kanban\Models\Task;

class ViewTaskModalComponent extends Component
{
    // Modal data.

    public $task;

    // Default methods.

    public function render()
    {
        return view('kanban::kanban.modals.view-task');
    }

    // Events.

    #[On('kanban::view-task-modal-fill-component-data')]
    public function fillComponentData(int $taskId): void
    {
        $this->task = Task::findOrFail($taskId);

        $this->dispatch('kanban::view-task-modal-show-modal');
    }
}
