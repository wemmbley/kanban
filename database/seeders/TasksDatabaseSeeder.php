<?php

namespace Database\Seeders;

use Modules\Common\Abstracts\BaseDatabaseSeeder;
use Modules\Kanban\Models\Task;

class TasksDatabaseSeeder extends BaseDatabaseSeeder
{
    public function run(): void
    {
        $this->bulkFactoryInsert(modelNamespace: Task::class, rowsCount: 3000);
    }
}
