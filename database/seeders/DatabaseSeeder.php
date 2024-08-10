<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Common\Database\Seeders\CommonDatabaseSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call(CommonDatabaseSeeder::class);
    }
}
