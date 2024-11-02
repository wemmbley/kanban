<?php

namespace Modules\Kanban\Tests\Feature\Livewire;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;
use Livewire\Livewire;
use Modules\Auth\Models\User;
use Modules\Kanban\Livewire\KanbanBoardComponent;
use Modules\Kanban\Models\Project;
use Modules\Kanban\Models\Stage;
use Modules\Kanban\Models\Task;
use Modules\Kanban\Models\TaskPriority;
use Modules\Kanban\Models\TaskType;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class LoadKanbanDataTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function renders_successfully()
    {
        $project = Project::factory()->create();

        Livewire::test(KanbanBoardComponent::class, ['projectId' => $project->getKey()])
            ->assertStatus(200);
    }

    #[Test]
    public function component_exists_on_the_page()
    {
        $project = Project::factory()->create();
        $user = User::factory()->create();
        $taskPriority = TaskPriority::factory()->create();
        $issueType = TaskType::factory()->create();

        Auth::login($user);

        $this->get('/')
            ->assertStatus(200)
            ->assertSeeLivewire(KanbanBoardComponent::class);
    }

    #[Test]
    public function component_displays_task()
    {
        $project = Project::factory()->create();
        $user = User::factory()->create();
        $taskPriority = TaskPriority::factory()->create();
        $issueType = TaskType::factory()->create();
        $stage = Stage::factory()
            ->nameAttribute('Testing stage')
            ->projectIdAttribute($project->getKey())
            ->create();
        $task = Task::factory()
            ->nameAttribute('My test issue')
            ->projectIdAttribute($project->getKey())
            ->stageIdAttribute(1)
            ->priorityIdAttribute($taskPriority->getKey())
            ->typeIdAttribute($issueType->getKey())
            ->create();

        Auth::login($user);

        $this->get('/')
            ->assertStatus(200)
            ->assertSee('My test issue')
            ->assertSee('Testing stage')
            ->assertDontSee('Something that not displayed on page');
    }
}
