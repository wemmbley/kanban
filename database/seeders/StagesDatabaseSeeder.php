<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Modules\Kanban\Models\Stage;

class StagesDatabaseSeeder extends Seeder
{
    public function run(Stage $stage): void
    {
        $randomStagesData = [];

        for($projectId = 1; $projectId <= 10; $projectId++) {
            $randomStagesData[] = Stage::factory()
                ->nameAttribute('todo')
                ->orderAttribute(1)
                ->projectIdAttribute($projectId)
                ->raw();

            $randomStagesData[] = Stage::factory()
                ->nameAttribute('in progress')
                ->orderAttribute(2)
                ->projectIdAttribute($projectId)
                ->raw();

            $randomStagesData[] = Stage::factory()
                ->nameAttribute('in review')
                ->orderAttribute(3)
                ->projectIdAttribute($projectId)
                ->raw();

            $randomStagesData[] = Stage::factory()
                ->nameAttribute('ready for qa')
                ->orderAttribute(4)
                ->projectIdAttribute($projectId)
                ->raw();

            $randomStagesData[] = Stage::factory()
                ->nameAttribute('testing')
                ->orderAttribute(5)
                ->projectIdAttribute($projectId)
                ->raw();

            $randomStagesData[] = Stage::factory()
                ->nameAttribute('done')
                ->orderAttribute(6)
                ->projectIdAttribute($projectId)
                ->raw();
        }

        $stageTableName = $stage->getTable();

        DB::table($stageTableName)->insert($randomStagesData);
    }
}
