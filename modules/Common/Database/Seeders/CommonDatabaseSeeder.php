<?php

namespace Modules\Common\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Auth\Database\Seeders\UserDatabaseSeeder;
use Modules\Kanban\Database\Seeders\KanbanDatabaseSeeder;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CommonDatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(UserDatabaseSeeder::class);
        $this->call(KanbanDatabaseSeeder::class);
    }
}
