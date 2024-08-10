<?php

namespace Modules\Auth\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Auth\Models\User;

class UserDatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::factory(20)->create();

        User::factory()->emailAttribute('admin@admin.com')->create();
    }
}
