<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Kanban\Models\TaskType;

class TaskTypesDatabaseSeeder extends Seeder
{
    public function run(): void
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
}
