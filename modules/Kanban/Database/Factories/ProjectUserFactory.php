<?php

namespace Modules\Kanban\Database\Factories;

use Modules\Common\Database\Factories\BaseFactory;

class ProjectUserFactory extends BaseFactory
{
    protected $model = \Modules\Kanban\Models\ProjectUser::class;

    public function definition(): array
    {
        return [
            'user_id' => rand(1,20),
            'project_id' => rand(1,10),
        ];
    }
}

