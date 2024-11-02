<?php

namespace Database\Factories;

use Modules\Common\Abstracts\BaseFactory;

class TaskPriorityFactory extends BaseFactory
{
    protected $model = \Modules\Kanban\Models\TaskPriority::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'order' => $this->faker->numberBetween(0, 999999),
            'image_url' => $this->faker->imageUrl,
        ];
    }
}

