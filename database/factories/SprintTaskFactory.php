<?php

namespace Database\Factories;

use Modules\Common\Abstracts\BaseFactory;

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

