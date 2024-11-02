<?php

namespace Database\Factories;

use Modules\Common\Abstracts\BaseFactory;

class TaskTypeFactory extends BaseFactory
{
    protected $model = \Modules\Kanban\Models\TaskType::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'image_url' => $this->faker->imageUrl,
        ];
    }
}

