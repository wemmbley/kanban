<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Kanban\Models\TaskPriority;

class TaskPrioritiesDatabaseSeeder extends Seeder
{
    public function run(): void
    {
        TaskPriority::factory()
            ->nameAttribute('Trivial')
            ->orderAttribute(1)
            ->imageUrlAttribute(asset('modules/web/img/priority/trivial.svg'))
            ->create();

        TaskPriority::factory()
            ->nameAttribute('Minor')
            ->orderAttribute(2)
            ->imageUrlAttribute(asset('modules/web/img/priority/minor.svg'))
            ->create();

        TaskPriority::factory()
            ->nameAttribute('Lowest')
            ->orderAttribute(3)
            ->imageUrlAttribute(asset('modules/web/img/priority/lowest.svg'))
            ->create();

        TaskPriority::factory()
            ->nameAttribute('Low')
            ->orderAttribute(4)
            ->imageUrlAttribute(asset('modules/web/img/priority/low.svg'))
            ->create();

        TaskPriority::factory()
            ->nameAttribute('Medium')
            ->orderAttribute(5)
            ->imageUrlAttribute(asset('modules/web/img/priority/medium.svg'))
            ->create();

        TaskPriority::factory()
            ->nameAttribute('High')
            ->orderAttribute(6)
            ->imageUrlAttribute(asset('modules/web/img/priority/high.svg'))
            ->create();

        TaskPriority::factory()
            ->nameAttribute('Highest')
            ->orderAttribute(7)
            ->imageUrlAttribute(asset('modules/web/img/priority/highest.svg'))
            ->create();

        TaskPriority::factory()
            ->nameAttribute('Major')
            ->orderAttribute(8)
            ->imageUrlAttribute(asset('modules/web/img/priority/major.svg'))
            ->create();

        TaskPriority::factory()
            ->nameAttribute('Critical')
            ->orderAttribute(9)
            ->imageUrlAttribute(asset('modules/web/img/priority/critical.svg'))
            ->create();

        TaskPriority::factory()
            ->nameAttribute('Blocker')
            ->orderAttribute(10)
            ->imageUrlAttribute(asset('modules/web/img/priority/blocker.svg'))
            ->create();
    }
}
