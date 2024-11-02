<?php

/*
 * This file is part of my handmade tools.
 *
 * (c) Holiev Rustam <golevv.rustam@gmail.com>
 *
 * This code provided by MIT license.
 */

declare(strict_types = 1);

namespace Modules\Common\Abstracts;

use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

abstract class BaseDatabaseSeeder extends Seeder
{
    /**
     * Instead of low speed factory we generate our data by ourselves.
     * That increases query importing speed because now we can use insert()
     * Instead of create() that creating by one row instead of batch.
     *
     * @param string $modelNamespace
     * @param int $chunkSize
     * @param int $rowsCount
     * @return void
     * @throws BindingResolutionException
     */
    protected function bulkFactoryInsert(string $modelNamespace, int $chunkSize = 50, int $rowsCount = 500): void
    {
        # We need model object twice in this code:
        # 1) Get model factory for getting defined random data.
        # 2) Get table name from concrete model.
        $modelInstance = app()->make($modelNamespace);

        /** @var array<int, array<string, string>> $randomChunkedData */
        $randomChunkedData = [];

        # Generating random data from factory and filling array step-by-step.
        # Generally we got something like that: [
        #                                           [...array<randFactoryData>], // chunk number one
        #                                           [...array],                  // chunk number two
        #                                                ...[],                  // other chunks
        #                                       ]
        for($i = 0, $j = 0; $i < $rowsCount; $i += $chunkSize, $j++) {
            for($k = 0; $k < $chunkSize; $k++) {
                $randomChunkedData[$j][] = $modelInstance::factory()->definition();
            }
        }

        # Now we ready to import our generated data to our database.
        # We use insert() method from DB facade because Model isn't have this method.
        foreach ($randomChunkedData as $tasksChunk) {
            $tableName = $modelInstance->getTable();

            DB::table($tableName)->insert($tasksChunk);
        }
    }
}
