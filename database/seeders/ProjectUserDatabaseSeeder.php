<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Modules\Kanban\Models\ProjectUser;

class ProjectUserDatabaseSeeder extends Seeder
{
    public function run(ProjectUser $projectUser): void
    {
        $projectUserRandomData = [];

        for($i = 1; $i <= 10; $i++) {
            $isEvenIteration = $i % 2 === 0;

            $projectUserRandomData[] = ProjectUser::factory()
                ->userIdAttribute(1)
                ->projectIdAttribute($i)
                ->raw();

            $projectUserRandomData[] = ProjectUser::factory()
                ->userIdAttribute(2)
                ->projectIdAttribute($i)
                ->raw();

            $projectUserRandomData[] = ProjectUser::factory()
                ->userIdAttribute(3)
                ->projectIdAttribute($i)
                ->raw();

            $projectUserRandomData[] = ProjectUser::factory()
                ->userIdAttribute(4)
                ->projectIdAttribute($isEvenIteration)
                ->raw();
        }

        $projectUserTableName = $projectUser->getTable();

        DB::table($projectUserTableName)->insert($projectUserRandomData);
    }
}
