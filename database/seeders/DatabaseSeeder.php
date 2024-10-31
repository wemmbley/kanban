<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call(UserDatabaseSeeder::class);
        $this->call(ProjectsDatabaseSeeder::class);
        $this->call(StagesDatabaseSeeder::class);
        $this->call(TaskPrioritiesDatabaseSeeder::class);
        $this->call(ProjectUserDatabaseSeeder::class);
        $this->call(SprintsDatabaseSeeder::class);
        $this->call(TasksDatabaseSeeder::class);
        $this->call(SprintTaskDatabaseSeeder::class);
        $this->call(TaskTypesDatabaseSeeder::class);
    }
}
