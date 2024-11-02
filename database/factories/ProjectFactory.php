<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Modules\Common\Abstracts\BaseFactory;

class ProjectFactory extends BaseFactory
{
    protected $model = \Modules\Kanban\Models\Project::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'image_url' => $this->faker->url(),
            'identifier' => Str::upper($this->faker->lexify('???')),
            'owner_id' => rand(1, 10),
        ];
    }
}

