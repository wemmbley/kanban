<?php

namespace Modules\Kanban\Database\Factories;

use Modules\Common\Database\Factories\BaseFactory;

class SprintTaskFactory extends BaseFactory
{
    protected $model = \Modules\Kanban\Models\SprintTask::class;

    public function definition(): array
    {
        return [
            'task_id' => rand(1, 3000),
            'sprint_id' => rand(1, 30),
        ];
    }
}

