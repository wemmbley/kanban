<?php

namespace Modules\Kanban\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Kanban\Models\Stage;
use Modules\Kanban\Models\Project;
use Modules\Kanban\Models\ProjectUser;
use Modules\Kanban\Models\Sprint;
use Modules\Kanban\Models\SprintTask;
use Modules\Kanban\Models\Task;
use Modules\Kanban\Models\TaskPriority;
use Modules\Kanban\Models\TaskType;

class KanbanDatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->generateProjects();
        $this->generateStages();
        $this->generateTaskPriorities();
        $this->generateProjectUserPivot();
        $this->generateSprints();
        $this->generateTasks();
        $this->generateSprintTaskPivot();
        $this->generateTaskTypes();
    }

    private function generateTaskTypes(): void
    {
        TaskType::factory()
            ->nameAttribute('Bug')
            ->imageUrlAttribute(asset('modules/web/img/tasks/bug.svg'))
            ->create();

        TaskType::factory()
            ->nameAttribute('Task')
            ->imageUrlAttribute(asset('modules/web/img/tasks/task.svg'))
            ->create();

        TaskType::factory()
            ->nameAttribute('Subtask')
            ->imageUrlAttribute(asset('modules/web/img/tasks/subtask.svg'))
            ->create();

        TaskType::factory()
            ->nameAttribute('Epic')
            ->imageUrlAttribute(asset('modules/web/img/tasks/epic.svg'))
            ->create();
    }

    private function generateSprintTaskPivot(): void
    {
        SprintTask::factory(1000)->create();
    }

    private function generateTasks(): void
    {
        Task::factory(3000)->create();
    }

    private function generateSprints(): void
    {
        Sprint::factory(30)->create();
    }

    private function generateProjectUserPivot(): void
    {
        for($i = 1; $i <= 10; $i++) {
            $isEvenIteration = $i % 2 === 0;

            ProjectUser::factory()
                ->userIdAttribute(1)
                ->projectIdAttribute($i)
                ->create();

            ProjectUser::factory()
                ->userIdAttribute(2)
                ->projectIdAttribute($i)
                ->create();

            ProjectUser::factory()
                ->userIdAttribute(3)
                ->projectIdAttribute($i)
                ->create();

            ProjectUser::factory()
                ->userIdAttribute(4)
                ->projectIdAttribute($isEvenIteration)
                ->create();
        }
    }

    private function generateTaskPriorities(): void
    {
        TaskPriority::factory()
            ->nameAttribute('Trivial')
            ->orderAttribute(1)
            ->imageUrlAttribute(asset('modules/web/img/priority/trivial.svg'))
            ->create();

        TaskPriority::factory()
            ->nameAttribute('Minor')
            ->orderAttribute(2)
            ->imageUrlAttribute(asset('modules/web/img/priority/minor.svg'))
            ->create();

        TaskPriority::factory()
            ->nameAttribute('Lowest')
            ->orderAttribute(3)
            ->imageUrlAttribute(asset('modules/web/img/priority/lowest.svg'))
            ->create();

        TaskPriority::factory()
            ->nameAttribute('Low')
            ->orderAttribute(4)
            ->imageUrlAttribute(asset('modules/web/img/priority/low.svg'))
            ->create();

        TaskPriority::factory()
            ->nameAttribute('Medium')
            ->orderAttribute(5)
            ->imageUrlAttribute(asset('modules/web/img/priority/medium.svg'))
            ->create();

        TaskPriority::factory()
            ->nameAttribute('High')
            ->orderAttribute(6)
            ->imageUrlAttribute(asset('modules/web/img/priority/high.svg'))
            ->create();

        TaskPriority::factory()
            ->nameAttribute('Highest')
            ->orderAttribute(7)
            ->imageUrlAttribute(asset('modules/web/img/priority/highest.svg'))
            ->create();

        TaskPriority::factory()
            ->nameAttribute('Major')
            ->orderAttribute(8)
            ->imageUrlAttribute(asset('modules/web/img/priority/major.svg'))
            ->create();

        TaskPriority::factory()
            ->nameAttribute('Critical')
            ->orderAttribute(9)
            ->imageUrlAttribute(asset('modules/web/img/priority/critical.svg'))
            ->create();

        TaskPriority::factory()
            ->nameAttribute('Blocker')
            ->orderAttribute(10)
            ->imageUrlAttribute(asset('modules/web/img/priority/blocker.svg'))
            ->create();
    }

    private function generateStages(): void
    {
        for($projectId = 1; $projectId <= 10; $projectId++) {
            Stage::factory()
                ->nameAttribute('todo')
                ->orderAttribute(1)
                ->projectIdAttribute($projectId)
                ->create();

            Stage::factory()
                ->nameAttribute('in progress')
                ->orderAttribute(2)
                ->projectIdAttribute($projectId)
                ->create();

            Stage::factory()
                ->nameAttribute('in review')
                ->orderAttribute(3)
                ->projectIdAttribute($projectId)
                ->create();

            Stage::factory()
                ->nameAttribute('ready for qa')
                ->orderAttribute(4)
                ->projectIdAttribute($projectId)
                ->create();

            Stage::factory()
                ->nameAttribute('testing')
                ->orderAttribute(5)
                ->projectIdAttribute($projectId)
                ->create();

            Stage::factory()
                ->nameAttribute('done')
                ->orderAttribute(6)
                ->projectIdAttribute($projectId)
                ->create();
        }
    }

    private function generateProjects(): void
    {
        Project::factory(10)->create();
    }
}
