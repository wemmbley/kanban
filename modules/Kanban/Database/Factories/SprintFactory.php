<?php

namespace Modules\Kanban\Database\Factories;

use Carbon\Carbon;
use Modules\Common\Database\Factories\BaseFactory;

class SprintFactory extends BaseFactory
{
    protected $model = \Modules\Kanban\Models\Sprint::class;

    public function definition(): array
    {
        return [
            'name' => fake()->sentence(),
            'due_date' => fake()->dateTime(Carbon::now()->addYear()),
            'owner_id' => rand(1,10),
            'project_id' => rand(1,10),
        ];
    }
}

