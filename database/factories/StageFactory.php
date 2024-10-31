<?php

namespace Database\Factories;

use Modules\Common\Abstracts\BaseFactory;

class StageFactory extends BaseFactory
{
    protected $model = \Modules\Kanban\Models\Stage::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'order' => rand(1, 999999),
            'project_id' => rand(1, 9),
        ];
    }
}

