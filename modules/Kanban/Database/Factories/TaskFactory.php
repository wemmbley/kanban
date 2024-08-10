<?php

namespace Modules\Kanban\Database\Factories;

use Modules\Common\Database\Factories\BaseFactory;

class TaskFactory extends BaseFactory
{
    protected $model = \Modules\Kanban\Models\Task::class;

    public function definition(): array
    {
        return [
            'identifier' => $this->faker->numberBetween(1, 300),
            'name' => $this->faker->sentence(12),
            'story_points' => rand(1,9),
            'description' => $this->faker->sentence(99),
            'stage_id' => rand(1,10),
            'priority_id' => rand(1,10),
            'reporter_id' => rand(3,10),
            'assignee_id' => rand(1,2),
            'project_id' => rand(1,10),
            'type_id' => rand(1,4),
            'parent_task_id' => $this->faker->randomElement([null, null, rand(1,999)]),
        ];
    }
}

