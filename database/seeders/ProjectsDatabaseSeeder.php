<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Kanban\Models\Project;

class ProjectsDatabaseSeeder extends Seeder
{
    public function run(): void
    {
        Project::factory(10)->create();
    }
}
