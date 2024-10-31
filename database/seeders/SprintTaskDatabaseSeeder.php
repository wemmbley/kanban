<?php

namespace Database\Seeders;

use Modules\Common\Abstracts\BaseDatabaseSeeder;
use Modules\Kanban\Models\SprintTask;

class SprintTaskDatabaseSeeder extends BaseDatabaseSeeder
{
    public function run(): void
    {
        $this->bulkFactoryInsert(SprintTask::class);
    }
}
