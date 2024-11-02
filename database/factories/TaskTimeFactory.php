<?php

namespace Database\Factories;

use Modules\Common\Abstracts\BaseFactory;

class TaskTimeFactory extends BaseFactory
{
    protected $model = \Modules\Kanban\Models\TaskTime::class;

    public function definition(): array
    {
        return [];
    }
}

