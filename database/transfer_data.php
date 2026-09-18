<?php

require __DIR__ . '/../vendor/autoload.php';

$app = require_once __DIR__ . '/../bootstrap/app.php';

$app->make(\Illuminate\Contracts\Console\Kernel::class)->bootstrap();

use Illuminate\Support\Facades\DB;

$tables = [
    'users',
    'subjects',
    'topics',
    'questions',
    'choices',
    'answered_questions',
    'user_pretest',
    'recent_activities',
];

echo "Starting MySQL → Supabase data transfer...\n\n";

foreach ($tables as $table) {
    echo "Transferring: {$table}...\n";

    $sourceColumns = DB::connection('old_mysql')
        ->getSchemaBuilder()
        ->getColumnListing($table);

    $destinationColumns = DB::connection('pgsql')
        ->getSchemaBuilder()
        ->getColumnListing($table);

    $columns = array_values(array_intersect($sourceColumns, $destinationColumns));

    if (empty($columns)) {
        echo "  SKIPPED: No matching columns.\n\n";
        continue;
    }

    $rows = DB::connection('old_mysql')
        ->table($table)
        ->get();

    if ($rows->isEmpty()) {
        echo "  No data.\n\n";
        continue;
    }

    foreach ($rows->chunk(100) as $chunk) {
        $insertData = [];

        foreach ($chunk as $row) {
            $data = [];

            foreach ($columns as $column) {
                $data[$column] = $row->{$column};
            }

            $insertData[] = $data;
        }

        DB::connection('pgsql')
            ->table($table)
            ->insert($insertData);
    }

    echo "  Transferred {$rows->count()} records.\n\n";
}

echo "Data transfer completed!\n";