<?php

namespace Database\Seeders;

use Modules\Common\Abstracts\BaseDatabaseSeeder;
use Modules\Kanban\Models\Sprint;

class SprintsDatabaseSeeder extends BaseDatabaseSeeder
{
    public function run(): void
    {
        $this->bulkFactoryInsert(modelNamespace: Sprint::class, rowsCount: 30);
    }
}
