<?php

namespace Modules\Kanban\Database\Factories;

use Modules\Common\Database\Factories\BaseFactory;

class TaskPriorityFactory extends BaseFactory
{
    protected $model = \Modules\Kanban\Models\TaskPriority::class;

    public function definition(): array
    {
        return [];
    }
}

