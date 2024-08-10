<?php

namespace Modules\Kanban\Database\Factories;

use Modules\Common\Database\Factories\BaseFactory;

class TaskTimeFactory extends BaseFactory
{
    protected $model = \Modules\Kanban\Models\TaskTime::class;

    public function definition(): array
    {
        return [];
    }
}

